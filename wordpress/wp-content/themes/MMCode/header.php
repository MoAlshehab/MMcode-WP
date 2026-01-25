<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<?php
/**
 * Theme opties ophalen
 */
$options = get_option('mm_theme_options');

$primary_color    = $options['primary_color'] ?? '#0f172a';
$secondary_color  = $options['secondary_color'] ?? '#2563eb';
$menu_hover_color = $options['menu_hover_color'] ?? $secondary_color;

/**
 * Fonts uit Theme Settings
 * LET OP: deze keys komen uit mm_available_fonts()
 */
$header_font_key = mm_get_option('header_menu_font', 'inter');
$footer_font_key = mm_get_option('footer_font', 'inter');

/**
 * Font map (CSS veilige waarden)
 */
$font_map = [
    'inter'      => 'Inter, sans-serif',
    'poppins'    => 'Poppins, sans-serif',
    'roboto'     => 'Roboto, sans-serif',
    'montserrat' => 'Montserrat, sans-serif',
    'bebas'      => '"Bebas Neue", cursive',
    'ibm'        => '"IBM Plex Sans", sans-serif',
];
?>

<!-- ==================================================
     THEME CSS VARIABLES (CENTRAAL)
================================================== -->
<style>
:root {
  /* Kleuren */
  --mm-color-primary: <?php echo esc_html($primary_color); ?>;
  --mm-color-secondary: <?php echo esc_html($secondary_color); ?>;
  --mm-menu-hover-color: <?php echo esc_html($menu_hover_color); ?>;

  /* Fonts */
  --mm-font-header-menu: <?php echo esc_html($font_map[$header_font_key]); ?>;
  --mm-font-footer: <?php echo esc_html($font_map[$footer_font_key]); ?>;
}

/* ==================================================
   HEADER MENU FONT (ALLEEN MENU)
================================================== */
.nav-main {
  font-family: var(--mm-font-header-menu);
}

/* Hover kleur blijft uit Theme Settings */
.nav-main a:hover {
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

    <!-- LOGO -->
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

    <!-- NAVIGATION -->
    <nav
      class="main-nav nav-main flex items-center gap-6"
      aria-label="<?php esc_attr_e('Main navigation', 'mmcode'); ?>"
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
