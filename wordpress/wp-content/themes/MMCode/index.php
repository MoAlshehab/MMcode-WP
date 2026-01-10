<?php get_header(); ?>

<main class="index-page">

<?php if ( have_posts() ) : ?>
  <div class="index-container">

    <header class="index-header">
      <h1 class="index-heading">Latest articles</h1>
      <p class="index-subheading">
        Insights, tutorials and updates from MMCode
      </p>
    </header>

    <div class="index-grid">

      <?php while ( have_posts() ) : the_post(); ?>
        <article class="index-card">

          <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>" class="index-card-image">
              <?php the_post_thumbnail('large'); ?>
            </a>
          <?php endif; ?>

          <div class="index-card-body">

            <div class="index-meta">
              <span class="index-category">
                <?php echo strip_tags( get_the_category_list(', ') ); ?>
              </span>
              <span>• <?php echo get_the_date(); ?></span>
              <span>• <?php comments_number('0 comments','1 comment','% comments'); ?></span>
            </div>

            <h2 class="index-card-title">
              <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
              </a>
            </h2>

            <div class="index-card-excerpt">
              <?php the_excerpt(); ?>
            </div>

            <div class="index-card-author">
              <?php echo get_avatar( get_the_author_meta('ID'), 40 ); ?>
              <div>
                <p class="author-label">Written by</p>
                <p class="author-name"><?php the_author(); ?></p>
              </div>
            </div>

          </div>

        </article>
      <?php endwhile; ?>

    </div>

    <?php numbering_pagination(); ?>

  </div>
<?php endif; ?>

</main>

<?php get_footer(); ?>
