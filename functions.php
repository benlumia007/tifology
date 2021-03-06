<?php
/*
================================================================================================
Tifology - functions.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other being template-tags.php). This file is used to maintain the main 
functionality and features for this theme. The second file is the template-tags.php that contains 
the extra functions and features.

@package        Tifology WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com/)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Content Width
 2.0 - Enqueue Styles and Scripts
 3.0 - Theme Setup
 4.0 - Register Sidebars
 5.0 - Required Files
================================================================================================
*/

/*
================================================================================================
 1.0 - Content Width
================================================================================================
*/
function tifology_content_width() {
    $GLOBALS['content_width'] = apply_filters('tifology_content_width', 780);
}
add_action('after_setup_theme', 'tifology_content_width', 0);

/*
================================================================================================
 2.0 - Enqueue Styles and Scripts
================================================================================================
*/
function tifology_enqueue_script_setup() {
    // Enable and activate the main stylesheet for Tifology.
    wp_enqueue_style('tifology-style', get_stylesheet_uri());
    
    // Enable and active Google Fonts (Sanchez and Merriweather Sans) Locally for Tifology.
    wp_enqueue_style('tifology-local-fonts', get_template_directory_uri() . '/extras/fonts/custom-fonts.css', '11012016', true);
    
    // Enable and activate Font Awesome for Tifology.
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/extras/font-awesome/css/font-awesome.css', '20160601', true);
    
    // Enable and Activate Navigation JavaScript for Tifology.
    wp_enqueue_script('tifology-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20160601', true);
	wp_localize_script('tifology-navigation', 'tifologyscreenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __('expand child menu', 'tifology') . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __('collapse child menu', 'tifology') . '</span>',
	));
    
    // Enable and activate Threaded Comments for Tifology.
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'tifology_enqueue_script_setup');

/*
================================================================================================
 3.0 - Theme Setup
================================================================================================
*/
function tifology_theme_setup() {
    // Enable and Activate Add Theme Support (Title Tag) for Tifology.
    add_theme_support('title-tag');
    
    // Enable and Activate Add Theme Support (Automatic Feed Links) for Tifology.
    add_theme_support('automatic-feed-links');
    
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form', 
        'gallery', 
        'caption'
    ));
    
    // Enable and Activate Navigation Menus for Tifology.
    register_nav_menus(array(
        'primary-navigation'    => esc_html__('Primary Navigation', 'tifology'),
        'social-navigation'     => esc_html__('Social Navigation', 'tifology'),
    ));
    
    // Enable and Activate Featured Image for Tifology.
    add_theme_support('post-thumbnails');
    add_image_size('tifology-featured-banner', 1024, 300, true);
    
    add_editor_style('css/editor-styles.css');
}
add_action('after_setup_theme', 'tifology_theme_setup');

/*
================================================================================================
 4.0 - Register Sidebars
================================================================================================
*/
function tifology_register_sidebars_setup() {
    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'tifology'),
        'description'   => __('When using the Primary Sidebar, widgets will display in the Posts section.', 'tifology'),
        'id'            => 'primary-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Secondary Sidebar', 'tifology'),
        'description'   => __('When using the Secondary Sidebar, widgets will display in the Pages section.', 'tifology'),
        'id'            => 'secondary-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Custom Sidebar', 'tifology'),
        'id'            => 'custom-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'tifology_register_sidebars_setup');

/*
================================================================================================
 5.0 - Required Files
================================================================================================
*/
require_once(get_template_directory() . '/includes/custom-header.php');
require_once(get_template_directory() . '/includes/customizer.php');
require_once(get_template_directory() . '/includes/template-tags.php');
