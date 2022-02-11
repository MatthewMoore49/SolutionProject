<?php
/**
 * Blog Related Posts Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$most_recent = get_field('most_recent');
$posts = get_field('related_posts');

if ($most_recent) {
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 3,
		'post_status' => 'publish'
	);
	$query = new WP_Query($args);

	$posts = $query->posts;
}

?>

<div class="related-posts fullwidth" id="<?php echo $block['anchor']; ?>">
	<div class="container-xxl">
		<div class="row justify-content-center">
			<div class="col-12 text-center">
				<h2><?php echo ($most_recent ? 'Most Recent Posts' : 'Featured Posts'); ?></h2>
			</div>
			
			<?php foreach($posts as $p):

				// gets the subfield of our repeater
				if (!$most_recent) { $p = $p['post']; }

				$args = array( 'post' => $p );
				get_template_part( 'template-parts/blog', 'grid', $args );

			endforeach; ?>
		</div>
	</div>
</div>
