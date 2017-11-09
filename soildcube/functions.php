<?php
/**
 * soildcube functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package soildcube
 */

if (!function_exists('soildcube_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function soildcube_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on soildcube, use a find and replace
         * to change 'soildcube' to the name of your theme in all the template files.
         */
        load_theme_textdomain('soildcube', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        add_image_size('post-thumbnail size', 600, 240);
        add_image_size('homepage-thumb size', 220, 180);
        add_image_size('fullpage-thumb size', 400, 300);
        add_image_size('team-thumb size', 600, 600); //team size
        add_image_size('slider-post-thumbnail', 1000, 407, true); // Slider Thumbnail

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'soildcube'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('soildcube_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'soildcube_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function soildcube_content_width()
{
    $GLOBALS['content_width'] = apply_filters('soildcube_content_width', 640);
}

add_action('after_setup_theme', 'soildcube_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function soildcube_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'soildcube'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'soildcube'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'soildcube_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function soildcube_scripts()
{
    wp_enqueue_style('soildcube-style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0');

    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '3.2.1', true);
    wp_enqueue_script('bootstrap-min-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.7', true);
    wp_enqueue_script('soildcube-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20171101', true);
    wp_enqueue_script('soildcube-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20171101', true);
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array(), '20171104', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'soildcube_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * navigation bootstrap
 */
require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';

/**
 * Slider
 * slider.php - creates the slider's template & loads the slider's files
 * slider_post_type.php - creates the slider post type
 */
require(get_template_directory() . '/inc/slider/slider_post_type.php');
require(get_template_directory() . '/inc/slider/slider.php');

/* Add shortcodes in  Excerpts */
add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode');

/* Add shortcodes in Category, Tag, and Taxonomy Descriptions */
add_filter( 'term_description', 'shortcode_unautop');
add_filter( 'term_description', 'do_shortcode' );

/* Add shortcodes in Text Widgets */
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');