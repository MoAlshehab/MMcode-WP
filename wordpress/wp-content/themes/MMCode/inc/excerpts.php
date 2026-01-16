<?php
/**
 * Excerpts
 */

function mmcode_custom_excerpt_length( $length ) {

  if ( is_admin() ) return $length;

  if ( is_home() ) return 30;
  if ( is_author() ) return 20;
  if ( is_category() ) return 5;
  if ( is_search() ) return 25;
  if ( is_archive() ) return 22;

  return 20;
}
add_filter('excerpt_length', 'mmcode_custom_excerpt_length', 999);

add_filter('excerpt_more', function () {
  return '…';
});
