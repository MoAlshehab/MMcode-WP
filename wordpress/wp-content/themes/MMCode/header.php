<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">

  <div class="header-inner">

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
    <nav class="main-nav" aria-label="Main navigation">
      <?php mmcode_tailwind_menu(); ?>

      <button id="theme-toggle"
              class="theme-toggle"
              aria-label="Toggle dark mode">
        🌙
      </button>
    </nav>

  </div>

</header>
