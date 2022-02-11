<?php

// add css and scripts
function bigcity_add_css_scripts() {
    // add define( 'SCRIPT_DEBUG', true ); to wp-config.php for dev
    $suffix_min = ( defined( 'SCRIPT_DEBUG') && SCRIPT_DEBUG ) ? '' : '.min'; // Don't use minified files if SCRIPT_DEBUG is set
    $version = (wp_get_theme())->Version; // Updating the theme version in style.css will automatically cache-bust

    // css
    wp_enqueue_style( 'main', get_template_directory_uri()."/css/main{$suffix_min}.css", [], $version );

    // scripts
    wp_enqueue_script( 'main', get_template_directory_uri().'/js/main.js', [], $version, true );
}
add_action( 'wp_enqueue_scripts', 'bigcity_add_css_scripts' );

// autoflush rewrite rules after switching themes
add_action( 'after_switch_theme', 'custom_flush_rewrite_rules' );    
function custom_flush_rewrite_rules() {
    flush_rewrite_rules();
}


/* woocommerce
-------------------------------------------------------------------*/
include('includes/func_woocommerce.php');

/* stuff for the client and defaults for wordpress
-------------------------------------------------------------------*/
include('includes/func_defaults.php');

/* custom post types, custom gutenberg and blocks
-------------------------------------------------------------------*/
include('includes/func_post_types.php');
include('includes/func_blocks.php');
include('includes/func_gutenberg.php');