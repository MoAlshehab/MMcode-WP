<?php get_header(); ?>

<main>

  <?php if ( has_post_thumbnail() ) : ?>
    <!-- HERO -->
    <section class="relative h-[60vh] w-full">

      <img
        src="<?php echo esc_url( get_the_post_thumbnail_url(null, 'full') ); ?>"
        alt="<?php echo esc_attr( get_the_title() ); ?>"
        class="absolute inset-0 w-full h-full object-cover"
      >

      <div class="absolute inset-0 bg-black/40"></div>

      <div class="relative z-10 h-full flex items-center justify-center text-center px-6">
        <h1 class="text-white text-4xl md:text-6xl font-bold">
          <?php the_title(); ?>
        </h1>
      </div>

    </section>
  <?php endif; ?>

  <!-- PAGE CONTENT -->
  <section class="max-w-7xl mx-auto px-6 py-16">
    <?php
    while ( have_posts() ) :
      the_post();
      the_content();
    endwhile;
    ?>
  </section>

</main>

<?php get_footer(); ?>
