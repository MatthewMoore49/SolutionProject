<?php get_header(); ?>

<div class="container-xxl">
	<div class="row">
		<div class="col">
			<?php echo apply_filters('the_content', $post->post_content); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>