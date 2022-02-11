<?php 
	$queried = get_queried_object();
	$catID = $queried->term_id; 

	// blog
	$cats = get_terms(array(
		'taxonomy' => 'category',
		'hide_empty' => true,
	));

	// this should be your blog page url
	$form_action = '/blog';

	$searchQuery = '';
	if( isset($_GET['search'] )) {
		$searchQuery = esc_attr($_GET['search']);
	}
?>
<div class="blog-sidebar">
	<div class="row justify-content-around">
		<div class="col-md-4">
			<form action="<?php echo $form_action; ?>">
				<label for="s" class="visually-hidden">Search</label>
				<input type="text" name="search" id="search" placeholder="Search" value="<?php echo $searchQuery; ?>" />
			</form>
		</div>
		<div class="col-md-4 blog-sidebar-clear">
			<?php if( isset($_GET['search'] )): ?>
				<a href="/blog" class="btn btn-primary">Clear Search</a>
			<? endif; ?>
		</div>
		<div class="col-md-4">
			<label for="blog-categories" class="visually-hidden">Categories</label>
			<select name="blog-categories" onchange="document.location.href=this.value">
				<option value="<?php echo $form_action; ?>">Show All Categories</option>
				<?php foreach($product_cats as $c): ?>
					<option value="<?php echo get_category_link( $c->term_id ); ?>"<?php if($c->term_id == $catID){ echo ' selected';} ?>><?php echo $c->name . ' - ' . $c->count; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
</div>