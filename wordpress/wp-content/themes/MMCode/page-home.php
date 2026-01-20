<?php
/**
 * Template Name: Home Page
 */
get_header();
?>

<?php if ( has_post_thumbnail() ) : ?>
  <?php get_template_part('template-parts/hero'); ?>
<?php endif; ?>

<section class="max-w-7xl mx-auto px-6 py-20">
  <?php
  while ( have_posts() ) :
    the_post();
    the_content();
  endwhile;
  ?>
</section>

<?php get_footer(); ?>
