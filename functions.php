<?php
/**
 * BambooStudy Theme Functions
 *
 * @package BambooStudy
 * @version 1.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
function bamboo_study_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'bamboo-study'),
        'footer' => __('Footer Menu', 'bamboo-study'),
    ));
}
add_action('after_setup_theme', 'bamboo_study_setup');

/**
 * Enqueue scripts and styles
 */
function bamboo_study_scripts() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3');
    
    // Enqueue theme stylesheet
    wp_enqueue_style('bamboo-study-style', get_stylesheet_uri(), array('bootstrap-css'), '1.0');
    
    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), '5.3.3', true);
    
    // Enqueue custom JS
    wp_enqueue_script('bamboo-study-script', get_template_directory_uri() . '/assets/js/script.js', array('bootstrap-js'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'bamboo_study_scripts');

/**
 * Register widget areas
 */
function bamboo_study_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'bamboo-study'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'bamboo-study'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'bamboo-study'),
        'id'            => 'footer-1',
        'description'   => __('Add footer widgets here.', 'bamboo-study'),
        'before_widget' => '<div id="%1$s" class="widget %2$s col-md-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'bamboo_study_widgets_init');

/**
 * Custom excerpt length
 */
function bamboo_study_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'bamboo_study_excerpt_length');

/**
 * Custom excerpt more
 */
function bamboo_study_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'bamboo_study_excerpt_more');

/**
 * Add custom body classes
 */
function bamboo_study_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'home-page';
    }
    return $classes;
}
add_filter('body_class', 'bamboo_study_body_classes');

/**
 * Customizer additions
 */
function bamboo_study_customize_register($wp_customize) {
    // Add section for theme options
    $wp_customize->add_section('bamboo_study_options', array(
        'title'    => __('Theme Options', 'bamboo-study'),
        'priority' => 30,
    ));
    
    // Add setting for hero title
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'Let The Panda Do The Prep',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label'   => __('Hero Title', 'bamboo-study'),
        'section' => 'bamboo_study_options',
        'type'    => 'text',
    ));
    
    // Add setting for hero subtitle
    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => 'You Just Show Up!',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label'   => __('Hero Subtitle', 'bamboo-study'),
        'section' => 'bamboo_study_options',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'bamboo_study_customize_register');

/**
 * Get theme option with fallback
 */
function bamboo_study_get_option($option_name, $default = '') {
    return get_theme_mod($option_name, $default);
}

/**
 * Fallback menu for primary navigation
 */
function bamboo_study_fallback_menu() {
    echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0">';
    echo '<li class="nav-item"><a class="nav-link fw-semibold" href="' . esc_url(home_url('/')) . '">' . __('Home', 'bamboo-study') . '</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="#ielts">' . __('IELTS', 'bamboo-study') . '</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="#business">' . __('Business English', 'bamboo-study') . '</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="#jlpt">' . __('JLPT', 'bamboo-study') . '</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="#hsk">' . __('HSK', 'bamboo-study') . '</a></li>';
    echo '</ul>';
}
