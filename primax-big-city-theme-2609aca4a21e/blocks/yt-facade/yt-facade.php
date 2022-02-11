<?php
/**
 * YouTube Facade Block Template.
 *
 * @param   array      $block The block settings and attributes.
 * @param   string     $content The block inner HTML (empty).
 * @param   bool       $is_preview True during AJAX preview.
 * @param   int|string $post_id The post ID this block is saved to.
 */
$id = "yt-facade-${block['id']}";
if ( !empty( $block[ 'anchor' ] ) ) {
	$id = $block[ 'anchor' ];
}

$class = 'yt-facade';
if ( !empty( $block[ 'className' ] ) ) {
	$class .= ' ' . $block[ 'className' ];
}
if ( !empty( $block[ 'align' ] ) ) {
	$class .= ' ' . $block[ 'align' ];
}
?>
<lite-youtube id="<?= esc_attr( $id ); ?>" class="<?= esc_attr( $class ); ?>" videoid="<?= get_field( 'video_id' ); ?>"></lite-youtube>
