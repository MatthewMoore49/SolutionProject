<?php get_header(); ?>

<section class="single">
	<div class="container-xxl">
		<div class="row">
			<div class="col-lg-12">
				<?php echo apply_filters('the_content', $post->post_content); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>