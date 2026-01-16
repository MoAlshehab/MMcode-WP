<?php
/**
 * Table of Contents generator
 * MMCODE WP
 */

function mmcode_generate_toc( $content ) {

  if ( ! is_single() ) {
    return $content;
  }

  // Alleen bij lange posts
  if ( str_word_count( wp_strip_all_tags( $content ) ) < 300 ) {
    return $content;
  }

  preg_match_all('/<h([2-3])>(.*?)<\/h[2-3]>/', $content, $matches, PREG_SET_ORDER);

  if ( empty( $matches ) ) {
    return $content;
  }

  $toc = '<nav class="post-toc" aria-label="Table of contents">';
  $toc .= '<h3 class="post-toc-title">Contents</h3>';
  $toc .= '<ul class="post-toc-list">';

  foreach ( $matches as $index => $heading ) {
    $level = $heading[1];
    $text  = strip_tags( $heading[2] );
    $id    = 'toc-' . $index;

    // ID injecteren in content
    $content = str_replace(
      $heading[0],
      '<h' . $level . ' id="' . esc_attr($id) . '">' . $heading[2] . '</h' . $level . '>',
      $content
    );

    $toc .= '<li class="toc-level-' . $level . '">';
    $toc .= '<a href="#' . esc_attr($id) . '">' . esc_html($text) . '</a>';
    $toc .= '</li>';
  }

  $toc .= '</ul></nav>';

  // TOC boven content plaatsen
  return $toc . $content;
}

add_filter( 'the_content', 'mmcode_generate_toc', 5 );
