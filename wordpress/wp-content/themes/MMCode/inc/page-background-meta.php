<?php
/**
 * Page background color meta
 * - Admin kan per pagina achtergrondkleur kiezen
 * - Met WordPress color picker + palettes
 */

/**
 * ==================================================
 * 1. COLOR PICKER LADEN OP PAGE EDIT
 * ==================================================
 */
add_action('admin_enqueue_scripts', function ($hook) {

    // Alleen op pagina bewerken / toevoegen
    if ($hook !== 'post.php' && $hook !== 'post-new.php') {
        return;
    }

    // Alleen voor pages
    $screen = get_current_screen();
    if (!$screen || $screen->post_type !== 'page') {
        return;
    }

    // WordPress color picker laden
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');

    // Color picker activeren + palettes
    wp_add_inline_script(
        'wp-color-picker',
        'jQuery(function($){
            $(".mm-color-field").wpColorPicker({
                palettes: [
                    "#ffffff", // wit
                    "#f3f4f6", // licht grijs
                    "#e5e7eb", // grijs
                    "#111827", // donker
                    "#0f172a", // primary
                    "#2563eb", // blauw
                    "#22c55e", // groen
                    "#f59e0b", // oranje
                    "#ef4444"  // rood
                ]
            });
        });'
    );
});

/**
 * ==================================================
 * 2. META BOX REGISTREREN
 * ==================================================
 */
add_action('add_meta_boxes', function () {

    add_meta_box(
        'mm_page_background',
        __('Pagina achtergrond', 'mmcode'),
        'mm_page_background_callback',
        'page',
        'side'
    );
});

/**
 * ==================================================
 * 3. META BOX INHOUD
 * ==================================================
 */
function mm_page_background_callback($post) {

    $value = get_post_meta($post->ID, '_mm_page_bg', true);

    wp_nonce_field('mm_page_bg_nonce', 'mm_page_bg_nonce');
    ?>

    <label for="mm_page_bg" style="font-weight:600;">
        <?php _e('Achtergrondkleur', 'mmcode'); ?>
    </label>

    <input
        type="text"
        class="mm-color-field"
        name="mm_page_bg"
        id="mm_page_bg"
        value="<?php echo esc_attr($value); ?>"
        data-default-color=""
    >

    <p class="description">
        Kies een achtergrondkleur voor deze pagina.
        Laat leeg om de standaard achtergrond te gebruiken.
    </p>

    <?php
}

/**
 * ==================================================
 * 4. OPSLAAN
 * ==================================================
 */
add_action('save_post', function ($post_id) {

    if (!isset($_POST['mm_page_bg_nonce'])) return;
    if (!wp_verify_nonce($_POST['mm_page_bg_nonce'], 'mm_page_bg_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (!empty($_POST['mm_page_bg'])) {
        update_post_meta(
            $post_id,
            '_mm_page_bg',
            sanitize_hex_color($_POST['mm_page_bg'])
        );
    } else {
        delete_post_meta($post_id, '_mm_page_bg');
    }
});
