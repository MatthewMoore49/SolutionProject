<?php
/**
 * Grid Item Block Template.
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
$allowed_blocks = array( 'core/heading', 'core/paragraph', 'acf/button', 'core/image', 'core/list', 'acf/video-button', 'acf/modal-button', 'core/spacer', 'core/table', 'core/html' );

$template = array(
	array('core/image', array(
		'sizeSlug' =>'large',
		'className' => 'is-style-default img-fluid',
		'align' => 'center'
	)),
	array('core/heading', array(
		'level' => 3,
		'content' => 'Title Goes Here',
		'textAlign' => 'center'
	)),
	array( 'acf/button', array(
		'align' => 'center'
	)),
);
?>
<div class="grid-item<?php echo $classes; ?>">
	<InnerBlocks allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>" template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>" />
</div>