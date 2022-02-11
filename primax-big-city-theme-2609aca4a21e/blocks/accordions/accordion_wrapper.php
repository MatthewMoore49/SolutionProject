<?php
/**
 * Accordion Wrapper Block Template.
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

// ACF Fields - General Settings
$bg_color = get_field('settings')['background_color'];

$classes .= ' fullwidth' . $bg_color;

$allowed_blocks = array( 'acf/accordion-item', 'core/heading', 'core/paragraph', 'acf/button', 'acf/modal-button', 'acf/video-button', 'core/spacer' );
$template = array(
	array('core/heading', array(
		'level' => 2,
		'content' => 'Title Goes Here',
		'textAlign' => 'center',
	)),
    array( 'core/paragraph', array(
        'content' => 'Lorem Ipsum dolor sit amet, consectetur adipiscing elit.',
		'align' => 'center',
    ) ),
    array( 'acf/accordion-item', array(), array() ),
);
?>

<div class="accordion-wrapper<?php echo esc_attr($classes); ?>" id="<?php echo $block['anchor']; ?>">
	<?php if ($bg_padded): ?>
		<div class="container-xxl">
			<div class="row">
				<div class="col-12 <?php echo $style; ?>">
	<?php endif; ?>

	<InnerBlocks allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>" template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>" />

	<?php if ($bg_padded): ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>
