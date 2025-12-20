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

