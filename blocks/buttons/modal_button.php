<?php
/**
 * Button Block Template.
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

$cta = get_field('button_text');
$style = get_field('style');
$show_modal = get_field('show_modal');

if (!$cta) {
	$cta = 'Call to action';
}
if (!$style) {
	$style = 'btn-primary';
}

$template = array(
	array('core/heading', array(
		'level' => 3,
		'content' => 'Title Goes Here',
		'textAlign' => 'center'
	)),
    array( 'core/paragraph', array(
        'content' => 'Lorem Ipsum dolor sit amet, consectetur adipiscing elit.',
		'align' => 'center',
    ) ),
);
?>

<div class="btn-container <?php echo $classes; ?>" id="<?php echo $block['anchor']; ?>">
	<?php if($is_preview): ?>
		<span class="btn <?php echo $style; ?>"><?php echo $cta; ?></span>
	<?php else: ?>

		<button type="button" class="btn <?php echo $style; ?>" data-bs-toggle="modal" data-bs-target="#vm<?php echo $block['id']; ?>" title="<?php echo $cta; ?>"><?php echo $cta; ?></button>

		<div class="modal fade" id="vm<?php echo $block['id']; ?>" tabindex="-1" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
		    <div class="modal-content">

		      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="18" height="26"><path fill="#211b3e" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg></button>

		      <div class="modal-body">
		        <InnerBlocks template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>" />
		      </div>

		    </div>
		  </div>
		</div>
	<?php endif; ?>


	<?php if($is_preview && $show_modal): ?>
		<div class="modal-preview modal-preview<?php echo $block['id']; ?>">
			<InnerBlocks template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>" />
		</div>

		<style type="text/css">
			.modal-preview<?php echo $block['id']; ?>{
				display: block;
				position: fixed;
				top: 150px;
				left: 400px;
				right: 400px;
				bottom: 150px;
				background-color: #fff;
				border: 2px solid #eee;
				padding: 50px;
				z-index: 999999;
				overflow-y: auto;
			}
		</style>
	<?php endif; ?>
</div>