<?php
/**
 * Reading time helper
 * MMCODE WP
 */

function mmcode_reading_time( $post_id = null ) {

  $post_id = $post_id ?: get_the_ID();

  if ( ! $post_id ) {
    return '';
  }

  $content = get_post_field( 'post_content', $post_id );

  // Strip HTML + shortcodes
  $content = wp_strip_all_tags( strip_shortcodes( $content ) );

  $word_count = str_word_count( $content );

  // Gemiddeld 200 woorden per minuut
  $minutes = max( 1, ceil( $word_count / 200 ) );

  return sprintf(
    _n(
      '%d min read',
      '%d mins read',
      $minutes,
      'mmcode'
    ),
    $minutes
  );
}
