<?php
if( function_exists( 'acf_register_block_type' ) ) {
    add_action( 'acf/init', 'my_acf_init_block_types' );
}
function my_acf_init_block_types() {
    acf_register_block_type( [
        'name' => 'youtube-facade',
        'title' => __( 'YouTube Facade' ),
        'description' => __( 'Displays a YouTube facade block.' ),
        'render_template' => 'blocks/yt-facade/yt-facade.php',
        'enqueue_style' => get_template_directory_uri() . '/blocks/yt-facade/lite-yt-embed.css',
        'enqueue_script' => get_template_directory_uri() . '/blocks/yt-facade/lite-yt-embed.js',
        'mode' => 'edit',
        'category' => 'embed',
        'supports' => [
            'anchor' => true,
            'align' => false,
        ],
        'icon' => [
            'background' => '#ff0000',
            'foreground' => '#ffffff',
            'src' => 'youtube',
        ],
        'keywords' => [ 'video', 'youtube', 'facade' ],
    ] );

    // General Components --------------------------------------------------------------------
    // register a button block.
    acf_register_block_type(array(
        'name'              => 'button',
        'title'             => __('Button'),
        'description'       => __('Button block'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => true,
            'jsx' => false, 
            'mode' => false,
            'anchor' => true,
         ),
        'render_template'   => 'blocks/buttons/button.php',
        'category'          => 'text',
        'icon'              => 'button',
        'keywords'          => array( 'button', 'link' ),
    ));

    // register a video button block.
    acf_register_block_type(array(
        'name'              => 'video_button',
        'title'             => __('Video Button'),
        'description'       => __('Button that when clicked, will open a popup with a Youtube video'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => true,
            'jsx' => false, 
            'mode' => false,
            'anchor' => true,
         ),
        'render_template'   => 'blocks/buttons/video_button.php',
        'enqueue_script'     => get_template_directory_uri() . '/blocks/buttons/bootstrap_modal.js',
        'category'          => 'widgets',
        'icon'              => 'format-video',
        'keywords'          => array( 'button', 'link' ),
    ));

    // register a modal button block.
    acf_register_block_type(array(
        'name'              => 'modal_button',
        'title'             => __('Modal Button'),
        'description'       => __('Modal/Popup button block'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => true,
            'jsx' => true,
            'mode' => false,
            'anchor' => true,
         ),
        'render_template'   => 'blocks/buttons/modal_button.php',
        'enqueue_script'     => get_template_directory_uri() . '/blocks/buttons/bootstrap_modal.js',
        'category'          => 'widgets',
        'icon'              => 'format-video',
        'keywords'          => array( 'button', 'link' ),
    ));

    // Grid/Content Blocks --------------------------------------------------------------------
    // register a grid wrapper block.
    acf_register_block_type(array(
        'name'              => 'grid_wrapper',
        'title'             => __('Grid Wrapper'),
        'description'       => __('Grid Wrapper block that accepts grid items'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => false,
            'jsx' => true, 
            'mode' => false,
            'anchor' => true,
         ),
        'render_template'   => 'blocks/grids/grid_wrapper.php',
        'enqueue_style'     => get_template_directory_uri() . '/blocks/styles/grid_wrapper.css',
        'category'          => 'content',
        'icon'              => 'columns',
        'keywords'          => array( 'grid', 'wrapper' ),
    ));

    // register a grid item block.
    acf_register_block_type(array(
        'name'              => 'grid_item',
        'title'             => __('Grid Item'),
        'description'       => __('Grid Item block that accepts images, copy, and CTAs'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'jsx' => true,
            'anchor' => true,
         ),
        'render_template'   => 'blocks/grids/grid_item.php',
        'category'          => 'content',
        'icon'              => 'columns',
        'keywords'          => array( 'grid', 'wrapper' ),
        'parent'            => array( 'acf/grid-wrapper'),
    ));

    // Two Col Img Content Block
    acf_register_block_type(array(
        'name'              => 'two_col',
        'title'             => __('Two Column Image + Content'),
        'description'       => __('A two column block with an image and content section'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'anchor' => true,
            'jsx' => true 
         ),
        'render_template'   => 'blocks/grids/two_col.php',
        'enqueue_style'     => get_template_directory_uri() . '/blocks/styles/two_col.css',
        'category'          => 'content',
        'icon'              => 'align-pull-left',
        'keywords'          => array( 'image', 'content', 'two columns' ),
    ));

    // Padded Content Block
    acf_register_block_type(array(
        'name'              => 'padded_content',
        'title'             => __('One Column Padded Content'),
        'description'       => __('A section for padded/thinner content with settings for background color and pattern'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'anchor' => true,
            'jsx' => true 
         ),
        'render_template'   => 'blocks/grids/padded_content.php',
        'enqueue_style'     => get_template_directory_uri() . '/blocks/styles/padded_content.css',
        'category'          => 'content',
        'icon'              => 'align-center',
        'keywords'          => array( 'image', 'content', 'two columns' ),
    ));

    // Image Slider Block
    acf_register_block_type(array(
        'name'              => 'basic_slider',
        'title'             => __('Image Slider'),
        'description'       => __('image slider'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'anchor' => true,
            'jsx' => true 
         ),
        'render_template'   => 'blocks/sliders/basic_slider.php',
        'enqueue_script'     => get_template_directory_uri() . '/js/swiper.min.js',
        'category'          => 'sliders',
        'icon'              => 'images-alt2',
        'keywords'          => array( 'slider', 'images' ),
    ));
    acf_register_block_type(array(
        'name'              => 'slider_item',
        'title'             => __('Slider Slide'),
        'description'       => __('Slider Slide'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'anchor' => true,
            'inserter' => false,
            'jsx' => true 
         ),
        'render_template'   => 'blocks/sliders/basic_slider_item.php',
        'category'          => 'sliders',
        'icon'              => 'images-alt2',
        'keywords'          => array( 'slider', 'images' ),
    ));


    // Hero Blocks --------------------------------------------------------------------
    // Hero Block
    // acf_register_block_type(array(
    //     'name'              => 'hero',
    //     'title'             => __('Hero'),
    //     'description'       => __('Hero block'),
    //     'mode'              => 'preview',
    //     'supports'          => array(
    //         'align' => false,
    //         'mode' => false,
    //         'anchor' => true,
    //         'jsx' => true 
    //      ),
    //     'render_template'   => 'blocks/heroes/hero.php',
    //     'category'          => 'heroes',
    //     'icon'              => 'align-full-width',
    //     'keywords'          => array( 'hero', 'image', 'header' ),
    // ));


    // Accordion Blocks --------------------------------------------------------------------
    // Accordion Wrapper
    acf_register_block_type(array(
        'name'              => 'accordion_wrapper',
        'title'             => __('Accordion Wrapper'),
        'description'       => __('Custom accordion wrapper block with block-level settings. Accepts Accordion Item blocks.'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'anchor' => true,
            'jsx' => true 
         ),
        'render_template'   => 'blocks/accordions/accordion_wrapper.php',
        'enqueue_style'     => get_template_directory_uri() . '/blocks/styles/accordions.css',
        'category'          => 'content',
        'icon'              => 'list-view',
        'keywords'          => array( 'accordion', 'faq' ),
    ));
    // Accordion Item
    acf_register_block_type(array(
        'name'              => 'accordion_item',
        'title'             => __('Accordion Item'),
        'description'       => __('Accordion item to insert into accordion wrapper'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'anchor' => true,
            'jsx' => true 
         ),
        'render_template'   => 'blocks/accordions/accordion_item.php',
        'category'          => 'content',
        'icon'              => 'list-view',
        'keywords'          => array( 'accordion', 'faq' ),
        'parent'            => array( 'acf/accordion-wrapper' ),
    ));

    // Tab Blocks --------------------------------------------------------------------
    // Tab Wrapper
    acf_register_block_type(array(
        'name'              => 'tab_wrapper',
        'title'             => __('Tab Wrapper'),
        'description'       => __('Custom tab wrapper block with block-level settings. Accepts Tab Item blocks.'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'anchor' => true,
            'jsx' => true 
         ),
        'render_template'   => 'blocks/tabs/tab_wrapper.php',
        'enqueue_style'     => get_template_directory_uri() . '/blocks/styles/tabs.css',
        'enqueue_script'     => get_template_directory_uri() . '/blocks/tabs/bootstrap_tabs.js',
        'category'          => 'content',
        'icon'              => 'list-view',
        'keywords'          => array( 'tab', 'faq' ),
    ));
    // Tab Item
    acf_register_block_type(array(
        'name'              => 'tab_item',
        'title'             => __('Tab Item'),
        'description'       => __('Tab item to insert into tab wrapper'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'anchor' => true,
            'jsx' => true 
         ),
        'render_template'   => 'blocks/tabs/tab_item.php',
        'category'          => 'content',
        'icon'              => 'list-view',
        'keywords'          => array( 'tab', 'faq' ),
        'parent'            => array( 'acf/tab-wrapper' ),
    ));


    // Blog --------------------------------------------------------------------
    acf_register_block_type(array(
        'name'              => 'related_posts',
        'title'             => __('Blog Related Posts'),
        'description'       => __('Blog related posts block'),
        'mode'              => 'preview',
        'supports'          => array(
            'align' => false,
            'mode' => false,
            // 'inserter' => false,
            'anchor' => true,
            'jsx' => true 
         ),
        'render_template'   => 'blocks/blog/related_posts.php',
        'category'          => '',
        'icon'              => 'table-col-before',
        'keywords'          => array( 'blog' ),
    ));
}

// Block Patterns --------------------------------------------------------------------
// register_block_pattern(
//     'bigcity/heading-divider',
//     array(
//         'title'         => 'Heading + Divider',
//         'categories'    => array('text'),
//         'description'   => 'A large bold heading, followed by a divider line',
//         'content'       => '<!-- wp:heading {"textAlign":"center","className":"fs1"} --> <h2 class="has-text-align-center fs1">Large  Heading</h2> <!-- /wp:heading --> <!-- wp:separator --> <hr class="wp-block-separator"/> <!-- /wp:separator -->',
//     )
// );

/**
 * Creating new block categories.
 *
 * @param   array $categories     List of block categories.
 * @return  array
 */
function bigcity_new_block_category( $categories ) {

    $categories = array_merge(
        $categories,
        array(
            array(
                'title' => 'Sliders', 
                'slug'  => 'sliders', 
            ),
            array(
                'title' => 'Heroes',
                'slug'  => 'heroes',
            ),
            array(
                'title' => 'Content',
                'slug'  => 'content',
            ),
        )
    );

    return $categories;
}
add_filter( 'block_categories', 'bigcity_new_block_category' );