<?php
/**
 * Front Page
 * MMCODE WP
 */

get_header();

$page_id = get_queried_object_id();
$sidebar = get_post_meta($page_id, '_mmcode_sidebar', true);
if ($sidebar === '') $sidebar = 'none';

get_template_part('template-parts/hero/hero');
?>

<main class="front-page">

  <div class="mx-auto max-w-7xl px-6 py-16 grid grid-cols-1 <?php echo $sidebar !== 'none' ? 'lg:grid-cols-3 gap-10' : ''; ?>">

    <div class="<?php echo $sidebar !== 'none' ? 'lg:col-span-2' : 'lg:col-span-3'; ?>">
      <?php
      while (have_posts()) :
        the_post();
        the_content();
      endwhile;
      ?>
    </div>

    <?php if ($sidebar !== 'none'): ?>
      <aside class="lg:col-span-1">
        <?php
          if ($sidebar === 'service') get_sidebar('service');
          elseif ($sidebar === 'single') get_sidebar('single');
          else get_sidebar();
        ?>
      </aside>
    <?php endif; ?>

  </div>

</main>

<?php get_footer(); ?>
