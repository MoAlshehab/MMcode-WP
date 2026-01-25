<?php
/**
 * Enqueue theme assets
 */

function mmcode_enqueue_assets() {

  // CSS
  $css_path = get_template_directory() . '/assets/css/app.css';

  wp_enqueue_style(
    'mmcode-style',
    get_template_directory_uri() . '/assets/css/app.css',
    [],
    file_exists($css_path) ? filemtime($css_path) : wp_get_theme()->get('Version')
  );

  // Theme JS
  wp_enqueue_script(
    'mmcode-theme',
    get_template_directory_uri() . '/assets/js/theme-toggle.js',
    [],
    wp_get_theme()->get('Version'),
    true
  );

  // Mobile menu
  wp_enqueue_script(
    'mmcode-mobile-menu',
    get_template_directory_uri() . '/assets/js/mobile-menu.js',
    [],
    wp_get_theme()->get('Version'),
    true
  );

  // Threaded comments
  if ( is_singular() && comments_open() && get_option('thread_comments') ) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'mmcode_enqueue_assets');


// Back to top Button
wp_enqueue_script(
  'mmcode-back-to-top',
  get_template_directory_uri() . '/assets/js/back-to-top.js',
  [],
  wp_get_theme()->get('Version'),
  true
);


/**
 * Google Fonts laden op basis van theme settings
 */
add_action('wp_enqueue_scripts', function () {

    $fonts = [
        'inter'      => 'Inter:wght@400;500;600;700',
        'poppins'    => 'Poppins:wght@400;500;600;700',
        'roboto'     => 'Roboto:wght@400;500;700',
        'montserrat' => 'Montserrat:wght@400;600;700',
        'bebas'      => 'Bebas+Neue',
        'ibm'        => 'IBM+Plex+Sans:wght@300;400;500;600;700',
    ];

    $menu_font = mm_get_option('header_menu_font', 'inter');

    if (isset($fonts[$menu_font])) {
        wp_enqueue_style(
            'mm-header-menu-font',
            'https://fonts.googleapis.com/css2?family=' . $fonts[$menu_font] . '&display=swap',
            [],
            null
        );
    }
});
