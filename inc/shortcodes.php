<?php
/**
 * An Include that houses all of the custom shortcodes for the plugin
 *
 * Description. (use period)
 *
 * @link URL
 *
 * @package WordPress
 * @since 0.1.0
 */



/*
 * ============================================================================
 * ==== Shortcodes ============================================================
 * ============================================================================
 */

/**
 * A button building shortcode.
 *
 * Description.
 *
 * @since 0.1.0
 *
 * @param array $atts {
 *     Optional. An array of attributes for the shortcode.
 *
 *     @type string 'text' The text value of the link. Default ''.
 *     @type string 'link' Text for the 'href' attribute. Default 'value'.
 *     @type string 'target' Text for the 'target' attribute. Default ''.
 *     @type string 'link_title' Text for the 'title' attribute. Default $atts['text'].
 *     @type string 'id' ID for the html id attribute. Default ''.
 *     @type string 'class' CSS class or classes seperated by spaces. Default ''.
 * }
 * @return string
 */
function cmmp_button_shortcode($atts){
	$defaults = array(
		'text' => '',
		'link' => '',
		'target' => '',
		'link_title' => '',
		'id' => '',
		'class' => '',
	);
	$return = '';
	$atts = shortcode_atts($defaults, $atts, 'cmmp_button');

	ob_start();

	include('shortcodes/cmmp-button.php');

	$return = ob_get_clean();

	return $return;
}

/**
 * Summary.
 *
 * Description.
 *
 * @since 0.1.0
 *
 * @param array $atts {
 *     Optional. An array of attributes for the shortcode.
 *
 *     @type string 'title' Description. Default ''.
 *     @type bool 'title_caps' Is the title in all caps. Default true.
 *     @type string 'src' The link to the icon image. Default ''.
 *     @type bool 'is_svg' Description. Default false.
 *     @type string 'id' ID for the html id attribute. Default ''.
 *     @type string 'class' CSS class or classes seperated by spaces. Default ''.
 * }
 * @return string
 */
/* Usage
**	[cmmp_cta
**		title="Title text under the Icon"
**		title_caps="all_caps"
**		src="link to the icon"
**		is_svg="default:false"
**		link_text=""
**		link="page to lead to"
**		target=""
**		link_title="link hover text"
**	]
**		content
**	[/cmmp_cta]*/
function cmmp_cta_shortcode( $atts, $content = null ){
	$defaults = array(
		'title' => '',
		'title_caps' => true,
		'src' => '',
		'is_svg' => false,
		'id' => '',
		'class' => '',
	);
	$return = '';
	$atts = shortcode_atts($defaults, $atts, 'cmmp_cta');

	ob_start();

	include('shortcodes/cta.php');

	$return = ob_get_clean();

	return $return;
}

/**
 * Summary.
 *
 * Description.
 *
 * @since 0.1.0
 *
 * @param array $atts {
 *     Optional. An array of attributes for the shortcode.
 *
 *     @type type $key Description. Default 'value'. Accepts 'value', 'value'.
 *     @type string 'id' ID for the html id attribute. Default ''.
 *     @type string 'class' CSS class or classes seperated by spaces. Default ''.
 * }
 * @return string
 */



function cmmp_custom_register_shortcodes() {
	add_shortcode( 'cmmp_button', 'cmmp_button_shortcode');
	add_shortcode( 'cmmp_cta', 'cmmp_cta_shortcode');
	// add_shortcode( 'cmmp_stat_block', 'cmmp_stat_block_shortcode');
	// add_shortcode( 'cmmp_big_block', 'cmmp_big_block_shortcode');
	// add_shortcode( 'cmmp_news', 'cmmp_news_shortcode');
	// add_shortcode( 'cmmp_events', 'cmmp_events_shortcode');
	// add_shortcode( 'cmmp_impact', 'cmmp_impact_shortcode');
	// add_shortcode( 'cmmp_seperator', 'cmmp_seperator_shortcode');
	// add_shortcode( 'cmmp_cta_tabs', 'cmmp_cta_tabs_shortcode');
}
add_action('init', 'cmmp_custom_register_shortcodes');
