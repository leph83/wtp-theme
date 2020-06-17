<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * SETUP
 */
add_action('after_setup_theme', 'wtp_setup');
function wtp_setup()
{
    load_theme_textdomain('wtp', get_template_directory() . '/languages');

    // Add theme support for various features.
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    // CUSTOM LOGO
    add_theme_support('custom-logo', array(
        'height' => 70,
        'width' => 150,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ));

    // NAVIGATION
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'wtp' ),
        'footer' => __( 'Footer Menu', 'wtp' ),
    ) );

    /**
     * Set the content width to something large
     * We set a more accurate width in generate_smart_content_width()
     */
    // global $content_width;
    // if (!isset($content_width)) {
    //     $content_width = 1920;
    // }


    // add_theme_support('customize-selective-refresh-widgets');

    // add_theme_support('automatic-feed-links');
    // add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link', 'status'));
    // add_theme_support('woocommerce');
    // add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    // add_theme_support('align-wide');
    // add_theme_support('responsive-embeds');
}

/**
 * LOAD CSS
 */
if ( !function_exists('wtp_load_styles') ) {
    function wtp_load_styles() {
        // Version dependend on change date of file
        $file_name = 'style.min.css';
        $css_version = filemtime( get_stylesheet_directory() . '/' . $file_name );

        // STYLE
        wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/' . $file_name, array(), $css_version );
    }
    add_action('wp_enqueue_scripts', 'wtp_load_styles');
}


/**
 * LOAD JavaScript
 */
if ( !function_exists('wtp_load_scripts') ) {
    function wtp_load_scripts()
    {
    
    }
    add_action('wp_enqueue_scripts', 'wtp_load_scripts');
}

/**
 * Blog Info
 */
if ( !function_exists('wtp_blog_info') ) {
    function wtp_blog_info() {
        $brand = '
            <a href="'. esc_url(home_url('/')) .'" title="'. esc_html(get_bloginfo('name')) .'" rel="home">
                '. esc_html(get_bloginfo('name')) .'
            </a>
            <span id="site-description">'. get_bloginfo('description').'</span>
        ';

        if ( has_custom_logo() ) {
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $custom_logo_id , 'medium' );

            $brand = '<img src="' . $image[0] . '" alt="'.esc_html(get_bloginfo('name')).'" width="'.$image[1].'" height="'.$image[2].'">';
        }

        return $brand;
    }
}


/**
 * Widgets
 */
if ( !function_exists('wtp_widgets_init') ) {
    function wtp_widgets_init() {
        register_sidebar(array(
            'name'          => 'Sidebar',
            'id'            => 'primary-widget-area',
            'description'   => 'Sidebar Widgets',
        ) );

        register_sidebar(array(
            'name'          => 'Footer 1',
            'id'            => 'footer-1-widget-area',
            'description'   => 'Footer 1 Widgets',
        ) );

        register_sidebar(array(
            'name'          => 'Footer 2',
            'id'            => 'footer-2-widget-area',
            'description'   => 'Footer 2 Widgets',
        ) );

        register_sidebar(array(
            'name'          => 'Footer 3',
            'id'            => 'footer-3-widget-area',
            'description'   => 'Footer 3 Widgets',
        ) );

        register_sidebar(array(
            'name'          => 'Footer 4',
            'id'            => 'footer-4-widget-area',
            'description'   => 'Footer 4 Widgets',
        ) );
    }
    add_action( 'widgets_init', 'wtp_widgets_init' );
}

require_once('inc/remove_gutenberg.php');
require_once('inc/disable_emoji.php');
require_once('inc/empty_p.php');
require_once('inc/security.php');
require_once('inc/disable_embed.php');
require_once('inc/disable_rest_api.php');
require_once('inc/add_nav_classes.php');
require_once('inc/pagination_markup.php');

/**
 * TODO
 * add Logo Size Width Slider
 * Checkbox to show title, description and logo
 * add Sidebar Setting (left, right)
 */

