<?php
/**
 * Single Post Sidebar
 * MMCODE WP
 */

if ( ! is_single() ) {
  return;
}

if ( ! is_active_sidebar('single-post-sidebar') ) {
  return;
}

$post_id = get_the_ID();

/**
 * Comments count
 */
$comments_count = get_comments_number( $post_id );

/**
 * Same category post count
 */
$categories = wp_get_post_categories( $post_id );

$related_posts_count = 0;

if ( ! empty( $categories ) ) {
  $related_posts = new WP_Query([
    'category__in'   => $categories,
    'post__not_in'   => [ $post_id ],
    'posts_per_page'=> -1,
    'fields'         => 'ids',
  ]);

  $related_posts_count = $related_posts->post_count;
  wp_reset_postdata();
}
?>

<aside class="sidebar sidebar-single" role="complementary">

  <div class="sidebar-inner">

    <!-- COMMENTS COUNT -->
    <section class="sidebar-widget sidebar-stat">
      <h3 class="sidebar-title">
        Comments
      </h3>
      <p class="sidebar-stat-value">
        💬 <?php echo esc_html( $comments_count ); ?>
      </p>
    </section>

    <!-- RELATED POSTS COUNT -->
    <section class="sidebar-widget sidebar-stat">
      <h3 class="sidebar-title">
        Same category
      </h3>
      <p class="sidebar-stat-value">
        📝 <?php echo esc_html( $related_posts_count ); ?> posts
      </p>
    </section>

    <!-- EXTRA WIDGETS (ADMIN CONTROLLED) -->
    <?php dynamic_sidebar('single-post-sidebar'); ?>

  </div>

</aside>
