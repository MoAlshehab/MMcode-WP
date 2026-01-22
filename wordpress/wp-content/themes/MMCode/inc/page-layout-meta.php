<?php
/**
 * Page layout meta
 * - Container breedte per pagina
 */

add_action('add_meta_boxes', function () {

    add_meta_box(
        'mm_page_layout',
        __('Pagina layout', 'mmcode'),
        'mm_page_layout_callback',
        'page',
        'side'
    );
});

/**
 * Meta box inhoud
 */
function mm_page_layout_callback($post) {

    $value = get_post_meta($post->ID, '_mm_container_width', true);

    wp_nonce_field('mm_page_layout_nonce', 'mm_page_layout_nonce');
    ?>

    <p>
        <label for="mm_container_width">
            <?php _e('Container breedte', 'mmcode'); ?>
        </label>
    </p>

    <select name="mm_container_width" id="mm_container_width" style="width:100%">
        <option value="">
            <?php _e('Gebruik theme instelling', 'mmcode'); ?>
        </option>
        <option value="sm" <?php selected($value, 'sm'); ?>>Sm (1100px)</option>
        <option value="md" <?php selected($value, 'md'); ?>>Md (1280px)</option>
        <option value="lg" <?php selected($value, 'lg'); ?>>Lg (1440px)</option>
    </select>

    <p class="description">
        Laat leeg om de globale instelling te gebruiken.
    </p>

    <?php
}

/**
 * Opslaan
 */
add_action('save_post', function ($post_id) {

    if (!isset($_POST['mm_page_layout_nonce'])) return;
    if (!wp_verify_nonce($_POST['mm_page_layout_nonce'], 'mm_page_layout_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (isset($_POST['mm_container_width']) && $_POST['mm_container_width'] !== '') {
        update_post_meta($post_id, '_mm_container_width', sanitize_text_field($_POST['mm_container_width']));
    } else {
        delete_post_meta($post_id, '_mm_container_width');
    }
});
