<?php get_header(); ?>

<main class="single-page bg-white text-black dark:bg-bg dark:text-textBase">

<?php
if ( have_posts() ) :
  while ( have_posts() ) :
    the_post();

    // Color per post 
    $accent = get_post_meta(get_the_ID(), '_mmcode_accent_color', true);
    $accent = $accent ?: '#ef4444';


    // 👀 views tellen
    if ( function_exists('mmcode_set_post_views') ) {
      mmcode_set_post_views();
    }

    // 🔁 Per-post layout (default | full)
    $layout = get_post_meta( get_the_ID(), '_mmcode_post_layout', true );
    $layout = $layout ?: 'default';
?>

  <!-- LAYOUT -->
  <div class="layout-with-sidebar layout-<?php echo esc_attr($layout); ?>">

    <!-- CONTENT -->
    <div class="content-area">

      <!-- SIDEBAR TOGGLE (alleen als sidebar bestaat) -->
      <?php if ( $layout !== 'full' ) : ?>
        <button class="sidebar-toggle" id="sidebarToggle">
          ☰ Sidebar
        </button>
      <?php endif; ?>

      <!-- Breadcrumb -->
      <?php if ( function_exists('mmcode_breadcrumb') ) : ?>
        <?php mmcode_breadcrumb(); ?>
      <?php endif; ?>

      <article class="post-wrapper"   style="--accent: <?php echo esc_attr($accent); ?>;"<?php if ( function_exists('mmcode_schema_article') ) mmcode_schema_article(); ?>>

        <!-- HERO IMAGE -->
        <?php if ( has_post_thumbnail() ) : ?>
          <section class="hero">

            <div class="hero-media">
              <?php the_post_thumbnail('full', [
                'loading'        => 'eager',
                'fetchpriority' => 'high',
                'decoding'      => 'async',
              ]); ?>
            </div>

            <div class="hero-overlay">
              <span class="hero-category">
                <?php echo strip_tags( get_the_category_list(', ') ); ?>
              </span>

              <h1 class="hero-title"><?php the_title(); ?></h1>

              <p class="hero-meta">
                <?php echo get_the_date(); ?> · <?php the_author_posts_link(); ?>
              </p>
            </div>

          </section>
        <?php endif; ?>

        <!-- META -->
        <div class="post-meta">
          <span class="post-category">
            <?php echo strip_tags( get_the_category_list(', ') ); ?>
          </span>

          <span class="post-author-link">
            By <?php the_author_posts_link(); ?>
          </span>

          <span class="post-date">
            <?php echo get_the_date(); ?>
          </span>

          <?php if ( function_exists('mmcode_get_post_views') ) : ?>
            <span class="post-views">
              👀 <?php echo esc_html( mmcode_get_post_views() ); ?> views
            </span>
          <?php endif; ?>

          <?php if (
            function_exists('mmcode_reading_time') &&
            str_word_count( wp_strip_all_tags( get_the_content() ) ) > 300
          ) : ?>
            <span class="dot">•</span>
            <span class="post-reading-time">
              ⏱ <?php echo esc_html( mmcode_reading_time() ); ?>
            </span>
          <?php endif; ?>
        </div>

        <!-- CONTENT -->
        <div class="post-content">
          <?php the_content(); ?>
          <?php edit_post_link('Edit', '<p class="post-edit">', '</p>'); ?>
        </div>

        <!-- RELATED POSTS -->
        <?php
        $related_posts = get_posts([
          'posts_per_page' => 6,
          'orderby'        => 'rand',
          'post_status'    => 'publish',
          'category__in'   => wp_get_post_categories( get_the_ID() ),
          'post__not_in'   => [ get_the_ID() ],
        ]);
        ?>

        <?php if ( $related_posts ) : ?>
          <section class="post-related-posts">
            <h3 class="post-related-posts-title">
              <?php esc_html_e('Related posts', 'mmcode'); ?>
            </h3>

            <ul class="post-related-posts-list">
              <?php foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
                <li>
                  <a href="<?php the_permalink(); ?>" class="post-related-post-link">
                    <?php the_title(); ?>
                  </a>
                </li>
              <?php endforeach; wp_reset_postdata(); ?>
            </ul>
          </section>
        <?php endif; ?>

        <!-- ALL CATEGORIES -->
        <?php
        $all_categories = get_categories(['hide_empty' => false]);
        ?>

        <?php if ( $all_categories ) : ?>
          <section class="post-all-categories">
            <h3 class="post-all-categories-title">
              <?php esc_html_e('All categories', 'mmcode'); ?>
            </h3>

            <div class="post-all-categories-list">
              <?php foreach ( $all_categories as $category ) : ?>
                <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"
                   class="post-all-category">
                  <?php echo esc_html( $category->name ); ?>
                </a>
              <?php endforeach; ?>
            </div>
          </section>
        <?php endif; ?>

        <!-- TAGS -->
        <?php if ( has_tag() ) : ?>
          <div class="post-tags">
            <?php the_tags('<span>', '</span><span>', '</span>'); ?>
          </div>
        <?php endif; ?>

        <!-- AUTHOR -->
        <div class="post-author">
          <div class="post-author-avatar">
            <?php echo get_avatar( get_the_author_meta('ID'), 72 ); ?>
          </div>

          <div class="post-author-info">
            <p class="post-author-label">Written by</p>
            <p class="post-author-name"><?php the_author_posts_link(); ?></p>

            <?php if ( get_the_author_meta('description') ) : ?>
              <p class="post-author-bio">
                <?php the_author_meta('description'); ?>
              </p>
            <?php endif; ?>
          </div>
        </div>

        <!-- NAVIGATION -->
        <div class="post-navigation">
          <?php previous_post_link('%link','<span class="nav-btn">← %title</span>'); ?>
          <?php next_post_link('%link','<span class="nav-btn">%title →</span>'); ?>
        </div>

        <!-- COMMENTS -->
        <?php comments_template(); ?>

      </article>
    </div>

    <!-- SIDEBAR -->
    <?php if ( $layout !== 'full' ) : ?>
      <?php get_sidebar('single'); ?>
    <?php endif; ?>

  </div>

<?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
