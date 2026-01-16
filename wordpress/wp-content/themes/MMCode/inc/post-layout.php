<?php
/**
 * Per-post layout switch
 * MMCODE WP
 */

/* Register meta box */
add_action('add_meta_boxes', function () {
  add_meta_box(
    'mmcode_post_layout',
    __('Post Layout', 'mmcode'),
    'mmcode_render_post_layout',
    'post',
    'side'
  );
});

/* Render meta box */
function mmcode_render_post_layout($post) {
  $value = get_post_meta($post->ID, '_mmcode_post_layout', true) ?: 'default';
  wp_nonce_field('mmcode_layout_nonce', 'mmcode_layout_nonce_field');
  ?>
  <p>
    <label>
      <input type="radio" name="mmcode_post_layout" value="default" <?php checked($value, 'default'); ?>>
      Default (with sidebar)
    </label>
  </p>
  <p>
    <label>
      <input type="radio" name="mmcode_post_layout" value="full" <?php checked($value, 'full'); ?>>
      Full width
    </label>
  </p>
  <?php
}

/* Save value */
add_action('save_post', function ($post_id) {
  if (
    !isset($_POST['mmcode_layout_nonce_field']) ||
    !wp_verify_nonce($_POST['mmcode_layout_nonce_field'], 'mmcode_layout_nonce')
  ) return;

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

  if (isset($_POST['mmcode_post_layout'])) {
    update_post_meta(
      $post_id,
      '_mmcode_post_layout',
      sanitize_text_field($_POST['mmcode_post_layout'])
    );
  }
});
