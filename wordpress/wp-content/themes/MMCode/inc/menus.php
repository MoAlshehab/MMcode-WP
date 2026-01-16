<?php
/**
 * Menus
 */

function mmcode_register_menus() {

  register_nav_menus([
    'tailwind-menu' => __('Navigation Bar', 'mmcode'),
    'footer-menu'   => __('Footer Menu', 'mmcode'),
  ]);
}
add_action('init', 'mmcode_register_menus');


function mmcode_tailwind_menu() {
  wp_nav_menu([
    'theme_location' => 'tailwind-menu',
    'container'      => false,
    'menu_class'     => 'nav-main',
    'fallback_cb'    => false,
    'depth'          => 2,
  ]);
}

function mmcode_tailwind_footer_menu() {
  wp_nav_menu([
    'theme_location' => 'footer-menu',
    'container'      => false,
    'menu_class'     => 'footer-nav',
    'fallback_cb'    => false,
  ]);
}

add_filter('nav_menu_link_attributes', function ($atts, $item, $args) {

  if ($args->theme_location === 'tailwind-menu') {
    $atts['class'] = 'font-medium text-textBase hover:text-primary transition';
  }

  if ($args->theme_location === 'footer-menu') {
    $atts['class'] = 'text-sm text-textMuted hover:text-primary transition';
  }

  return $atts;
}, 10, 3);
