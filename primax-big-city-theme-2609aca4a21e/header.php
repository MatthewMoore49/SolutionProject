<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?>

	<link href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" rel="icon" />
	<link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" rel="stylesheet">
	
</head>
<body <?php body_class(); ?>>

<header class="main">
	<div class="container-xxl">
		<div class="row">
			<div class="col-12 navbar">
				<a href="<?php echo home_url(); ?>"><img class="navbar-logo" src="//placehold.it/300x100" alt="<?php bloginfo( 'name' ); ?>" /></a>

				<button class="navbar-toggler" type="button">
					<svg class="navbar-toggler-open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="38"><path fill="#000" d="M436 124H12c-6.627 0-12-5.373-12-12V80c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12z"></path></svg>
					<svg class="navbar-toggler-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="18" height="38"><path fill="#000" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z"></path></svg>
				</button>

				<nav>
					<ul class="navbar-menu">
						<?php
							wp_nav_menu( [
								'menu'            => 'primary',
								'depth'           => 2,
								'container'       => false,
								'items_wrap'      => '%3$s',
								'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
								'walker'          => new WP_Bootstrap_Navwalker()
							] );
						?>

						<?php /* Woocommerce cart button with item count
						<?php 
							// show cart items count in nav
							global $woocommerce;
							$count = $woocommerce->cart->get_cart_contents_count();
						?>
						<li><a class="view-cart" href="/cart">Cart (<?php echo $count; ?>)</a></li>
						*/ ?>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</header>