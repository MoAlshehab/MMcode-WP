<?php
/**
 * Page widgets toggle
 * - Admin kan per pagina widgets aan/uit zetten
 */

/**
 * ==================================================
 * META BOX TOEVOEGEN
 * ==================================================
 */
add_action('add_meta_boxes', function () {

    add_meta_box(
        'mm_page_widgets',
        __('Widgets', 'mmcode'),
        'mm_page_widgets_callback',
        'page',
        'side'
    );
});

/**
 * ==================================================
 * META BOX INHOUD
 * ==================================================
 */
function mm_page_widgets_callback($post) {

    $enabled = get_post_meta($post->ID, '_mm_show_widgets', true);

    wp_nonce_field('mm_page_widgets_nonce', 'mm_page_widgets_nonce');
    ?>

    <label>
        <input
            type="checkbox"
            name="mm_show_widgets"
            value="1"
            <?php checked($enabled, '1'); ?>
        >
        <?php _e('Widgets tonen op deze pagina', 'mmcode'); ?>
    </label>

    <p class="description">
        Vink uit om widgets op deze pagina te verbergen.
    </p>

    <?php
}

/**
 * ==================================================
 * OPSLAAN
 * ==================================================
 */
add_action('save_post', function ($post_id) {

    if (!isset($_POST['mm_page_widgets_nonce'])) return;
    if (!wp_verify_nonce($_POST['mm_page_widgets_nonce'], 'mm_page_widgets_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (isset($_POST['mm_show_widgets'])) {
        update_post_meta($post_id, '_mm_show_widgets', '1');
    } else {
        delete_post_meta($post_id, '_mm_show_widgets');
    }
});
