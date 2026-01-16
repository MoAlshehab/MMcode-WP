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
$latest_related_posts = [];
$most_commented_posts = null;

if ( ! empty( $categories ) ) {

  // Count related posts
  $related_posts = new WP_Query([
    'category__in'    => $categories,
    'post__not_in'    => [ $post_id ],
    'posts_per_page' => -1,
    'fields'          => 'ids',
  ]);

  $related_posts_count = $related_posts->post_count;
  wp_reset_postdata();

  // Latest 3 posts from same category
  $latest_related_posts = new WP_Query([
    'category__in'    => $categories,
    'post__not_in'    => [ $post_id ],
    'posts_per_page' => 3,
    'orderby'         => 'date',
    'order'           => 'DESC',
  ]);

  // Top 2 most commented posts from same category
  $most_commented_posts = new WP_Query([
    'category__in'    => $categories,
    'post__not_in'    => [ $post_id ],
    'posts_per_page' => 2,
    'orderby'         => 'comment_count',
    'order'           => 'DESC',
    'ignore_sticky_posts' => true,
  ]);
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

    <!-- LATEST POSTS FROM SAME CATEGORY -->
    <?php if ( $latest_related_posts && $latest_related_posts->have_posts() ) : ?>
      <section class="sidebar-widget sidebar-related-posts">

        <h3 class="sidebar-title">
          Latest in this category
        </h3>

        <ul class="sidebar-related-list">
          <?php while ( $latest_related_posts->have_posts() ) : $latest_related_posts->the_post(); ?>
            <li>
              <a href="<?php the_permalink(); ?>" class="sidebar-related-link">
                <?php the_title(); ?>
              </a>
            </li>
          <?php endwhile; ?>
        </ul>

        <?php wp_reset_postdata(); ?>

      </section>
    <?php endif; ?>

    <!-- MOST COMMENTED POSTS -->
    <?php if ( $most_commented_posts && $most_commented_posts->have_posts() ) : ?>
      <section class="sidebar-widget sidebar-most-commented">

        <h3 class="sidebar-title">
          Most discussed
        </h3>

        <ul class="sidebar-related-list">
          <?php while ( $most_commented_posts->have_posts() ) : $most_commented_posts->the_post(); ?>
            <li class="sidebar-most-commented-item">
              <a href="<?php the_permalink(); ?>" class="sidebar-related-link">
                <?php the_title(); ?>
              </a>
              <span class="sidebar-comment-count">
                💬 <?php echo get_comments_number(); ?>
              </span>
            </li>
          <?php endwhile; ?>
        </ul>

        <?php wp_reset_postdata(); ?>

      </section>
    <?php endif; ?>

    <!-- EXTRA WIDGETS (ADMIN CONTROLLED) -->
    <?php dynamic_sidebar('single-post-sidebar'); ?>

  </div>

</aside>
