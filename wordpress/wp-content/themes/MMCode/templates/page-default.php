<?php
/**
 * Template Name: Standaard Pagina (MMCODE)
 */

get_header();
?>

<main class="page-content py-20">
  <div class="<?php echo esc_attr(mm_container_class()); ?>">
    <?php
      while (have_posts()) :
        the_post();
        the_content();
      endwhile;
    ?>
  </div>
</main>

<?php get_footer(); ?>
