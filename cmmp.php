<?php
/*
Plugin Name: CodeMastermind Plugin
Plugin URI:  https://github.com/Kulllord/codemastermind-plugin
Description: This is my custom plugin for testing and development.
Version:     0.1.0
Author:      Christopher Parker
Author URI:  http://codemastermind.com
License:
License URI:
Domain Path:
Text Domain:
*/



/**
 * Remove paragraph tags.
 *
 * Remove p tags from content especially if there is only an opening tag and no
 * closing tag or vice-versa. By default it does not re-autop the results.
 *
 * @since 0.1.0
 *
 * @param type $content
 * @param bool $autop Optional. Should the result be run through wpautop() or
 *     not. Default false.
 * @return string
 */
function cmmp_remove_wpautop( $content, $autop = false ) {
	$content = preg_replace( '/<\/?p\>/', "\n", $content ) . "\n";

	if ( $autop ) {
		// $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
		$content = wpautop( $content );
	}

	return do_shortcode( shortcode_unautop( $content ) );
}


/**
 * Summary.
 */
include('inc/shortcodes.php');


function cmmp_setup_post_types() {

	/**
	 * Load Custom Post Types.
	 */
	include 'inc/custom-post-types.php';

}
add_action( 'init', 'cmmp_setup_post_types' );

function cmmp_install() {

	// Trigger our function that registers the custom post type
	cmmp_setup_post_types();

	// Clear the permalinks after the post type has been registered
	flush_rewrite_rules();

}
register_activation_hook( __FILE__, 'cmmp_install' );

function cmmp_deactivation() {

	// Our post type will be automatically removed, so no need to unregister it

	// Clear the permalinks to remove our post type's rules
	flush_rewrite_rules();

}
register_deactivation_hook( __FILE__, 'cmmp_deactivation' );

function cmmp_custom_scripts() {
	wp_enqueue_style( 'cmmp-custom-css', plugins_url( '/css/style.css', __FILE__ ) );
	// wp_enqueue_style( 'cmmp-custom-titlebar-css', plugins_url('/css/titlebar.css', __FILE__ ) );

	// wp_enqueue_script( 'cmmp-cta-tabs-js', plugins_url( '/js/cta-tabs.js', __FILE__ ), array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'cmmp_custom_scripts' );


/*
 * Documentation Notes
 *
 * @url https://make.wordpress.org/core/handbook/best-practices/inline-documentation-standards/php/
 *
 * multi line comments should just begin with a single asterisk /*
 * DocBlock or Documentation code should begin with a double asterisk /**
 *
 * Content notes should end here xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
 * Content notes should end at the 80 character mark xxxxxxxxxxxxxxxxxxxxxxxxxx
 *     With alterations allowed for differences in indentation xxxxxxxxxxxxxxxxxxxx
 *         With alterations allowed for differences in indentation xxxxxxxxxxxxxxxxxxxx
 * urls like the one above do not need to be split for obvious reasons
 *
 */

/*
 * File header comment block example
 *
 * Whenever possible, all WordPress files should contain a header block, regardless of
 * the file’s contents – this includes files containing classes.
 */
/**
 * Summary (no period for file headers)
 *
 * Description. (use period)
 *
 * @link URL
 *
 * @package WordPress
 * @subpackage Component
 * @since x.x.x (when the file was introduced)
 */
/**
 * Summary
 *
 * Description.
 *
 * @package WordPress
 * @since 0.1.0
 */


// function comment block example
/**
 * Summary.
 *
 * Description.
 *
 * @since x.x.x
 * @access (for functions: only use if private)
 *
 * use the following two lines for depricated functions only
 * @deprecated x.x.x Use new_function_name()
 * @see new_function_name()
 *
 * @see Function/method/class relied on
 * @link URL
 * @global type $varname Description.
 * @global type $varname Description.
 *
 * @param type $var Description. Default 'value'.
 * @param array $args {
 *     Optional. An array of arguments.
 *
 *     @type type $key Description. Default 'value'. Accepts 'value', 'value'.
 *                     (aligned with Description, if wraps to a new line)
 *     @type type $key Description.
 * }
 * @param type $var Optional. Description. Default 'value'.
 * @return type Description.
 */

// Include comment block example.
/**
 * Summary.
 */
