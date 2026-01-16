<?php
/**
 * Post views counter
 * MMCODE WP
 */

function mmcode_set_post_views( $post_id = null ) {

  if ( is_admin() ) {
    return;
  }

  $post_id = $post_id ?: get_the_ID();

  if ( ! $post_id || ! is_single() ) {
    return;
  }

  $key   = 'mmcode_post_views';
  $views = (int) get_post_meta( $post_id, $key, true );

  update_post_meta( $post_id, $key, $views + 1 );
}

/**
 * Get post views
 */
function mmcode_get_post_views( $post_id = null ) {

  $post_id = $post_id ?: get_the_ID();

  return (int) get_post_meta( $post_id, 'mmcode_post_views', true );
}
