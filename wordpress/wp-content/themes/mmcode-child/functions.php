<?php
// 1️⃣ Pattern categories
function mm_register_pattern_categories() {
    $categories = [
        'mm-patterns' => __('MM Patterns', 'mmcode-child'),
        'mm-headers'  => __('MM Headers', 'mmcode-child'),
        'mm-footers'  => __('MM Footers', 'mmcode-child'),
        'mm-pages'    => __('MM Pages', 'mmcode-child'), // ✅ nieuwe categorie
        'mm-heroes'   => __('MM Heroes', 'mmcode-child'),
        'mm-cta'      => __('MM Call To Action', 'mmcode-child'),
    ];

    function mm_enqueue_fontawesome() {
        wp_enqueue_style(
            'fontawesome',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
            array(),
            '6.5.0'
        );
    }
    add_action('wp_enqueue_scripts', 'mm_enqueue_fontawesome');


    foreach ($categories as $slug => $label) {
        register_block_pattern_category(
            $slug,
            array('label' => $label)
        );
    }
}
add_action('init', 'mm_register_pattern_categories');

// 2️⃣ Include patterns (footers, headers, etc.)
require get_stylesheet_directory() . '/inc/patterns.php';

// 3️⃣ Enqueue Tailwind + child theme CSS
function mm_enqueue_styles() {
    wp_enqueue_style(
        'mm-tailwind',
        get_stylesheet_directory_uri() . '/src/output.css',
        array(),
        filemtime(get_stylesheet_directory() . '/src/output.css')
    );

    wp_enqueue_style(
        'mm-style',
        get_stylesheet_uri(),
        array('mm-tailwind'),
        filemtime(get_stylesheet_directory() . '/style.css')
    );
}
add_action('wp_enqueue_scripts', 'mm_enqueue_styles');
