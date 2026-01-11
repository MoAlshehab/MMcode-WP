<?php get_header(); ?>

<?php
  $category       = get_queried_object();
  $post_count     = $category->count;

/**
 * Count total comments in this category
 */
  $comments_count = 0;
  $posts_in_cat = get_posts([
    'category'        => $category->term_id,
    'posts_per_page'  => -1,
    'fields'          => 'ids',
  ]);

  if ( $posts_in_cat ) {
    foreach ( $posts_in_cat as $post_id ) {
      $comments_count += get_comments_number( $post_id );
    }
  }
?>

<main class="category-page page">

  <!-- CATEGORY HEADER -->
  <section class="category-hero">

    <div class="category-hero-inner">

      <span class="category-label">
        Category
      </span>

      <h1 class="category-title">
        <?php single_cat_title(); ?>
      </h1>

      <?php if ( category_description() ) : ?>
        <p class="category-description">
          <?php echo category_description(); ?>
        </p>
      <?php endif; ?>

      <!-- STATS -->
      <div class="category-stats">
        <span>
          📝 <?php echo esc_html( $post_count ); ?> articles
        </span>
        <span class="dot">•</span>
        <span>
          💬 <?php echo esc_html( $comments_count ); ?> comments
        </span>
      </div>

    </div>

  </section>

  <!-- POSTS -->
  <section class="category-posts">

    <div class="category-posts-inner">

      <?php if ( have_posts() ) : ?>

        <div class="category-grid">

          <?php while ( have_posts() ) : the_post(); ?>
            <article class="category-card">
<!-- Hier is een custom category voor services page en die laat ik tonen zonder foto -->

              <!-- <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>" class="category-card-image">
                  <?php the_post_thumbnail('large'); ?>
                </a>
              <?php endif; ?> -->

              <div class="category-card-body">

                <div class="category-meta">
                  <span><?php echo get_the_date(); ?></span>
                  <span class="dot">•</span>
                  <span><?php comments_number('0 comments','1 comment','% comments'); ?></span>
                </div>

                <h2 class="category-card-title">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                  </a>
                </h2>

                <div class="category-card-excerpt">
                  <?php the_excerpt(); ?>
                </div>

                <div class="category-card-footer">
                  <span><?php the_author(); ?></span>
                  <a href="<?php the_permalink(); ?>" class="category-read-more">
                    Read →
                  </a>
                </div>

              </div>

            </article>
          <?php endwhile; ?>

        </div>

        <?php numbering_pagination(); ?>

      <?php else : ?>

        <p class="category-empty">
          No articles found in this category.
        </p>

      <?php endif; ?>

    </div>

  </section>

</main>

<?php get_footer(); ?>
