wp.domReady( () => {
	wp.blocks.unregisterBlockType( 'core/rss' );
	wp.blocks.unregisterBlockType( 'core/search' );
	wp.blocks.unregisterBlockType( 'core/latest-comments' );
	wp.blocks.unregisterBlockType( 'core/tag-cloud' );
	wp.blocks.unregisterBlockType( 'core/calendar' );
	wp.blocks.unregisterBlockType( 'core/more' );
	wp.blocks.unregisterBlockType( 'core/social-link' );
	wp.blocks.unregisterBlockType( 'core/social-links' );
	wp.blocks.unregisterBlockType( 'core/buttons' );
	wp.blocks.unregisterBlockType( 'core/button' );
	wp.blocks.unregisterBlockType( 'core/code' );
	// wp.blocks.unregisterBlockType( 'core/classic' );
	wp.blocks.unregisterBlockType( 'core/preformatted' );
	wp.blocks.unregisterBlockType( 'core/verse' );
	wp.blocks.unregisterBlockType( 'core/media-text' );
	wp.blocks.unregisterBlockType( 'core/cover' );
	wp.blocks.unregisterBlockType( 'core/columns' );
	// wp.blocks.unregisterBlockType( 'core/page-break' );
	wp.blocks.unregisterBlockType( 'core/archives' );
	wp.blocks.unregisterBlockType( 'core/categories' );
	wp.blocks.unregisterBlockType( 'core/latest-posts' );
	wp.blocks.unregisterBlockType( 'core/quote' );
	wp.blocks.unregisterBlockType('core/embed');

	// for FSE and theme templates
	wp.blocks.unregisterBlockType('core/site-logo');
	wp.blocks.unregisterBlockType('core/site-tagline');
	wp.blocks.unregisterBlockType('core/site-title');
	wp.blocks.unregisterBlockType('core/query-title');
	wp.blocks.unregisterBlockType('core/post-terms');
	wp.blocks.unregisterBlockType('core/loginout');
	wp.blocks.unregisterBlockType('core/page-list');
	wp.blocks.unregisterBlockType('core/query');
	wp.blocks.unregisterBlockType('core/post-title');
	wp.blocks.unregisterBlockType('core/post-content');
	wp.blocks.unregisterBlockType('core/post-date');
	wp.blocks.unregisterBlockType('core/post-excerpt');
	wp.blocks.unregisterBlockType('core/post-featured-image');


	wp.blocks.unregisterBlockStyle(
		'core/separator',
		[ 'default', 'wide', 'dots' ],
	);

	wp.blocks.unregisterBlockStyle(
		'core/pullquote',
		[ 'default' ]
	);

} );