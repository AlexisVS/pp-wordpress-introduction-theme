<?php

/**
 * WP Theme Intro's functions and definitions
 *
 * @package WP Theme Intro
 * @since WP Theme Intro 1.0
 */

function wpthemeintro_enqueue_scripts()
{
  /**
   * Add CSS files
   */
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_style('app', get_template_directory_uri(). '/assets/css/app.css');
  wp_enqueue_script('anime.min', get_template_directory_uri() . '/node_modules/animejs/lib/anime.min.js', [], null, true);
  wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', ['anime.min'], null, true);
}
add_action("wp_enqueue_scripts", "wpthemeintro_enqueue_scripts");

if (!function_exists('wpthemeintro_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which runs
   * before the init hook. The init hook is too late for some features, such as indicating
   * support post thumbnails.
   */
  function wpthemeintro_setup()
  {


    /**
     * Make theme available for translation.
     * Translations can be placed in the /languages/ directory.
     */
    load_theme_textdomain('wpthemeintro', get_template_directory() . '/languages');

    /**
     * Add default posts and comments RSS feed links to <head>.
     */
    add_theme_support('automatic-feed-links');

    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support('post-thumbnails');

    /**
     * Add support for two custom navigation menus.
     */
    register_nav_menus(
      [
        'primary'   => __('Primary Menu', 'wpthemeintro'),
        'secondary' => __('Secondary Menu', 'wpthemeintro')
      ]
    );


    /**
     * Enable support for the following post formats:
     * aside, gallery, quote, image, and video
     */
    add_theme_support('post-formats', ['aside', 'gallery', 'quote', 'image', 'video']);
  }
endif; // wpthemeintro_setup
add_action('after_setup_theme', 'wpthemeintro_setup');

/**
 * Add support for meun class
 */

function wpthemeintro_menu_css_class($class)
{
  $class = ['h-full', 'py-4', 'px-2', 'hover:bg-teal-700'];
  return $class;
}
add_filter('nav_menu_css_class', 'wpthemeintro_menu_css_class');
