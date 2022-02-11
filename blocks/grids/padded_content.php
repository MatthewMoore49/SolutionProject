<?php
/**
 * Padded Content Section Block Template.
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

// ACF Fields
$bg_color = get_field('background_color');
$classes .= ' ' . $bg_color;


$allowed_blocks = array( 'core/heading', 'core/paragraph', 'acf/button', 'core/list', 'core/table', 'acf/video-button', 'acf/modal-button', 'core/image', 'core/spacer', 'core/html' );
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
);
?>
<div class="<?php echo esc_attr($classes); ?> padded-content alignfull padded<?php echo $block['id']; ?>" id="<?php echo $block['anchor']; ?>">
	<div class="container-xxl">
		<div class="row">
			<div class="col-md-10 col-xl-8 mx-auto">
				<InnerBlocks allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>" template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>" />
			</div>
		</div>
	</div>
</div>