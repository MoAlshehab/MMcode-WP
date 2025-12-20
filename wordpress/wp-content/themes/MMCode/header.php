<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class('bg-neutral-950'); ?>>
<?php wp_body_open(); ?>

<header class="border-b border-neutral-800 bg-neutral-950">
  <div class="mx-auto flex max-w-5xl items-center justify-between px-6 py-4">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="font-semibold text-red-500">
      MMCode
    </a>
    <nav class="text-sm text-neutral-300">
<?php mmcode_tailwind_menu(); ?>
    </nav>
  </div>
</header>
