<?php get_header(); ?>

<?php
  $author_id    = get_queried_object_id();
  $author_name  = get_the_author_meta('display_name', $author_id);
  $total_posts  = count_user_posts($author_id);
?>

<main class="author-page page">

  <!-- AUTHOR HEADER -->
  <section class="author-hero">
    <div class="author-hero-inner">

      <div class="author-avatar">
        <?php echo get_avatar($author_id, 96); ?>
      </div>

      <div class="author-info">
        <h1 class="author-name"><?php echo esc_html($author_name); ?></h1>

        <?php if ( get_the_author_meta('description', $author_id) ) : ?>
          <p class="author-bio">
            <?php echo esc_html( get_the_author_meta('description', $author_id) ); ?>
          </p>
        <?php endif; ?>

        <div class="author-stats">
          <span>📝 <?php echo $total_posts; ?> posts</span>
          <span class="dot">•</span>
          <span>
            💬 <?php echo get_comments(['user_id' => $author_id, 'count' => true]); ?> comments
          </span>
          <span class="dot">•</span>
          <span>
            ⏳ Member since
            <?php echo date_i18n('F Y', strtotime(get_the_author_meta('user_registered', $author_id))); ?>
          </span>
        </div>
      </div>

    </div>
  </section>

  <!-- CONTENT + SIDEBAR -->
  <section class="author-content">

    <div class="layout-with-sidebar" id="authorLayout">

      <!-- CONTENT -->
      <div class="content-area">

        <header class="author-posts-header">
          <h2 class="author-posts-title">
            <?php echo ($total_posts >= 6)
              ? 'Latest 6 posts by ' . esc_html($author_name)
              : 'Latest posts by ' . esc_html($author_name);
            ?>
          </h2>

          <!-- SIDEBAR TOGGLE -->
          <button class="sidebar-toggle" id="sidebarToggle">
            ☰ Sidebar
          </button>
        </header>

        <?php
          $author_posts = new WP_Query([
            'author'         => $author_id,
            'posts_per_page' => 6,
            'paged'          => get_query_var('paged') ?: 1,
          ]);
        ?>

        <?php if ( $author_posts->have_posts() ) : ?>
          <div class="author-posts-grid">

            <?php while ( $author_posts->have_posts() ) : $author_posts->the_post(); ?>
              <article class="author-post-card">

                <?php if ( has_post_thumbnail() ) : ?>
                  <a href="<?php the_permalink(); ?>" class="author-post-image">
                    <?php the_post_thumbnail('medium'); ?>
                  </a>
                <?php endif; ?>

                <div class="author-post-content">
                  <h3 class="author-post-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </h3>

                  <p class="author-post-excerpt"><?php the_excerpt(); ?></p>

                  <a href="<?php the_permalink(); ?>" class="author-post-link">
                    Read article →
                  </a>
                </div>

              </article>
            <?php endwhile; ?>

          </div>

          <?php numbering_pagination(); ?>

        <?php else : ?>
          <p class="text-textMuted">No posts found.</p>
        <?php endif; wp_reset_postdata(); ?>

      </div>

      <!-- SIDEBAR -->
      <aside class="sidebar is-hidden" id="authorSidebar">
        <?php get_sidebar(); ?>
      </aside>

    </div>

  </section>

</main>

<?php get_footer(); ?>
