<?php
/**
 * Sidebars
 */

function mmcode_register_sidebars() {

  $sidebars = [
    'main-sidebar' => __('Main Sidebar', 'mmcode'),
    'services-sidebar' => __('Services Sidebar', 'mmcode'),
    'single-post-sidebar' => __('Single Post Sidebar', 'mmcode'),
  ];

  foreach ( $sidebars as $id => $name ) {
    register_sidebar([
      'name'          => $name,
      'id'            => $id,
      'before_widget' => '<section id="%1$s" class="sidebar-widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h3 class="sidebar-title">',
      'after_title'   => '</h3>',
    ]);
  }
}
add_action('widgets_init', 'mmcode_register_sidebars');
