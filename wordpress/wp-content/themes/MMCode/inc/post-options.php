<?php
/**
 * Post Options
 * MMCODE WP
 *
 * Bevat:
 * - Accent kleur per post
 * - Featured post (highlighted)
 *
 * Wordt geladen via functions.php
 */

/* ==========================================================
   ACCENT KLEUR PER POST
========================================================== */

/**
 * Voeg Accent Color meta box toe
 */
add_action('add_meta_boxes', function () {

  add_meta_box(
    'mmcode_post_accent',
    __('Post Accent Color', 'mmcode'),
    'mmcode_post_accent_render',
    'post',
    'side',
    'default'
  );

});

/**
 * Render Accent Color meta box
 */
function mmcode_post_accent_render($post) {

  // Beveiliging
  wp_nonce_field('mmcode_accent_nonce', 'mmcode_accent_nonce_field');

  // Huidige waarde ophalen (fallback = rood)
  $color = get_post_meta($post->ID, '_mmcode_accent_color', true);
  $color = $color ?: '#ef4444';
  ?>

  <p>
    <label for="mmcode_accent_color">
      <?php esc_html_e('Accent color for this post', 'mmcode'); ?>
    </label>
  </p>

  <input
    type="color"
    id="mmcode_accent_color"
    name="mmcode_accent_color"
    value="<?php echo esc_attr($color); ?>"
    style="width:100%;height:40px;"
  />

  <?php
}

/**
 * Accent kleur opslaan
 */
add_action('save_post', function ($post_id) {

  // Stop autosave
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }

  // Nonce check
  if (
    ! isset($_POST['mmcode_accent_nonce_field']) ||
    ! wp_verify_nonce($_POST['mmcode_accent_nonce_field'], 'mmcode_accent_nonce')
  ) {
    return;
  }

  // Rechten check
  if (! current_user_can('edit_post', $post_id)) {
    return;
  }

  // Opslaan
  if (isset($_POST['mmcode_accent_color'])) {
    update_post_meta(
      $post_id,
      '_mmcode_accent_color',
      sanitize_hex_color($_POST['mmcode_accent_color'])
    );
  }

});

/* ==========================================================
   FEATURED POST (HIGHLIGHTED)
========================================================== */

/**
 * Voeg Featured checkbox toe
 */
add_action('add_meta_boxes', function () {

  add_meta_box(
    'mmcode_featured_post',
    __('Featured Post', 'mmcode'),
    'mmcode_featured_post_render',
    'post',
    'side',
    'high'
  );

});

/**
 * Render Featured checkbox
 */
function mmcode_featured_post_render($post) {

  // Beveiliging
  wp_nonce_field('mmcode_featured_nonce', 'mmcode_featured_nonce_field');

  // Huidige waarde ophalen
  $is_featured = get_post_meta($post->ID, '_mmcode_featured', true);
  ?>

  <label style="display:flex;gap:8px;align-items:center;">
    <input type="checkbox"
           name="mmcode_featured"
           value="1"
           <?php checked($is_featured, '1'); ?> />

    <?php esc_html_e('Mark this post as Featured', 'mmcode'); ?>
  </label>

  <p style="margin-top:6px;font-size:12px;color:#666;">
    <?php esc_html_e('Featured posts can be highlighted on the homepage or category pages.', 'mmcode'); ?>
  </p>

  <?php
}

/**
 * Featured post opslaan
 */
add_action('save_post', function ($post_id) {

  // Stop autosave
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }

  // Nonce check
  if (
    ! isset($_POST['mmcode_featured_nonce_field']) ||
    ! wp_verify_nonce($_POST['mmcode_featured_nonce_field'], 'mmcode_featured_nonce')
  ) {
    return;
  }

  // Rechten check
  if (! current_user_can('edit_post', $post_id)) {
    return;
  }

  // Opslaan of verwijderen
  if (isset($_POST['mmcode_featured'])) {
    update_post_meta($post_id, '_mmcode_featured', '1');
  } else {
    delete_post_meta($post_id, '_mmcode_featured');
  }

});
