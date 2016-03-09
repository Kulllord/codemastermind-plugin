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
 * A CTA(call to action) shortcode.
 *
 * This function creates a call to action with an icon/img, title, content and
 * button all center aligned. The button must be included within the content as
 * the [cmmp_button] shortcode.
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
 * @param string $content Description. Default null.
 * @return string
 */
function cmmp_cta_shortcode( $atts, $content = null ) {
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
 *     @type string 'color' The border color. Default 'value'. Accepts all color values.
 *     @type string 'width' Width of the seperator in percents. Default '100'. Accepts multiples of 10.
 *     @type string 'alignment' The alignment of the seperator. Default 'center'. Accepts 'left', 'center', 'right'.
 *     @type string 'id' ID for the html id attribute. Default ''.
 *     @type string 'class' CSS class or classes seperated by spaces. Default ''.
 * }
 * @return string
 */
function cmmp_seperator_shortcode( $atts ) {
	$defaults = array(
		'color' => '#d7d7d7',
		'width' => 100,
		'alignment' => 'center',
		'id' => '',
		'class' => '',
	);
	$return = '';
	$atts = shortcode_atts( $defaults, $atts, 'cmmp_seperator' );

	$attributes = '';
	$outer_class = 'cmmp-seperator clear ';
	$inner_class = '';

	switch( $atts['alignment'] ) {
		case 'left': $inner_class .= 'cmmp-seperator-align-left ';
			break;
		case 'right': $inner_class .= 'cmmp-seperator-align-right ';
			break;
		default: $inner_class .= '';
	}

	if ( ! empty( $atts['id'] ) ) {
		$attributes .= 'id="' . $atts['id'] . '" ';
	}

	if ( ! empty( $atts['class'] ) ) {
		$outer_class .= $atts['class'];
	}
	$attributes .= 'class="' . $outer_class . '" ';

	if ( ! empty( $atts['color'] ) && $defaults['color'] != $atts['color'] ) {
		$attributes .= 'style="border-color: ' . $atts['color'] . ';" ';
	}


	switch( $atts['width'] ) {
		case '10': $inner_class .= 'cmmp-seperator-width-10';
			break;
		case '20': $inner_class .= 'cmmp-seperator-width-20';
			break;
		case '30': $inner_class .= 'cmmp-seperator-width-30';
			break;
		case '40': $inner_class .= 'cmmp-seperator-width-40';
			break;
		case '50': $inner_class .= 'cmmp-seperator-width-50';
			break;
		case '60': $inner_class .= 'cmmp-seperator-width-60';
			break;
		case '70': $inner_class .= 'cmmp-seperator-width-70';
			break;
		case '80': $inner_class .= 'cmmp-seperator-width-80';
			break;
		case '90': $inner_class .= 'cmmp-seperator-width-90';
			break;
		default: $inner_class .= 'cmmp-seperator-width-100';
	}

	ob_start();

	?>

	<div <?php echo $attributes; ?>>
		<div class="<?php echo $inner_class; ?>"></div>
	</div>

	<?php

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
	// add_shortcode( 'cmmp_big_block', 'cmmp_big_block_shortcode');
	add_shortcode( 'cmmp_button', 'cmmp_button_shortcode');
	add_shortcode( 'cmmp_cta', 'cmmp_cta_shortcode');
	// add_shortcode( 'cmmp_cta_tabs', 'cmmp_cta_tabs_shortcode');
	// add_shortcode( 'cmmp_events', 'cmmp_events_shortcode');
	// add_shortcode( 'cmmp_impact', 'cmmp_impact_shortcode');
	// add_shortcode( 'cmmp_news', 'cmmp_news_shortcode');
	add_shortcode( 'cmmp_seperator', 'cmmp_seperator_shortcode');
	// add_shortcode( 'cmmp_stat_block', 'cmmp_stat_block_shortcode');
}
add_action('init', 'cmmp_custom_register_shortcodes');
