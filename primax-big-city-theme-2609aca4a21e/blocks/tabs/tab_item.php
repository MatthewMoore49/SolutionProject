<?php
/**
 * Tab Item Block Template.
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

$tab_title = get_field('tab_title');

$allowed_blocks = array( 'core/heading', 'core/paragraph', 'core/list', 'core/table', 'acf/button', 'acf/video-button', 'acf/modal-button', 'core/image', 'core/spacer', 'core/html' );
$template = array(
    array('core/heading', array(
		'level' => 3,
		'content' => 'Heading',
	)),
	array( 'core/paragraph', array(
        'content' => 'Lorem Ipsum dolor sit amet, consectetur adipiscing elit.',
    ) ),
);
?>

<div class="tab-pane tab-item<?php echo esc_attr($classes); ?>" id="<?php echo $block['id']; ?>" data-title="<?php echo $tab_title; ?>">
	<InnerBlocks allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>" template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>" />
</div>