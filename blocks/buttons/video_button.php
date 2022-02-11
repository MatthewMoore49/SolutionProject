<?php
/**
 * Video Button Block Template.
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

$video = get_field('video');
$style = get_field('style');

if (!$style) {
	$style = 'btn-primary';
}

?>

<div class="btn-container <?php echo $classes; ?>" id="<?php echo $block['anchor']; ?>">
	<?php if($is_preview): ?>
		<span class="btn btn-video <?php echo $style; ?>">Play Video <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="18" height="18"><path fill="currentColor" d="M371.7 238l-176-107c-15.8-8.8-35.7 2.5-35.7 21v208c0 18.4 19.8 29.8 35.7 21l176-101c16.4-9.1 16.4-32.8 0-42zM504 256C504 119 393 8 256 8S8 119 8 256s111 248 248 248 248-111 248-248zm-448 0c0-110.5 89.5-200 200-200s200 89.5 200 200-89.5 200-200 200S56 366.5 56 256z"></path></svg></span>
	<?php else: ?>

		<button type="button" class="btn btn-video <?php echo $style; ?>" data-bs-toggle="modal" data-bs-target="#vm<?php echo $block['id']; ?>" data-bs-video="<?php echo $video; ?>" title="Play Video">Play Video <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="18" height="18"><path fill="currentColor" d="M371.7 238l-176-107c-15.8-8.8-35.7 2.5-35.7 21v208c0 18.4 19.8 29.8 35.7 21l176-101c16.4-9.1 16.4-32.8 0-42zM504 256C504 119 393 8 256 8S8 119 8 256s111 248 248 248 248-111 248-248zm-448 0c0-110.5 89.5-200 200-200s200 89.5 200 200-89.5 200-200 200S56 366.5 56 256z"></path></svg></button>

		<div class="modal fade video-modal" id="vm<?php echo $block['id']; ?>" tabindex="-1" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
		    <div class="modal-content">

		      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="18" height="26"><path fill="#211b3e" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg></button>

		      <div class="modal-body">
		      	<div class="ratio ratio-16x9">
		        	<iframe id="iframe<?php echo $block['id']; ?>" src=""></iframe>
		        </div>
		      </div>

		    </div>
		  </div>
		</div>


	<script type="text/javascript">
		let videoModal<?php echo $block['id']; ?> = document.getElementById('vm<?php echo $block['id']; ?>');

		videoModal<?php echo $block['id']; ?>.addEventListener('show.bs.modal', function (event) {

		  let button = event.relatedTarget;
		  let video = button.getAttribute('data-bs-video');
		  let iframe = document.getElementById('iframe<?php echo $block['id']; ?>');

		  iframe.src = video;
		})

		videoModal<?php echo $block['id']; ?>.addEventListener('hide.bs.modal', function (event) {

		  let iframe = document.getElementById('iframe<?php echo $block['id']; ?>');

		  iframe.src = '';
		})
	</script>
	<?php endif; ?>
</div>