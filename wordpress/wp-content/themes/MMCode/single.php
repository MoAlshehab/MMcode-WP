<?php get_header(); ?>

<main class="bg-bg text-textBase">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article class="post-wrapper">

    <?php if ( has_post_thumbnail() ) : ?>
      <div class="post-image">
        <?php the_post_thumbnail('large'); ?>
      </div>
    <?php endif; ?>

    <div class="post-meta">
      <span class="post-category">
        <?php echo strip_tags( get_the_category_list(', ') ); ?>
      </span>
      <span>By <?php the_author_posts_link(); ?></span>
      <span><?php echo get_the_date(); ?></span>
    </div>
    <h1 class="text-primary"><?php the_title(); ?></h1>

    <div class="post-content">
      <?php the_content(); ?>
       <?php edit_post_link('Edit'); ?>

    </div>

    <?php if ( has_tag() ) : ?>
      <div class="post-tags">
        <?php the_tags('Tags: ', ', '); ?>
      </div>
    <?php endif; ?>

    <!-- <div class="post-author">
      <?php echo get_avatar( get_the_author_meta('ID') ); ?>
      <div>
        <p class="text-sm text-textMuted">Written by</p>
        <p class="font-semibold text-primary"><?php the_author(); ?></p>
        <p class="text-sm text-textMuted"><?php the_author_meta('description'); ?></p>
      </div>
    </div>
    <p> User Posts Count: <span> <?php echo count_user_posts(get_the_author_meta('ID')) ?> </php></span></p>
        <p> User Profile Link: <span> <?php the_author_posts_link() ?> </php></span></p> -->
<div class="post-author">

  <!-- Avatar -->
  <div class="post-author-avatar">
    <?php echo get_avatar( get_the_author_meta('ID'), 72 ); ?>
  </div>

  <!-- Author info -->
  <div class="post-author-info">

    <p class="post-author-label">
      Written by
    </p>

    <p class="post-author-name">
      <?php the_author(); ?>
    </p>

    <?php if ( get_the_author_meta('description') ) : ?>
      <p class="post-author-bio">
        <?php the_author_meta('description'); ?>
      </p>
    <?php endif; ?>

    <!-- Meta info -->
    <div class="post-author-meta">

      <span>
        📝 <?php echo count_user_posts( get_the_author_meta('ID') ); ?> posts
      </span>

      <span class="dot">•</span>

      <span>
        👤 <?php the_author_posts_link(); ?>
      </span>

    </div>

  </div>

</div>


  <div class="mt-16 flex justify-between border-t border-borderBase pt-6">

  <!-- Previous -->
  <?php if ( get_previous_post() ) : ?>
    <?php previous_post_link(
      '%link',
      '<span class="btn-nav">← %title</span>'
    ); ?>
  <?php else : ?>
    <span class="btn-nav-disabled">← No previous</span>
  <?php endif; ?>

  <!-- Next -->
  <?php if ( get_next_post() ) : ?>
    <?php next_post_link(
      '%link',
      '<span class="btn-nav">%title →</span>'
    ); ?>
  <?php else : ?>
    <span class="btn-nav-disabled">No next →</span>
  <?php endif; ?>

</div>
  </div>
  
   <?php comments_template(); ?>
  
  </div>

  </article>

<?php endwhile; endif; ?>


</main>

<?php get_footer(); ?>
