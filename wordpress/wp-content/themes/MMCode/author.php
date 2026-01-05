<?php get_header(); ?>

<main class="bg-white text-black dark:bg-bg dark:text-textBase">

  <?php
    $author_id = get_queried_object_id();
  ?>

  <!-- Author header -->
  <section class="author-hero">
    <div class="author-hero-inner">

      <div class="author-avatar">
        <?php echo get_avatar($author_id, 120); ?>
      </div>

      <div class="author-info">
        <h1 class="author-name">
          <?php echo get_the_author_meta('display_name', $author_id); ?>
        </h1>

        <?php if ( get_the_author_meta('description', $author_id) ) : ?>
          <p class="author-bio">
            <?php echo get_the_author_meta('description', $author_id); ?>
          </p>
        <?php endif; ?>

        <div class="author-stats">
          <span>
            📝 <?php echo count_user_posts($author_id); ?> posts
          </span>

          <?php if ( get_the_author_meta('user_url', $author_id) ) : ?>
            <span class="dot">•</span>
            <a href="<?php echo esc_url(get_the_author_meta('user_url', $author_id)); ?>" target="_blank">
              🌐 Website
            </a>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </section>

  <!-- Author posts -->
  <section class="author-posts">
    <div class="author-posts-inner">

      <h2 class="author-posts-title">
        Articles by <?php echo get_the_author_meta('display_name', $author_id); ?>
      </h2>

      <?php if ( have_posts() ) : ?>
        <div class="author-posts-grid">

          <?php while ( have_posts() ) : the_post(); ?>
            <article class="author-post-card">

              <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>" class="author-post-image">
                  <?php the_post_thumbnail('medium'); ?>
                </a>
              <?php endif; ?>

              <div class="author-post-content">
                <h3 class="author-post-title">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                  </a>
                </h3>

                <p class="author-post-excerpt">
                  <?php the_excerpt(); ?>
                </p>

                <a href="<?php the_permalink(); ?>" class="author-post-link">
                  Read article →
                </a>
              </div>

            </article>
          <?php endwhile; ?>

        </div>
      <?php else : ?>
        <p class="text-textMuted">
          No posts found.
        </p>
      <?php endif; ?>

    </div>
  </section>

</main>

<?php get_footer(); ?>
