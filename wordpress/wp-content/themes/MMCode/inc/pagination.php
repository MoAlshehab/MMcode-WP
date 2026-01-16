<?php
/**
 * Pagination
 */

function numbering_pagination() {
  global $wp_query;

  if ( $wp_query->max_num_pages <= 1 ) return;

  echo '<nav class="index-nav" aria-label="Pagination">';

  echo paginate_links([
    'current'   => max(1, get_query_var('paged')),
    'total'    => $wp_query->max_num_pages,
    'mid_size' => 2,
    'prev_text'=> '<span class="btn-nav">← Previous</span>',
    'next_text'=> '<span class="btn-nav">Next →</span>',
  ]);

  echo '</nav>';
}
