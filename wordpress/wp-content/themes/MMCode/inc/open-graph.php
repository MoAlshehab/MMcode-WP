<?php
/**
 * Open Graph meta tags
 * MMCODE WP
 */

function mmcode_open_graph_tags() {

  if ( is_admin() ) {
    return;
  }

  // Basis
  $title       = wp_get_document_title();
  $url         = esc_url( get_permalink() );
  $site_name   = get_bloginfo('name');
  $description = '';

  // Description bepalen
  if ( is_single() || is_page() ) {
    $description = wp_strip_all_tags( get_the_excerpt() );
  } elseif ( is_category() ) {
    $description = strip_tags( category_description() );
  } else {
    $description = get_bloginfo('description');
  }

  // Image bepalen
  if ( is_single() && has_post_thumbnail() ) {
    $image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
  } else {
    $image = get_template_directory_uri() . '/assets/images/og-default.jpg';
  }

  // Filters (extensible)
  $title       = apply_filters('mmcode_og_title', $title);
  $description = apply_filters('mmcode_og_description', $description);
  $image       = apply_filters('mmcode_og_image', $image);
  $url         = apply_filters('mmcode_og_url', $url);

  echo "\n<!-- Open Graph -->\n";
  echo '<meta property="og:type" content="website" />' . "\n";
  echo '<meta property="og:title" content="' . esc_attr( $title ) . '" />' . "\n";
  echo '<meta property="og:description" content="' . esc_attr( $description ) . '" />' . "\n";
  echo '<meta property="og:url" content="' . esc_url( $url ) . '" />' . "\n";
  echo '<meta property="og:site_name" content="' . esc_attr( $site_name ) . '" />' . "\n";
  echo '<meta property="og:image" content="' . esc_url( $image ) . '" />' . "\n";
}
add_action('wp_head', 'mmcode_open_graph_tags', 5);
