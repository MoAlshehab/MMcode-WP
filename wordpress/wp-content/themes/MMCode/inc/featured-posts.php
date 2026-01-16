<?php
/**
 * Featured Posts Priority
 * MMCODE WP
 *
 * Zorgt ervoor dat posts met meta `_mmcode_featured = 1`
 * automatisch bovenaan komen in:
 * - homepage
 * - category archives
 *
 * Werkt alleen op frontend & main query
 */


defined('ABSPATH') || exit;

/**
 * Check of post featured is
 */
function mmcode_is_featured_post($post_id = null) {

  $post_id = $post_id ?: get_the_ID();

  return get_post_meta($post_id, '_mmcode_featured', true) === '1';
}


defined('ABSPATH') || exit;

add_action('pre_get_posts', function ($query) {

  // ❌ nooit in admin
  if ( is_admin() ) {
    return;
  }

  // ❌ alleen main query aanpassen
  if ( ! $query->is_main_query() ) {
    return;
  }

  // ✅ alleen homepage & categorie
  if ( ! ( is_home() || is_category() ) ) {
    return;
  }

  /**
   * Meta query:
   * - featured posts eerst
   * - daarna normale posts
   */
  $query->set('meta_query', [
    'relation' => 'OR',
    [
      'key'     => '_mmcode_featured',
      'compare' => 'EXISTS',
    ],
    [
      'key'     => '_mmcode_featured',
      'compare' => 'NOT EXISTS',
    ],
  ]);

  /**
   * Sortering:
   * 1. Featured (DESC)
   * 2. Datum (DESC)
   */
  $query->set('orderby', [
    'meta_value' => 'DESC',
    'date'       => 'DESC',
  ]);

});
