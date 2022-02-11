<?php
/**
 * Accordion Item Block Template.
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

$allowed_blocks = array( 'core/heading', 'core/paragraph', 'core/list', 'core/separator', 'core/table', 'acf/table', 'acf/button', 'acf/video-button', 'acf/modal-button', 'core/image', 'acf/grid-wrapper', 'acf/two-col', 'acf/padded-content', 'core/spacer', 'acf/accordion-wrapper', 'core/html', 'acf/tab-wrapper' );
$template = array(
    array( 'core/paragraph', array(
        'content' => 'Lorem Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
    ) ),
);
?>

<div class="accordion-item<?php echo esc_attr($classes); ?>" id="<?php echo $block['anchor']; ?>">
	<button class="accordion-question">
		<?php 
		if (get_field('item')): 
			echo get_field('item');
		else:
			echo 'Accordion Item Text Here';
		endif; ?>

		<div class="accordion-question-icon"><svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 224 224"><polygon style="fill:#000;" points="57.179,223.413 51.224,217.276 159.925,111.71 51.224,6.127 57.179,0 172.189,111.71"/></svg></div>
	</button>
	<div class="accordion-answer">
		<div class="accordion-answer-content">
			<InnerBlocks allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>" template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>" />
		</div>
	</div>
</div>

<?php if( $is_preview ): ?>

<style>
	body #editor .editor-styles-wrapper .accordion-answer:not(.active) { height: auto !important; }
	body #editor .editor-styles-wrapper .accordion-answer-content { opacity: 1 !important; transform: scaleY(1) !important; }
	body #editor .editor-styles-wrapper .accordion-answer { padding: 0 !important; }
</style>

<?php endif; ?>