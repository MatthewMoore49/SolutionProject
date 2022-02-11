<?php
/**
 * Grid Wrapper Block Template.
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


$columns_per_row_desktop = get_field('settings')['columns_per_row_desktop'];
$columns_per_row_tablet = get_field('settings')['columns_per_row_tablet'];
$columns_per_row_mobile = get_field('settings')['columns_per_row_mobile'];
$section_background_color = get_field('settings')['section_background_color'];
$grid_vertical_align = get_field('settings')['grid_vertical_align'];
$grid_horizontal_align = get_field('settings')['grid_horizontal_align'];


$classes .= ' ' .  $columns_per_row_mobile . ' ' .  $columns_per_row_tablet . ' ' . $columns_per_row_desktop . ' ' . $grid_vertical_align . ' ' . $grid_horizontal_align . ' ' . $section_background_color;

$allowed_blocks = array( 'core/heading', 'core/paragraph',  'core/spacer', 'acf/grid-item', 'acf/grid-item-text', 'acf/button', 'acf/video-button', 'acf/modal-button' );
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
	array('core/spacer', array(
		'height' => 1
	)),
    array( 'acf/grid-item', array(), array() ),
    array( 'acf/grid-item', array(), array() ),
    array( 'acf/grid-item', array(), array() ),
);
?>
<div class="grid-wrapper fullwidth row <?php echo esc_attr($classes); ?>" id="<?php echo $block['anchor']; ?>">
	<?php if (!$is_preview): ?>
		<div class="col">
			<div class="container-xxl">
				<div class="row <?php echo $grid_vertical_align . ' ' . $grid_horizontal_align; ?>">
	<?php endif; ?>

	<InnerBlocks allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>" template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>" />
		
	<?php if (!$is_preview): ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>