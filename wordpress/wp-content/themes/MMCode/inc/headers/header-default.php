<?php
/**
 * Header layout: Default
 * - Logo links
 * - Menu rechts
 */
?>

<header
  class="site-header border-b bg-white dark:bg-bg dark:border-borderBase"
  style="border-color: var(--mm-color-primary);"
>
  <div class="header-inner max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

    <!-- LOGO -->
    <a
      href="<?php echo esc_url(home_url('/')); ?>"
      class="site-logo text-xl font-bold flex items-center gap-2"
      style="color: var(--mm-color-primary);"
    >
      <?php has_custom_logo() ? the_custom_logo() : bloginfo('name'); ?>
    </a>

    <!-- NAVIGATION -->
    <nav
      class="main-nav nav-main flex items-center gap-6"
      aria-label="<?php esc_attr_e('Main navigation', 'mmcode'); ?>"
      id="mobileMenu"
    >
      <?php mmcode_tailwind_menu(); ?>

      <button
        id="theme-toggle"
        class="theme-toggle text-lg"
        aria-label="<?php esc_attr_e('Toggle dark mode', 'mmcode'); ?>"
        style="color: var(--mm-color-secondary);"
      >
        🌙
      </button>

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
