<?php
/**
 * Grid Items/3 Buckets Block Template.
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

$bg_color = get_field('settings')['background_color'];
$padded = get_field('settings')['padded'];
$image_side = get_field('settings')['image_side'];


$classes .= ' ' . $bg_color;

$bg_padded = false;
// if ($bg_color != 'has-white-background-color' && $padded == true):
if ($padded == true):
	$classes .= ' fullwidth bg-padded';
	$bg_padded = true;
endif;


$image = get_field('image');

//$col_classes = 'col-md-6 col-lg-5 col-xxl-4';
$col_classes = 'col-md-6 col-lg-5';
$row_classes = 'justify-content-around justify-content-xxl-between';
if(!$padded):
	$classes .= ' fullwidth';
	$col_classes = 'col-md-6';
	$row_classes = '';
endif;

if (get_field('settings')['align_top'] == true):
	$row_classes .= ' align-items-start';
else:
	$row_classes .= ' align-items-center';
endif;

$allowed_blocks = array( 'core/heading', 'core/paragraph', 'core/separator', 'core/list', 'acf/button', 'acf/video-button', 'acf/modal-button', 'core/image', 'acf/accordion-wrapper', 'core/spacer', 'core/block', 'core/table' );
$template = array(
	array('core/heading', array(
		'level' => 2,
		'content' => 'Title Goes Here',
	)),
    array( 'core/paragraph', array(
        'content' => 'Lorem Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    ) )
);
?>
<div class="two-col two-col<?php echo $block['id']; ?><?php echo esc_attr($classes); if ($image_side == 'right'): echo ' image-right'; endif; ?>" id="<?php echo $block['anchor']; ?>">

	<?php if ($bg_padded): ?>
		<div class="container-xxl">
	<?php endif; ?>

	<div class="row g-0 <?php echo $row_classes; ?>">

		<div class="<?php echo $col_classes; if ($image_side == 'right'): echo ' order-md-1'; endif; ?> two-col-img">
			<?php if($image): ?>
				<picture>
					<source srcset="<?php echo $image['sizes']['large']; ?>" media="(min-width: 1200px)" />
					<source srcset="<?php echo $image['sizes']['mobile']; ?>" media="(min-width: 767px)" />
					<source srcset="<?php echo $image['sizes']['medium_large']; ?>" media="(min-width: 567px)" />
					<img class="img-fluid" src="<?php echo $image['sizes']['mobile']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" loading="lazy" width="800" height="800">
				</picture>
			<?php else: ?>
				<img class="img-fluid" src="https://via.placeholder.com/800" />
			<?php endif; ?>
		</div>

		<div class="<?php echo $col_classes; ?> content">
			<InnerBlocks allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>" template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>" />
		</div>
	</div>

	<?php if ($bg_padded): ?>
		</div>
	<?php endif; ?>
</div>