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
