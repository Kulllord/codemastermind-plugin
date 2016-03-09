<?php
/**
 * Build the shortcode cmmp_button
 *
 * @package WordPress
 * @since 0.1.0
 */

$attributes = '';
$attributes .= ( ! empty( $atts['id'] ) ) ? 'id="' . $atts['id'] . '" ' : '';
$attributes .= 'class="cmmp-button ' . $atts['class'] . '" ';
$attributes .= ( ! empty( $atts['link'] ) ) ? 'href="' . $atts['link'] . '" ' : '';
$attributes .= ( ! empty( $atts['target'] ) ) ? 'target="' . $atts['target'] . '" ' : '';
$attributes .= ( ! empty( $atts['link_title'] ) ) ? 'title="' . $atts['title'] . '" ' : 'title="' . $atts['text'] . '" ';
$attributes .= ( ! empty( $atts['link'] ) ) ? 'href="' . $atts['link'] . '" ' : '';
?>

<div class="cmmp-button-box">
	<a <?php echo $attributes; ?>><?php echo $atts['text']; ?></a>
</div>
