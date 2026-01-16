<?php
/**
 * Lazy Loading Images
 * MMCODE WP
 */

function mmcode_lazy_load_images( $attr ) {
  if ( is_admin() ) {
    return $attr;
  }

  // default lazy loading
  $attr['loading']  = 'lazy';
  $attr['decoding'] = 'async';

  return $attr;
}

add_filter(
  'wp_get_attachment_image_attributes',
  'mmcode_lazy_load_images',
  10,
  1
);
