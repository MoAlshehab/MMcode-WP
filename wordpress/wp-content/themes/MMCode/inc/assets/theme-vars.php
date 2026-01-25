<?php
/**
 * Theme CSS variables
 * - Menu hover kleur
 * - Andere globale CSS vars
 */

/**
 * Inject CSS variables in <head>
 */
add_action('wp_head', function () {

    // Ophalen uit Theme Settings
    $hover = function_exists('mm_get_option')
        ? mm_get_option('menu_hover_color', '#2563eb')
        : '#2563eb';

    echo '<style>
        :root {
            --mm-menu-hover-color: ' . esc_attr($hover) . ';
        }
    </style>';
});
