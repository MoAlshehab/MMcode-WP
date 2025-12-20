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
 * Add Customt Menu Support
 * Added by Mo
 */

function mmcode_nav_menu(){

    register_nav_menu('tailwind-menu',__('Navigation Bar'));
}
add_action('init','mmcode_nav_menu');

function mmcode_tailwind_menu(){
    wp_nav_menu( );
}