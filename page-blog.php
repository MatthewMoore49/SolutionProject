<?php get_header(); ?>

	<div class="container-xxl">
		<div class="row">
			<div class="col-12">
				<?php get_sidebar(); ?>
			</div>

			<?php
			$pageNumber = ($paged) ? $paged : 1;
			$searchQuery = '';
			if( isset($_GET['search'] )) {
				$searchQuery = esc_attr($_GET['search']);
			}

			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 12,
				'post_status' => 'publish',
				'paged' => $pageNumber,
				's' => $searchQuery
			);
			$query = new WP_Query($args);
			foreach($query->posts as $p):

				$args = array( 'post' => $p );
				get_template_part( 'template-parts/blog', 'list', $args );

			endforeach; ?>


			<div class="col-lg-12">
				<div class="blog-pagination">
					<?php
						echo paginate_links( array(
							'current' => max( 1, $paged ),
							'total' => $query->max_num_pages
						) );
					?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
