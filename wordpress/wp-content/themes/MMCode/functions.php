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

/**
 * Add Featured Image Support
 * Added by Mo
 */

add_theme_support('post-thumbnails');

/**
 * Add Customt Menu Support
 * Added by Mo
 */

function mmcode_nav_menus(){

    register_nav_menus(array(
        'tailwind-menu'=>'Navigation Bar',
        'footer-menu' => 'Footer Menu'

));
}
add_action('init','mmcode_nav_menus');


function mmcode_tailwind_menu() {
    wp_nav_menu([
        'theme_location' => 'tailwind-menu',
        'container'      => false,
        'menu_class'     => 'nav-main',
        'fallback_cb'    => false,
        'depth'          => 2, // 👈 BELANGRIJK
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

/**
 * Custom excerpt length per page type
 * MMCODE WP
 */

function mmcode_custom_excerpt_length( $length ) {

  if ( is_admin() ) {
    return $length;
  }

  // Homepage / blog index
  if ( is_home() ) {
    return 30;
  }

  // Author page
  if ( is_author() ) {
    return 20;
  }

  // Category archive
  if ( is_category() ) {
    return 5;
  }

  // Search results
  if ( is_search() ) {
    return 25;
  }

  // Other archives
  if ( is_archive() ) {
    return 22;
  }

  // Fallback
  return 20;
}
add_filter( 'excerpt_length', 'mmcode_custom_excerpt_length', 999 );


/**
 * Custom excerpt more string
 */
function mmcode_custom_excerpt_more( $more ) {
  return '…';
}
add_filter( 'excerpt_more', 'mmcode_custom_excerpt_more' );


/**
 * Enqueue theme scripts
 * MMCODE WP
 */
function mmcode_enqueue_theme_scripts() {

  wp_enqueue_script(
    'mmcode-theme',
    get_template_directory_uri() . '/assets/js/theme-toggle.js',
    [],
    wp_get_theme()->get('Version'),
    true
  );

}
add_action('wp_enqueue_scripts', 'mmcode_enqueue_theme_scripts');


/**
 * Custom logo support
 */
add_action('after_setup_theme', function () {
  add_theme_support('custom-logo', [
    'height'      => 80,
    'width'       => 240,
    'flex-height' => true,
    'flex-width'  => true,
  ]);
});

/**
 * Enable threaded comments
 */
add_action('wp_enqueue_scripts', function () {
  if ( is_singular() && comments_open() && get_option('thread_comments') ) {
    wp_enqueue_script('comment-reply');
  }
});


/**
 * Numbering Pagination 
 * Added by @Mo
 */
function numbering_pagination() {
  global $wp_query;

  $total_pages = $wp_query->max_num_pages;

  if ( $total_pages <= 1 ) {
    return;
  }

  $current_page = max( 1, get_query_var('paged') );

  echo '<nav class="index-nav" aria-label="Pagination">';

  echo paginate_links([
    'base'      => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
    'format'    => '?paged=%#%',
    'current'   => $current_page,
    'total'     => $total_pages,
    'mid_size'  => 2, // 👈 meer nummers rond current
    'end_size'  => 1,
    'prev_text' => '<span class="btn-nav btn-nav-prev">← Previous</span>',
    'next_text' => '<span class="btn-nav btn-nav-next">Next →</span>',
    'type'      => 'plain',
  ]);

  echo '</nav>';
}


/**
 * Register Main Sidebar
 * MMCODE WP
 */

function mmcode_register_sidebars() {

  register_sidebar([
    'name'          => __('Main Sidebar', 'mmcode'),
    'id'            => 'main-sidebar',
    'description'   => __('Main sidebar for blog, category and archive pages.', 'mmcode'),

    'before_widget' => '<section id="%1$s" class="sidebar-widget %2$s">',
    'after_widget'  => '</section>',

    'before_title'  => '<h3 class="sidebar-title">',
    'after_title'   => '</h3>',
  ]);

}
add_action('widgets_init', 'mmcode_register_sidebars');


/**
 * Register Services Sidebar
 * MMCODE WP
 */
function mmcode_register_services_sidebar() {

  register_sidebar([
    'name'          => __('Services Sidebar', 'mmcode'),
    'id'            => 'services-sidebar',
    'description'   => __('Sidebar for services and landing pages.', 'mmcode'),

    'before_widget' => '<section id="%1$s" class="sidebar-widget %2$s">',
    'after_widget'  => '</section>',

    'before_title'  => '<h3 class="sidebar-title">',
    'after_title'   => '</h3>',
  ]);

}
add_action('widgets_init', 'mmcode_register_services_sidebar');

/**
 * Register Single Post Sidebar
 * MMCODE WP
 */
function mmcode_register_single_sidebar() {

  register_sidebar([
    'name'          => __('Single Post Sidebar', 'mmcode'),
    'id'            => 'single-post-sidebar',
    'description'   => __('Sidebar shown on single post pages.', 'mmcode'),

    'before_widget' => '<section id="%1$s" class="sidebar-widget %2$s">',
    'after_widget'  => '</section>',

    'before_title'  => '<h3 class="sidebar-title">',
    'after_title'   => '</h3>',
  ]);

}
add_action('widgets_init', 'mmcode_register_single_sidebar');
