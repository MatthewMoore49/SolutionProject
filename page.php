<?php get_header(); ?>

<section class="basic-content py-40">
	<div class="container-xxl">
		<div class="row">
			<div class="col-lg-12">
				<?php echo apply_filters('the_content', $post->post_content); ?>
			</div><!-- col -->
		</div><!-- row -->
	</div><!-- /container -->
</section><!-- /basic content -->

<?php get_footer(); ?>