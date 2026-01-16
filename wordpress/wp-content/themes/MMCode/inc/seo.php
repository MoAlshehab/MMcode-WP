<?php
/**
 * SEO – Document title filters
 * MMCODE WP
 */

function mmcode_filter_document_title( $title ) {

  // Category archive
  if ( is_category() ) {

    $default = single_cat_title('', false) . ' Articles';

    $title['title'] = apply_filters(
      'mmcode_category_title',
      $default
    );
  }

  // Author archive
  if ( is_author() ) {

    $author_name = get_the_author();

    $title['title'] = apply_filters(
      'mmcode_author_title',
      $author_name . ' – Articles'
    );
  }

  // Search results
  if ( is_search() ) {

    $title['title'] = apply_filters(
      'mmcode_search_title',
      'Search results for "' . get_search_query() . '"'
    );
  }

  return $title;
}
add_filter('document_title_parts', 'mmcode_filter_document_title');
