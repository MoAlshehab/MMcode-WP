<?php
function mmcode_breadcrumb() {
  if ( is_front_page() ) return;

  echo '<nav class="breadcrumb" aria-label="Breadcrumb">';
  echo '<ul class="breadcrumb-list">';

  echo '<li class="breadcrumb-item"><a href="' . esc_url(home_url('/')) . '">Home</a></li>';

  if ( is_single() ) {
    $categories = get_the_category();
    if ( $categories ) {
      $cat = $categories[0];
      echo '<li class="breadcrumb-separator">/</li>';
      echo '<li class="breadcrumb-item"><a href="' . esc_url(get_category_link($cat->term_id)) . '">' . esc_html($cat->name) . '</a></li>';
    }

    echo '<li class="breadcrumb-separator">/</li>';
    echo '<li class="breadcrumb-item current">' . esc_html(get_the_title()) . '</li>';
  }

  echo '</ul></nav>';
}
