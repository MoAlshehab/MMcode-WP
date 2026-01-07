<?php

add_action('wp_enqueue_scripts', function () {
    $css_path = get_template_directory() . '/assets/css/app.css';

    wp_enqueue_style(
        'mmcode-style',
        get_template_directory_uri() . '/assets/css/app.css',
        [],
        file_exists($css_path) ? filemtime($css_path) : null
    );
});

/**
 * Add Featured Image Support
 * Added by Mo
 */

add_theme_support('post-thumbnails');

/**
 * Add Customt Menu Support
 * Added by Mo
 */

function mmcode_nav_menus(){

    register_nav_menus(array(
        'tailwind-menu'=>'Navigation Bar',
        'footer-menu' => 'Footer Menu'

));
}
add_action('init','mmcode_nav_menus');


function mmcode_tailwind_menu() {
    wp_nav_menu([
        'theme_location' => 'tailwind-menu',
        'container'      => false,
        'menu_class'     => 'nav-main',
        'fallback_cb'    => false,
        'depth'          => 2, // 👈 BELANGRIJK
    ]);
}


function mmcode_tailwind_footer_menu() {
    wp_nav_menu([
        'theme_location' => 'footer-menu',
        'container'      => false,
        'menu_class'     => 'footer-nav',
        'fallback_cb'    => false,
    ]);
}

add_filter('nav_menu_link_attributes', function ($atts, $item, $args) {

    if ($args->theme_location === 'tailwind-menu') {
        $atts['class'] = 'font-medium text-textBase hover:text-primary transition';
    }

    if ($args->theme_location === 'footer-menu') {
        $atts['class'] = 'text-sm text-textMuted hover:text-primary transition';
    }

    return $atts;
}, 10, 3);

/**
 * Customize The Excerpt Words length & Read More Dots 
 * Added By @Mo
 */

function mmcode_extend_excerpt_length($length){
    return 20;
}
add_filter('excerpt_length', 'mmcode_extend_excerpt_length', 999);


function mmcode_excerpt_change_dots($more){
    return ' ...';
}
add_filter('excerpt_more', 'mmcode_excerpt_change_dots');

/**
 * Dark mode script
 * Added by @Mo
 */
add_action('wp_enqueue_scripts', function () {
  wp_enqueue_script(
    'mmcode-theme-toggle',
    get_template_directory_uri() . '/assets/js/theme-toggle.js',
    [],
    null,
    true
  );
});

/**
 * Custom logo support
 */
add_action('after_setup_theme', function () {
  add_theme_support('custom-logo', [
    'height'      => 80,
    'width'       => 240,
    'flex-height' => true,
    'flex-width'  => true,
  ]);
});

/**
 * Enable threaded comments
 */
add_action('wp_enqueue_scripts', function () {
  if ( is_singular() && comments_open() && get_option('thread_comments') ) {
    wp_enqueue_script('comment-reply');
  }
});

