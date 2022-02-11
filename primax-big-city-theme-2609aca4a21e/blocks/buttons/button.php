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
$cta = get_field('cta');
$style = get_field('style');

if (!$cta) {
	$cta = array('title' => 'Call to action', 'url' => '#', 'target' => '');
}
if (!$style) {
	$style = 'btn-primary';
}
?>

<div class="btn-container<?php echo $classes; ?>" id="<?php echo $block['anchor']; ?>">
	<?php if($is_preview): ?>
		<span class="btn <?php echo $style; ?>"><?php echo $cta['title']; ?></span>
	<?php else: ?>
		<a class="btn <?php echo $style; ?>" href="<?php echo $cta['url']; ?>" target="<?php echo $cta['target'] ? $cta['target'] : '_self'; ?>" title="<?php echo $cta['title']; ?>"><?php echo $cta['title']; ?></a>
	<?php endif; ?>
</div>