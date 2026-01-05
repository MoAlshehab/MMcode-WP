<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <title>
    <?php wp_title('|','true','right') ?>
    <?php bloginfo('name')?>
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="bg-white text-black border-b border-gray-200
               py-6
               dark:bg-bg dark:text-textBase dark:border-borderBase">

  <div class="mx-auto max-w-screen-xl px-6
              flex items-center justify-between">

    <!-- Logo -->
  <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
  <?php
    if ( has_custom_logo() ) {
      the_custom_logo();
    } else {
      bloginfo('name');
    }
  ?>
</a>


    <!-- Navigation -->
    <nav class="nav-main flex items-center gap-6">
      <?php mmcode_tailwind_menu(); ?>

      <button id="theme-toggle"
        class="btn-theme-toggle"
        aria-label="Toggle dark mode">
        🌙
      </button>
    </nav>

  </div>
</header>
