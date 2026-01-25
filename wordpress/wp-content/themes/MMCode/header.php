<?php
/**
 * Header wrapper
 * - HTML <head>
 * - CSS variables
 * - Header loader
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<?php
/**
 * Theme opties ophalen (ALLEEN VARIABLES)
 */
$options = get_option('mm_theme_options');

$primary_color    = $options['primary_color'] ?? '#0f172a';
$secondary_color  = $options['secondary_color'] ?? '#2563eb';
$menu_hover_color = $options['menu_hover_color'] ?? $secondary_color;

$header_font_key = mm_get_option('header_menu_font', 'inter');
$footer_font_key = mm_get_option('footer_font', 'inter');

$font_map = [
    'inter'      => 'Inter, sans-serif',
    'poppins'    => 'Poppins, sans-serif',
    'roboto'     => 'Roboto, sans-serif',
    'montserrat' => 'Montserrat, sans-serif',
    'bebas'      => '"Bebas Neue", cursive',
    'ibm'        => '"IBM Plex Sans", sans-serif',
];
?>

<!-- ===== THEME CSS VARIABLES ===== -->
<style>
:root {
  --mm-color-primary: <?php echo esc_html($primary_color); ?>;
  --mm-color-secondary: <?php echo esc_html($secondary_color); ?>;
  --mm-menu-hover-color: <?php echo esc_html($menu_hover_color); ?>;

  --mm-font-header-menu: <?php echo esc_html($font_map[$header_font_key]); ?>;
  --mm-font-footer: <?php echo esc_html($font_map[$footer_font_key]); ?>;
}

/* Header menu font */
.nav-main {
  font-family: var(--mm-font-header-menu);
}
.nav-main a:hover {
  color: var(--mm-menu-hover-color) !important;
}
</style>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
// 🔥 HIER WORDT DE HEADER GELADEN
mm_load_header();
