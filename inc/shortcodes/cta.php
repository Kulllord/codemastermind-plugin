<?php
/**
 * Build the shortcode cmmp_cta
 *
 * @package WordPress
 * @since 0.1.0
 */

$attributes = '';
$attributes .= ( ! empty( $atts['id'] ) ) ? 'id="' . $atts['id'] . '" ' : '';
$attributes .= 'class="cmmp-cta' . $atts['class'] . '" ';

$img_class = '';
$title_class = '';

if ( 'true' == $atts['is_svg'] || true === $atts['is_svg'] ) {
	$img_class = 'style-svg';
}

if ( 'true' == $atts['title_caps'] || true === $atts['title_caps'] ) {
	$title_class = ' normal_caps';
}
?>

<div <?php echo $attributes; ?>>
	<?php if ( ! empty( $atts['src'] ) ) { ?>
		<div class="cmmp-cta-icon-box">
			<img class="<?php echo $img_class; ?>" src="<?php echo $atts['src']; ?>">
		</div>
	<?php } ?>

	<h4 class="cmmp-cta-title <?php echo $title_class; ?>"><?php echo $atts['title']; ?></h4>

	<?php if ( ! empty( $content ) ) { ?>
		<div class="cmmp-cta-content">
			<?php echo cmmp_remove_wpautop( $content, true ); ?>
		</div>
	<?php } ?>
</div>
