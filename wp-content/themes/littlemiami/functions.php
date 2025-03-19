<?php
/**
 * Theme Name: Little Miami
 * Theme URI: https://example.com/little-miami
 * Author: Your Name
 * Description: A custom WordPress theme with a video hero section, content blocks, and Google reviews.
 * Version: 1.0
 * License: GNU General Public License v2 or later
 */

// Enqueue Styles and Scripts
function little_miami_enqueue_scripts() {
    wp_enqueue_style('little-miami-style', get_stylesheet_uri());
    //wp_enqueue_script('jquery');
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    wp_enqueue_script('little-miami-main', get_template_directory_uri() . '/js/main.js', array('jquery'), false, true);
}
add_action('wp_enqueue_scripts', 'little_miami_enqueue_scripts');

// Theme Setup
function little_miami_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('menus');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'little-miami')
    ));

    // Register Sidebar Widgets
    register_sidebar(array(
        'name'          => __('Top Bar', 'little-miami'),
        'id'            => 'top-bar',
        'before_widget' => '<div class="top-bar-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="screen-reader-text">',
        'after_title'   => '</h4>'
    ));
    register_sidebar(array(
        'name'          => __('Bottom Bar', 'little-miami'),
        'id'            => 'bottom-bar',
        'before_widget' => '<div class="bottom-bar-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="screen-reader-text">',
        'after_title'   => '</h4>'
    ));
    register_sidebar(array(
        'name' => __('Footer Column 1', 'little-miami'),
        'id' => 'footer-col-1',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
    register_sidebar(array(
        'name' => __('Footer Column 2', 'little-miami'),
        'id' => 'footer-col-2',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
    register_sidebar(array(
        'name' => __('Footer Column 3', 'little-miami'),
        'id' => 'footer-col-3',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}
add_action('after_setup_theme', 'little_miami_theme_setup');

// Include nav Parts
require_once get_template_directory() . '/inc/wp-bootstrap-navwalker.php';

add_action('acf/init', 'register_custom_acf_blocks');
function register_custom_acf_blocks() {
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type([
            'name'              => 'custom-section',
            'title'             => __('Custom Section'),
            'description'       => __('A custom section block with image/video and overlay text'),
            'render_template'   => 'template-parts/blocks/custom-section.php',
            'category'          => 'layout',
            'icon'              => 'layout',
            'keywords'          => ['custom', 'section', 'acf'],
            'mode'              => 'edit',
            'supports'          => ['align' => false],
        ]);
        acf_register_block_type([
            'name'              => 'hero-carousel',
            'title'             => __('Hero Carousel'),
            'description'       => __('A Hero Carousel block with image/video and overlay text'),
            'render_template'   => 'template-parts/blocks/hero-carousel.php',
            'category'          => 'layout',
            'icon'              => 'layout',
            'keywords'          => ['custom', 'section', 'acf'],
            'mode'              => 'edit',
            'supports'          => ['align' => false],
        ]);
    }
}
