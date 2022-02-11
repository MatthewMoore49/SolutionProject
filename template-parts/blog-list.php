<?php
	$p = $args['post'];

	$pid = $p->ID;
	$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($pid), 'mobile' );
	$featuredImageURL = $featuredImage[0];
	$content = wp_trim_words( $p->post_content, 25, '...' );
?>

<div class="col-12 blog-list-item">
	<div class="row">
		<div class="col-12 col-sm-3 col-lg-2">
			<a href="<?php echo get_permalink($pid); ?>">
				<?php if($featuredImage): ?>
					<img class="img-fluid" src="<?php echo $featuredImageURL; ?>" alt="<?php echo $p->post_title; ?>">
				<?php else: ?>
					<img class="img-fluid" src="https://via.placeholder.com/800x450">
				<?php endif; ?>
			</a>
		</div>
		<div class="col-12 col-sm-9 col-lg-10">
			<a href="<?php echo get_permalink($pid); ?>">
				<h3><?php echo $p->post_title; ?></h3>
				<p><?php echo get_the_date('', $pid); ?></p>
				<p><?php echo $content; ?></p>
			</a>
		</div>
	</div>
</div>