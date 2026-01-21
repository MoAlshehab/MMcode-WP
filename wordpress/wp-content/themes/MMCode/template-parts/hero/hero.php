<?php
defined('ABSPATH') || exit;

$page_id = get_queried_object_id();

$hero_enabled = get_post_meta($page_id, '_mmcode_hero_enabled', true);
if ($hero_enabled === '') $hero_enabled = '1';
if ($hero_enabled !== '1') return;

$title   = get_post_meta($page_id, '_mmcode_hero_title', true);
$text    = get_post_meta($page_id, '_mmcode_hero_text', true);
$btn_txt = get_post_meta($page_id, '_mmcode_hero_btn_text', true);
$btn_url = get_post_meta($page_id, '_mmcode_hero_btn_url', true);
$image   = get_post_meta($page_id, '_mmcode_hero_image', true);

if (!$title && !$text && !$image) return;
?>

<section class="hero bg-surface border-b border-borderBase">
  <div class="mx-auto max-w-7xl px-6 py-20 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

    <div>
      <?php if ($title): ?>
        <h1 class="text-4xl lg:text-5xl font-heading font-bold mb-4">
          <?php echo esc_html($title); ?>
        </h1>
      <?php endif; ?>

      <?php if ($text): ?>
        <p class="text-lg text-textMuted mb-6">
          <?php echo esc_html($text); ?>
        </p>
      <?php endif; ?>

      <?php if ($btn_txt && $btn_url): ?>
        <a href="<?php echo esc_url($btn_url); ?>"
           class="inline-flex px-6 py-3 bg-primary text-white font-semibold rounded-lg hover:opacity-90 transition">
          <?php echo esc_html($btn_txt); ?>
        </a>
      <?php endif; ?>
    </div>

    <?php if ($image): ?>
      <div>
        <img src="<?php echo esc_url($image); ?>" class="rounded-xl shadow-lg w-full" alt="">
      </div>
    <?php endif; ?>

  </div>
</section>
