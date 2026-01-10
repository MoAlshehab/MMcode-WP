<?php get_header(); ?>

<main class=" single-page bg-white text-black dark:bg-bg dark:text-textBase">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article class="post-wrapper">

  <!-- Featured image -->
  <?php if ( has_post_thumbnail() ) : ?>
    <div class="post-image">
      <?php the_post_thumbnail('large'); ?>
    </div>
  <?php endif; ?>

  <!-- Meta info -->
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
  </div>
  
  <!-- Title -->
  <h1 class="post-title">
    <?php the_title();
    
    // echo get_queried_object_id();
    // print_r(wp_get_post_categories(get_queried_object_id()))
    ?>
  </h1>

  <!-- Content -->
  <div class="post-content">
    <?php the_content(); ?>
    <?php edit_post_link('Edit', '<p class="post-edit">', '</p>'); ?>
  </div>
  <?php
$all_categories = get_categories([
  'hide_empty' => false, // 👈 ook lege categorieën tonen
]);
?>

<?php
$related_posts = get_posts([
  'posts_per_page' => 6,
  'orderby'        => 'rand',
  'post_status'    => 'publish',

  // 👇 alleen posts uit dezelfde categorieën
  'category__in'   => wp_get_post_categories( get_the_ID() ),

  // 👇 huidige post uitsluiten
  'post__not_in'   => [ get_the_ID() ],
]);
?>

<?php if ( ! empty( $related_posts ) ) : ?>
  <div class="post-related-posts">

    <h3 class="post-related-posts-title">
      Related posts
    </h3>

    <ul class="post-related-posts-list">
      <?php foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
        <li>
          <a href="<?php the_permalink(); ?>"
             class="post-related-post-link">
            <?php the_title(); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>

    <?php wp_reset_postdata(); ?>

  </div>
<?php endif; ?>



<?php if ( ! empty( $all_categories ) ) : ?>
  <div class="post-all-categories">

    <h3 class="post-all-categories-title">
      All categories
    </h3>

    <div class="post-all-categories-list">
      <?php foreach ( $all_categories as $category ) : ?>
        <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"
           class="post-all-category">
          <?php echo esc_html( $category->name ); ?>
        </a>
      <?php endforeach; ?>
    </div>

  </div>
<?php endif; ?>



  <!-- Tags -->
  <?php if ( has_tag() ) : ?>
    <div class="post-tags">
      <?php the_tags('<span>', '</span><span>', '</span>'); ?>
    </div>
  <?php endif; ?>

  <!-- Author card -->
 <div class="post-author bg-white text-black dark:bg-bg dark:text-textBase">

    <div class="post-author-avatar">
      <?php echo get_avatar( get_the_author_meta('ID'), 72 ); ?>
    </div>

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

      <div class="post-author-meta">
        <span>
          📝 <?php echo count_user_posts( get_the_author_meta('ID') ); ?> posts
        </span>

        <span class="dot">•</span>

        <span>
          <?php the_author_posts_link(); ?>
        </span>
      </div>

    </div>
  </div>

  <!-- Post navigation -->
  <div class="post-navigation">

    <?php if ( get_previous_post() ) : ?>
      <?php previous_post_link(
        '%link',
        '<span class="nav-btn">← %title</span>'
      ); ?>
    <?php else : ?>
      <span class="nav-btn disabled">← No previous</span>
    <?php endif; ?>

    <?php if ( get_next_post() ) : ?>
      <?php next_post_link(
        '%link',
        '<span class="nav-btn">%title →</span>'
      ); ?>
    <?php else : ?>
      <span class="nav-btn disabled">No next →</span>
    <?php endif; ?>

  </div>

  <!-- Comments -->
  <?php comments_template(); ?>

</article>

<?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
