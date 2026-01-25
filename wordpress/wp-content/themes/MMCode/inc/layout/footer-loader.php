<?php
/**
 * Footer loader
 * Laadt de footer op basis van theme settings
 */

function mm_load_footer() {

    $footer = mm_get_option('site_footer', 'default');

    $allowed = ['default', 'minimal', 'dark'];

    if (!in_array($footer, $allowed, true)) {
        $footer = 'default';
    }

    $path = get_template_directory() . '/inc/footers/footer-' . $footer . '.php';

    if (file_exists($path)) {
        require $path;
    } else {
        require get_template_directory() . '/inc/footers/footer-default.php';
    }
}
