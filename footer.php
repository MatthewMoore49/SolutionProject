<footer class="main">
	<div class="container-xxl">
		<div class="row">
			<div class="col-lg-4">
				<?php if(is_active_sidebar('footer-left')):
					dynamic_sidebar('footer-left');
				endif; ?>
			</div>
			
			<div class="col-lg-4">
				<?php if(is_active_sidebar('footer-center')):
					dynamic_sidebar('footer-center');
				endif; ?>
			</div>
			
			<div class="col-lg-4">
				<?php if(is_active_sidebar('footer-right')):
					dynamic_sidebar('footer-right');
				endif; ?>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12 text-center">
				<p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> | <a href="https://solutionagency.net" target="_blank" rel="nofollow">Web Design by Solution Agency</a></p>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>