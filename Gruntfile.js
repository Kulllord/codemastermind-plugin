module.exports = function(grunt) {

	// Load all grunt tasks in package.json matching the `grunt-*` pattern.
	require('load-grunt-tasks')(grunt);

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		/**
		 * Bind Grunt tasks to Git hooks.
		 *
		 * @link https://github.com/wecodemore/grunt-githooks
		 */
		githooks: {
			all: {
				'pre-commit': 'default'
			}
		},

		/**
		 * Compile Sass into CSS using node-sass.
		 *
		 * @link https://github.com/sindresorhus/grunt-sass
		 */
		sass: {
			options: {
				outputStyle: 'expanded',
				indentType: 'tab',
				indentWidth: 1,
				precision: 8,
				sourceComments: true,
				sourceMap: true
			},
			dist: {
				files: {
					'css/style.css': 'sass/style.scss'
				}
			}
		},

		/**
		 * Apply several post-processors to CSS using PostCSS.
		 *
		 * @link https://github.com/nDmitry/grunt-postcss
		 */
		postcss: {
			options: {
				map: true,
				processors: [
					//require('autoprefixer')({ browsers: ['last 2 versions'] }),
					require('autoprefixer')({ browsers: [
						'Android 2.3',
						'Android >= 4',
						'Chrome >= 20',
						'Firefox >= 24',
						'Explorer >= 8',
						'iOS >= 6',
						'Opera >= 12',
						'Safari >= 6'
					] }),
					require('css-mqpacker')({ sort: true })
				]
			},
			dist: {
				src: ['css/style.css', '!*.min.js']
			}
		},

		/**
		 * A modular minifier, built on top of the PostCSS ecosystem.
		 *
		 * @link https://github.com/ben-eb/cssnano
		 */
		cssnano: {
			options: {
				autoprefixer: false,
				safe: true
			},
			dist: {
				files: {
					'css/style.min.css': 'css/style.css'
				}
			}
		},

		/**
		 * Concatenate files.
		 *
		 * @link https://github.com/gruntjs/grunt-contrib-concat
		 */
		concat: {
			dist: {
				src: ['/js/concat/*.js'],
				dest: '/js/project.js'
			}
		},

		/**
		 * Minify files with UglifyJS.
		 *
		 * @link https://github.com/gruntjs/grunt-contrib-uglify
		 */
		uglify: {
			build: {
				options: {
					sourceMap: true,
					mangle: false
				},
				files: [{
					expand: true,
					cwd: 'js/',
					src: ['**/*.js', '!**/*.min.js', '!concat/*.js', '!customizer.js'],
					dest: 'assets/js/',
					ext: '.min.js'
				}]
			}
		},

		/**
		 * Run tasks whenever watched files change.
		 *
		 * @link https://github.com/gruntjs/grunt-contrib-watch
		 */
		watch: {
//			scripts: {
//				files: ['js/**/*.js'],
//				tasks: ['javascript'],
//				options: {
//					spawn: false,
//					livereload: true,
//				},
//			},
			css: {
				files: ['sass/**/*.scss'],
				tasks: ['styles'],
				options: {
					spawn: false,
					livereload: true
				}
			}
		},

		/**
		 * Grunt plugin for running PHP Code Sniffer.
		 *
		 * @link https://github.com/SaschaGalley/grunt-phpcs
		 */
		phpcs: {
			application: {
				dir: [
					'**/*.php',
					'!**/node_modules/**'
				]
			},
			options: {
				//bin: '~/phpcs/scripts/phpcs',
				standard: 'WordPress'
			}
		},

		/**
		 * Automatic Notifications when Grunt tasks fail.
		 *
		 * @link https://github.com/dylang/grunt-notify
		 */
		notify_hooks: {
			options: {
				enabled: true,
				max_jshint_notifications: 5,
				title: "cmmp",
				success: false,
				duration: 2
			}
		}
	});

	// Register Grunt tasks.
	grunt.registerTask('styles', ['sass', 'postcss', 'cssnano']);
	grunt.registerTask('javascript', ['concat', 'uglify']);
	grunt.registerTask('default', ['styles']);

	// grunt-notify shows native notifications on errors.
	grunt.loadNpmTasks('grunt-notify');
	grunt.task.run('notify_hooks');
};
