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


$allowed_blocks = array( 'acf/tab-item' );
$template = array(
    array( 'acf/tab-item', array('data' => array('tab_title' => 'Tab 1')), array() ),
    array( 'acf/tab-item', array('data' => array('tab_title' => 'Tab 2')), array() ),
    array( 'acf/tab-item', array('data' => array('tab_title' => 'Tab 3')), array() ),
);
?>

<div class="tab-wrapper<?php echo esc_attr($classes); ?>" id="tab-<?php echo $block['id'];?>">
	<nav>
		<div class="nav nav-tabs" id="tab-list-<?php echo $block['id'];?>" role="tablist"></div>
	</nav>
	<div class="tab-content" id="">
		<InnerBlocks allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>" template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>" />
	</div>
</div>

<?php if(!$is_preview): ?>
<script type="text/javascript">
	let tabs<?php echo $block['id'];?> = document.querySelectorAll("#<?php echo 'tab-' . $block['id'];?> .tab-pane");
	let tabBtns<?php echo $block['id'];?> = '';

	tabs<?php echo $block['id'];?>.forEach((tab, index) => {
		let active = '';
		if(index == 0){
			active = ' active';
			tab.classList.add('active');
		}
		tabBtns<?php echo $block['id'];?> += '<button class="nav-link' + active +'" data-bs-toggle="tab" type="button" role="tab" data-bs-target="#' + tab.id + '">' + tab.dataset.title + '</button>'
	})

	document.getElementById("tab-list-<?php echo $block['id'];?>").innerHTML = tabBtns<?php echo $block['id'];?>;
</script>
<?php endif; ?>