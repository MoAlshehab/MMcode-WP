<?php
/**
 * Theme setup
 */

function mmcode_theme_setup() {

  // Titel in <head>
  add_theme_support('title-tag');

  // ✅ HERO / Featured Image
  add_theme_support('post-thumbnails');

  // Custom logo
  add_theme_support('custom-logo', [
    'height'      => 80,
    'width'       => 240,
    'flex-height' => true,
    'flex-width'  => true,
  ]);

  // Translations
  load_theme_textdomain(
    'mmcode',
    get_template_directory() . '/languages'
  );
}

add_action('after_setup_theme', 'mmcode_theme_setup');


/**
 * Maak standaard pagina’s aan bij theme activatie
 */
add_action('after_switch_theme', function () {

    $pages = [
        'over-ons' => [
            'title'   => 'Over ons',
            'content' => '<!-- wp:pattern {"slug":"mmcode/over-ons"} /-->',
        ],
        'diensten' => [
            'title'   => 'Diensten',
            'content' => '<!-- wp:pattern {"slug":"mmcode/diensten"} /-->',
        ],
        'contact' => [
            'title'   => 'Contact',
            'content' => '<!-- wp:pattern {"slug":"mmcode/contact"} /-->',
        ],
    ];

    foreach ($pages as $slug => $page) {

        // Bestaat de pagina al?
        if (get_page_by_path($slug)) {
            continue;
        }

        wp_insert_post([
            'post_title'   => $page['title'],
            'post_name'    => $slug,
            'post_content' => $page['content'],
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ]);
    }
});

