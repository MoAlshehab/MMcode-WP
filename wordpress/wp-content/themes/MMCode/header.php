<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php
  /**
   * Theme kleuren ophalen uit Theme Settings
   */
  $options = get_option('mm_theme_options');
  $primary_color   = $options['primary_color']   ?? '#0f172a';
  $secondary_color = $options['secondary_color'] ?? '#2563eb';
  ?>

  <!-- Theme CSS variables (globaal) -->
<?php
$menu_hover_color = $options['menu_hover_color'] ?? $secondary_color;
?>
<style>
  :root {
    --mm-color-primary: <?php echo esc_html($primary_color); ?>;
    --mm-color-secondary: <?php echo esc_html($secondary_color); ?>;
    --mm-menu-hover-color: <?php echo esc_html($menu_hover_color); ?>;
  }

  /* ===== MENU HOVER (HEADER) ===== */
  .nav-main a {
    transition: color .2s ease;
  }
  .nav-main a:hover {
    color: var(--mm-menu-hover-color) !important;
  }

  /* ===== MENU HOVER (FOOTER) ===== */
  .footer-nav a {
    transition: color .2s ease;
  }
  .footer-nav a:hover {
    color: var(--mm-menu-hover-color) !important;
  }

  /* ===== OPTIONAL: LOGO HOVER ===== */
  .site-logo:hover {
    color: var(--mm-menu-hover-color) !important;
  }
</style>



  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header
  class="site-header border-b"
  style="border-color: var(--mm-color-primary);"
>

  <div class="header-inner max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

    <!-- Logo -->
    <a
      href="<?php echo esc_url(home_url('/')); ?>"
      class="site-logo text-xl font-bold flex items-center gap-2"
      style="color: var(--mm-color-primary);"
    >
      <?php
        if (has_custom_logo()) {
          the_custom_logo();
        } else {
          bloginfo('name');
        }
      ?>
    </a>

    <!-- Navigation -->
    <nav
      class="main-nav flex items-center gap-6"
      aria-label="Main navigation"
      id="mobileMenu"
    >
      <?php mmcode_tailwind_menu(); ?>

      <!-- Dark mode toggle -->
      <button
        id="theme-toggle"
        class="theme-toggle text-lg"
        aria-label="<?php esc_attr_e('Toggle dark mode', 'mmcode'); ?>"
        style="color: var(--mm-color-secondary);"
      >
        🌙
      </button>

      <!-- Mobile menu toggle -->
      <button
        id="mobileMenuToggle"
        class="mobile-menu-toggle text-2xl md:hidden"
        aria-label="<?php esc_attr_e('Toggle menu', 'mmcode'); ?>"
        style="color: var(--mm-color-primary);"
      >
        ☰
      </button>

    </nav>

  </div>

</header>
