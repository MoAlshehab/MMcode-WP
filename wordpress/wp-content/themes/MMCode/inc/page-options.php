<hr style="margin:12px 0">

<p><strong><?php esc_html_e('Hero content', 'mmcode'); ?></strong></p>

<p>
  <label><?php esc_html_e('Hero title', 'mmcode'); ?></label>
  <input type="text"
         name="mmcode_hero_title"
         value="<?php echo esc_attr(get_post_meta($post->ID, '_mmcode_hero_title', true)); ?>"
         style="width:100%">
</p>

<p>
  <label><?php esc_html_e('Hero text', 'mmcode'); ?></label>
  <textarea name="mmcode_hero_text"
            rows="3"
            style="width:100%"><?php
    echo esc_textarea(get_post_meta($post->ID, '_mmcode_hero_text', true));
  ?></textarea>
</p>

<p>
  <label><?php esc_html_e('Button text', 'mmcode'); ?></label>
  <input type="text"
         name="mmcode_hero_btn_text"
         value="<?php echo esc_attr(get_post_meta($post->ID, '_mmcode_hero_btn_text', true)); ?>"
         style="width:100%">
</p>

<p>
  <label><?php esc_html_e('Button URL', 'mmcode'); ?></label>
  <input type="url"
         name="mmcode_hero_btn_url"
         value="<?php echo esc_url(get_post_meta($post->ID, '_mmcode_hero_btn_url', true)); ?>"
         style="width:100%">
</p>

<p>
  <label><?php esc_html_e('Hero image URL', 'mmcode'); ?></label>
  <input type="text"
         name="mmcode_hero_image"
         value="<?php echo esc_url(get_post_meta($post->ID, '_mmcode_hero_image', true)); ?>"
         style="width:100%">
</p>
