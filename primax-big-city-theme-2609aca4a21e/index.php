<?php get_header(); ?>

<section class="basic-content py-40">
	<div class="container-xxl">
		<div class="row">
			<div class="col-lg-12">
				<h1><?php the_title(); ?></h1>
				<?php echo apply_filters('the_content', $post->post_content); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>