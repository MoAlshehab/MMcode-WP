<?php get_header(); ?>

<main class="index-wrapper">

<?php if ( have_posts() ) : ?>
  <div class="index-container">

  <?php while ( have_posts() ) : the_post(); ?>
    <article class="index-post">

      <?php if ( has_post_thumbnail() ) : ?>
        <div class="index-featured">
          <?php the_post_thumbnail('large'); ?>
        </div>
      <?php endif; ?>

      <div class="index-meta">
        <span class="index-category">
          <?php echo get_the_category_list(', '); ?>
        </span>
        <span>• <?php the_time('F j, Y'); ?></span>
        <span>• <?php comments_number('0 comments','1 comment','% comments'); ?></span>
      </div>

      <h2 class="index-title">
        <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
        </a>
      </h2>

      <div class="index-content">
        <?php the_excerpt(); ?>
      </div>

      <div class="index-author">
        <?php echo get_avatar( get_the_author_meta('ID'), 48 ); ?>
        <div>
          <p class="text-sm text-textMuted">Written by</p>
          <p class="font-semibold text-primary"><?php the_author(); ?></p>
        </div>
      </div>

    </article>
  <?php endwhile; ?>

  <div class="index-nav">
    <?php previous_posts_link('<span class="btn-nav">← Previous</span>'); ?>
    <?php next_posts_link('<span class="btn-nav">Next →</span>'); ?>
  </div>

  </div>
<?php endif; ?>

</main>

<?php get_footer(); ?>
