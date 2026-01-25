<?php
/**
 * Header loader
 * Laadt de juiste header op basis van theme settings
 */

function mm_load_header() {

    // Gekozen header uit theme settings
    $header = mm_get_option('site_header', 'default');

    // Whitelist (veilig!)
    $allowed = [
        'default',
        'centered',
        'minimal',
    ];

    if (!in_array($header, $allowed, true)) {
        $header = 'default';
    }

    $path = get_template_directory() . '/inc/headers/header-' . $header . '.php';

    if (file_exists($path)) {
        require $path;
    } else {
        require get_template_directory() . '/inc/headers/header-default.php';
    }
}
