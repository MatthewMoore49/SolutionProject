<?php
/**
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create class attribute allowing for custom "className" and "align" values.
$classes = '';
if( !empty($block['className']) ) {
    $classes .= sprintf( ' %s', $block['className'] );
}
if( !empty($block['align']) ) {
    $classes .= sprintf( ' align%s', $block['align'] );
}

$dots = get_field('settings')['dots'];
$arrows = get_field('settings')['arrows'];

$allowed_blocks = array( 'acf/slider-item' );
$template = array(
    array( 'acf/slider-item', array(), array() ),
    array( 'acf/slider-item', array(), array() ),
    array( 'acf/slider-item', array(), array() ),
);
?>

<div class="swiper-container swiper-container<?php echo $block['id']; ?> <?php echo esc_attr($classes); ?>">
	<div class="swiper-wrapper">
		<InnerBlocks allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>" template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>" />
	</div>

	<?php if($dots): ?>
		<!-- If we need pagination -->
		<div class="swiper-pagination swiper-pagination<?php echo $block['id']; ?>"></div>
	<?php endif; ?>

	<?php if($arrows): ?>
		<!-- If we need navigation buttons -->
		<div class="swiper-button-prev swiper-button-prev<?php echo $block['id']; ?>"></div>
		<div class="swiper-button-next swiper-button-next<?php echo $block['id']; ?>"></div>
	<?php endif; ?>
    
</div>


<?php if (!$is_preview): ?>

<script>
window.addEventListener('load', function() {

	const swiper<?php echo $block['id']; ?> = new Swiper('.swiper-container<?php echo $block['id']; ?>', {
		// Optional parameters
		direction: 'horizontal',
		loop: true,

		<?php if($dots): ?>
		// If we need pagination
		pagination: {
			el: '.swiper-pagination<?php echo $block['id']; ?>',
		},
		<?php endif; ?>

		<?php if($arrows): ?>
		// Navigation arrows
		navigation: {
			nextEl: '.swiper-button-next<?php echo $block['id']; ?>',
			prevEl: '.swiper-button-prev<?php echo $block['id']; ?>',
		},
		<?php endif; ?>
	});
});
</script>
<?php endif; ?>