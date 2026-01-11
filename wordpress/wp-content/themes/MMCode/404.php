<?php get_header(); ?>

<main class="page">

  <section class="error-404">

    <div class="error-404-inner">

      <span class="error-code">404</span>

      <h1 class="error-title">
        Page not found
      </h1>

      <p class="error-description">
        Sorry, the page you are looking for doesn’t exist or has been moved.
        You can return to the homepage or explore our latest articles.
      </p>

      <div class="error-actions">
        <a href="<?php echo esc_url( home_url('/') ); ?>" class="btn btn-primary">
          Go to homepage
        </a>

        <a href="<?php echo esc_url( get_permalink( get_option('page_for_posts') ) ); ?>"
           class="btn btn-secondary">
          View blog
        </a>
      </div>

      <?php if ( have_posts() ) : ?>
        <div class="error-suggestions">
          <h2 class="error-suggestions-title">
            Latest articles
          </h2>

          <ul class="error-suggestions-list">
            <?php
              $latest_posts = get_posts([
                'posts_per_page' => 5,
                'post_status'    => 'publish',
              ]);

              foreach ( $latest_posts as $post ) :
                setup_postdata( $post );
            ?>
              <li>
                <a href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                </a>
              </li>
            <?php endforeach; wp_reset_postdata(); ?>
          </ul>
        </div>
      <?php endif; ?>

    </div>

  </section>

</main>

<?php get_footer(); ?>
