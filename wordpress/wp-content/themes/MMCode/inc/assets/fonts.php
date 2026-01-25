<?php
/**
 * Google Fonts loader
 * - Frontend
 * - Gutenberg editor
 */

function mmcode_load_fonts() {

    wp_enqueue_style(
        'mmcode-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Poppins:wght@300;400;600;700&family=Roboto:wght@300;400;700&family=Montserrat:wght@300;400;600;700&family=Bebas+Neue&family=IBM+Plex+Sans:wght@300;400;600;700&display=swap',
        [],
        null
    );
}

// Frontend
add_action('wp_enqueue_scripts', 'mmcode_load_fonts');

// Gutenberg editor
add_action('enqueue_block_editor_assets', 'mmcode_load_fonts');
