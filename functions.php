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

/**
 * Add custom meta boxes for course details
 */
function bamboo_study_add_course_meta_boxes() {
    add_meta_box(
        'course_details',
        __('Course Details', 'bamboo-study'),
        'bamboo_study_course_details_callback',
        'page',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'bamboo_study_add_course_meta_boxes');

/**
 * Course details meta box callback
 */
function bamboo_study_course_details_callback($post) {
    wp_nonce_field('bamboo_study_course_details', 'bamboo_study_course_details_nonce');
    
    $course_instructor = get_post_meta($post->ID, 'course_instructor', true);
    $course_rating = get_post_meta($post->ID, 'course_rating', true);
    $course_categories = get_post_meta($post->ID, 'course_categories', true);
    $course_video_url = get_post_meta($post->ID, 'course_video_url', true);
    $course_features = get_post_meta($post->ID, 'course_features', true);
    $course_current_price = get_post_meta($post->ID, 'course_current_price', true);
    $course_original_price = get_post_meta($post->ID, 'course_original_price', true);
    $course_discount_percent = get_post_meta($post->ID, 'course_discount_percent', true);
    $course_discount_valid = get_post_meta($post->ID, 'course_discount_valid', true);
    $course_duration = get_post_meta($post->ID, 'course_duration', true);
    $course_video_count = get_post_meta($post->ID, 'course_video_count', true);
    $course_content_type = get_post_meta($post->ID, 'course_content_type', true);
    $course_purchase_button_text = get_post_meta($post->ID, 'course_purchase_button_text', true);
    $course_purchase_url = get_post_meta($post->ID, 'course_purchase_url', true);
    $course_notes = get_post_meta($post->ID, 'course_notes', true);
    $course_payment_instructions = get_post_meta($post->ID, 'course_payment_instructions', true);
    
    ?>
    <table class="form-table">
        <tr>
            <th scope="row"><label for="course_instructor"><?php _e('Instructor', 'bamboo-study'); ?></label></th>
            <td><input type="text" id="course_instructor" name="course_instructor" value="<?php echo esc_attr($course_instructor); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="course_rating"><?php _e('Rating', 'bamboo-study'); ?></label></th>
            <td><input type="number" id="course_rating" name="course_rating" value="<?php echo esc_attr($course_rating); ?>" min="1" max="5" step="1" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="course_categories"><?php _e('Categories', 'bamboo-study'); ?></label></th>
            <td><input type="text" id="course_categories" name="course_categories" value="<?php echo esc_attr($course_categories); ?>" class="regular-text" placeholder="<?php _e('All, Speaking, Writing, Reading, Listening', 'bamboo-study'); ?>" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="course_video_url"><?php _e('Video URL', 'bamboo-study'); ?></label></th>
            <td><input type="url" id="course_video_url" name="course_video_url" value="<?php echo esc_attr($course_video_url); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="course_features"><?php _e('Course Features', 'bamboo-study'); ?></label></th>
            <td><textarea id="course_features" name="course_features" rows="5" cols="50" class="large-text"><?php echo esc_textarea($course_features); ?></textarea></td>
        </tr>
        <tr>
            <th scope="row"><label for="course_current_price"><?php _e('Current Price', 'bamboo-study'); ?></label></th>
            <td><input type="text" id="course_current_price" name="course_current_price" value="<?php echo esc_attr($course_current_price); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="course_original_price"><?php _e('Original Price', 'bamboo-study'); ?></label></th>
            <td><input type="text" id="course_original_price" name="course_original_price" value="<?php echo esc_attr($course_original_price); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="course_discount_percent"><?php _e('Discount Percent', 'bamboo-study'); ?></label></th>
            <td><input type="number" id="course_discount_percent" name="course_discount_percent" value="<?php echo esc_attr($course_discount_percent); ?>" min="0" max="100" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="course_discount_valid"><?php _e('Discount Valid Until', 'bamboo-study'); ?></label></th>
            <td><input type="text" id="course_discount_valid" name="course_discount_valid" value="<?php echo esc_attr($course_discount_valid); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="course_duration"><?php _e('Duration', 'bamboo-study'); ?></label></th>
            <td><input type="text" id="course_duration" name="course_duration" value="<?php echo esc_attr($course_duration); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="course_video_count"><?php _e('Video Count', 'bamboo-study'); ?></label></th>
            <td><input type="text" id="course_video_count" name="course_video_count" value="<?php echo esc_attr($course_video_count); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="course_content_type"><?php _e('Content Type', 'bamboo-study'); ?></label></th>
            <td><input type="text" id="course_content_type" name="course_content_type" value="<?php echo esc_attr($course_content_type); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="course_purchase_button_text"><?php _e('Purchase Button Text', 'bamboo-study'); ?></label></th>
            <td><input type="text" id="course_purchase_button_text" name="course_purchase_button_text" value="<?php echo esc_attr($course_purchase_button_text); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="course_purchase_url"><?php _e('Purchase URL', 'bamboo-study'); ?></label></th>
            <td><input type="url" id="course_purchase_url" name="course_purchase_url" value="<?php echo esc_attr($course_purchase_url); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="course_notes"><?php _e('Course Notes', 'bamboo-study'); ?></label></th>
            <td><textarea id="course_notes" name="course_notes" rows="3" cols="50" class="large-text"><?php echo esc_textarea($course_notes); ?></textarea></td>
        </tr>
        <tr>
            <th scope="row"><label for="course_payment_instructions"><?php _e('Payment Instructions', 'bamboo-study'); ?></label></th>
            <td><textarea id="course_payment_instructions" name="course_payment_instructions" rows="5" cols="50" class="large-text"><?php echo esc_textarea($course_payment_instructions); ?></textarea></td>
        </tr>
    </table>
    <?php
}

/**
 * Save course meta data
 */
function bamboo_study_save_course_meta($post_id) {
    if (!isset($_POST['bamboo_study_course_details_nonce'])) {
        return;
    }
    
    if (!wp_verify_nonce($_POST['bamboo_study_course_details_nonce'], 'bamboo_study_course_details')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    $fields = [
        'course_instructor',
        'course_rating',
        'course_categories',
        'course_video_url',
        'course_features',
        'course_current_price',
        'course_original_price',
        'course_discount_percent',
        'course_discount_valid',
        'course_duration',
        'course_video_count',
        'course_content_type',
        'course_purchase_button_text',
        'course_purchase_url',
        'course_notes',
        'course_payment_instructions'
    ];
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'bamboo_study_save_course_meta');