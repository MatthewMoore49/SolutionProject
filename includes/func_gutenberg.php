<?php
add_theme_support( 'post-thumbnails' );
add_theme_support( 'align-wide' );
add_theme_support( 'disable-custom-colors' );
add_theme_support( 'editor-gradient-presets', array() );
add_theme_support( 'disable-custom-gradients' );
add_theme_support( 'disable-custom-font-sizes' );
add_theme_support( 'editor-font-sizes', array() );
remove_theme_support('core-block-patterns');

// Gutenberg scripts -------------------------------------------------------------------
function be_gutenberg_scripts() {
    wp_enqueue_script( 'theme-editor', get_template_directory_uri() . '/editor.js', array( 'wp-blocks', 'wp-dom' ), filemtime( get_template_directory() . '/editor.js' ), true );
}
add_action( 'enqueue_block_editor_assets', 'be_gutenberg_scripts' );

// Put your theme colors here -------------------------------------------------------------------
// match the slugs and hex values in your scss variables file
add_theme_support( 'editor-color-palette', array(
    array(
        'name'  => __( 'Black', 'big_city' ),
        'slug'  => 'black',
        'color' => '#000',
    ),
    array(
        'name'  => __( 'White', 'big_city' ),
        'slug'  => 'white',
        'color' => '#fff',
    ),
    array(
        'name'  => __( 'Light Grey', 'big_city' ),
        'slug'  => 'grey-light',
        'color' => '#f8f8f8',
    ),
) );

// block editor styles -------------------------------------------------------------------
function bigcity_enqueue_gutenberg() {
    wp_register_style( 'bigcity_gutenberg', get_template_directory_uri() . '/css/admin.css' );
    wp_enqueue_style( 'bigcity_gutenberg' );
}
add_action( 'enqueue_block_editor_assets', 'bigcity_enqueue_gutenberg' );

// Register widgets -------------------------------------------------------------------
register_sidebar( array(
    'name' => 'Footer Left',
    'id' => 'footer-left',
    'before_widget' => '',
    'after_widget' => '',
) );
register_sidebar( array(
    'name' => 'Footer Center',
    'id' => 'footer-center',
    'before_widget' => '',
    'after_widget' => '',
) );
register_sidebar( array(
    'name' => 'Footer Right',
    'id' => 'footer-right',
    'before_widget' => '',
    'after_widget' => '',
) );