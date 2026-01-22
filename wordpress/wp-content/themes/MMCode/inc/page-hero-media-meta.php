<?php
/**
 * Page Hero Media (ADMIN)
 * - Hero AAN / UIT
 * - Hero type: image / video
 * - Hero titel + subtitel
 * - Hero CTA knop (per pagina)
 *
 * Wordt gebruikt in Page editor
 */

if (!is_admin()) {
    return;
}

/**
 * ==================================================
 * 1. MEDIA SCRIPTS LADEN (ALLEEN PAGE EDIT)
 * ==================================================
 */
add_action('admin_enqueue_scripts', function ($hook) {

    if ($hook !== 'post.php' && $hook !== 'post-new.php') {
        return;
    }

    $screen = get_current_screen();
    if (!$screen || $screen->post_type !== 'page') {
        return;
    }

    wp_enqueue_media();
});

/**
 * ==================================================
 * 2. META BOX TOEVOEGEN
 * ==================================================
 */
add_action('add_meta_boxes', function () {

    add_meta_box(
        'mm_page_hero_media',
        __('Hero instellingen', 'mmcode'),
        'mm_page_hero_media_callback',
        'page',
        'normal',
        'high'
    );
});

/**
 * ==================================================
 * 3. META BOX INHOUD
 * ==================================================
 */
function mm_page_hero_media_callback($post) {

    // Hero basis
    $enabled = get_post_meta($post->ID, '_mm_hero_enabled', true);
    $type    = get_post_meta($post->ID, '_mm_hero_type', true);
    $image   = get_post_meta($post->ID, '_mm_hero_image', true);
    $video   = get_post_meta($post->ID, '_mm_hero_video', true);

    // Hero tekst
    $title = get_post_meta($post->ID, '_mm_hero_title', true);
    $text  = get_post_meta($post->ID, '_mm_hero_text', true);

    // Hero CTA
    $cta_enabled = get_post_meta($post->ID, '_mm_hero_cta_enabled', true);
    $cta_text    = get_post_meta($post->ID, '_mm_hero_cta_text', true);
    $cta_url     = get_post_meta($post->ID, '_mm_hero_cta_url', true);

    wp_nonce_field('mm_hero_media_nonce', 'mm_hero_media_nonce');
    ?>

    <!-- ================= HERO AAN / UIT ================= -->
    <p>
        <label>
            <input type="checkbox" name="mm_hero_enabled" value="1"
                <?php checked($enabled, '1'); ?>>
            <strong><?php _e('Hero tonen op deze pagina', 'mmcode'); ?></strong>
        </label>
    </p>

    <hr>

    <!-- ================= HERO TYPE ================= -->
    <p><strong><?php _e('Hero type', 'mmcode'); ?></strong></p>

    <label>
        <input type="radio" name="mm_hero_type" value="image" <?php checked($type, 'image'); ?>>
        <?php _e('Afbeelding', 'mmcode'); ?>
    </label><br>

    <label>
        <input type="radio" name="mm_hero_type" value="video" <?php checked($type, 'video'); ?>>
        <?php _e('Video', 'mmcode'); ?>
    </label>

    <hr>

    <!-- ================= HERO TEKST ================= -->
    <p><strong><?php _e('Hero tekst', 'mmcode'); ?></strong></p>

    <p>
        <label>
            <?php _e('Hero titel', 'mmcode'); ?><br>
            <input type="text"
                   name="mm_hero_title"
                   class="widefat"
                   value="<?php echo esc_attr($title); ?>"
                   placeholder="Bijv. Welkom bij MMCode">
        </label>
    </p>

    <p>
        <label>
            <?php _e('Hero subtitel', 'mmcode'); ?><br>
            <textarea name="mm_hero_text"
                      class="widefat"
                      rows="3"
                      placeholder="Korte beschrijving onder de titel"><?php
                echo esc_textarea($text);
            ?></textarea>
        </label>
    </p>

    <hr>

    <!-- ================= HERO CTA ================= -->
    <p><strong><?php _e('Hero CTA knop', 'mmcode'); ?></strong></p>

    <p>
        <label>
            <input type="checkbox" name="mm_hero_cta_enabled" value="1"
                <?php checked($cta_enabled, '1'); ?>>
            <?php _e('CTA knop tonen', 'mmcode'); ?>
        </label>
    </p>

    <p>
        <label>
            <?php _e('CTA tekst', 'mmcode'); ?><br>
            <input type="text"
                   name="mm_hero_cta_text"
                   class="widefat"
                   value="<?php echo esc_attr($cta_text); ?>"
                   placeholder="Bijv. Neem contact op">
        </label>
    </p>

    <p>
        <label>
            <?php _e('CTA link (URL)', 'mmcode'); ?><br>
            <input type="text"
                   name="mm_hero_cta_url"
                   class="widefat"
                   value="<?php echo esc_attr($cta_url); ?>"
                   placeholder="/contact of https://...">
        </label>
    </p>

    <hr>

    <!-- ================= HERO IMAGE ================= -->
    <p><strong><?php _e('Hero afbeelding', 'mmcode'); ?></strong></p>

    <input type="hidden" name="mm_hero_image" id="mm_hero_image" value="<?php echo esc_attr($image); ?>">

    <button type="button" class="button mm-hero-image-upload">
        <?php _e('Kies afbeelding', 'mmcode'); ?>
    </button>

    <?php if ($image) : ?>
        <div style="margin-top:10px;">
            <img src="<?php echo esc_url($image); ?>" style="max-width:100%;">
        </div>
    <?php endif; ?>

    <hr>

    <!-- ================= HERO VIDEO ================= -->
    <p><strong><?php _e('Hero video', 'mmcode'); ?></strong></p>

    <input type="hidden" name="mm_hero_video" id="mm_hero_video" value="<?php echo esc_attr($video); ?>">

    <button type="button" class="button mm-hero-video-upload">
        <?php _e('Kies video', 'mmcode'); ?>
    </button>

    <?php if ($video) : ?>
        <p style="margin-top:10px;"><?php echo esc_html($video); ?></p>
    <?php endif; ?>

    <script>
    jQuery(function($){

        function mediaPicker(button, input, type) {
            $(button).on('click', function(e){
                e.preventDefault();

                const frame = wp.media({
                    title: 'Selecteer ' + type,
                    library: { type: type },
                    button: { text: 'Gebruik deze' },
                    multiple: false
                });

                frame.on('select', function(){
                    const file = frame.state().get('selection').first().toJSON();
                    $(input).val(file.url);
                });

                frame.open();
            });
        }

        mediaPicker('.mm-hero-image-upload', '#mm_hero_image', 'image');
        mediaPicker('.mm-hero-video-upload', '#mm_hero_video', 'video');

    });
    </script>

    <?php
}

/**
 * ==================================================
 * 4. OPSLAAN
 * ==================================================
 */
add_action('save_post', function ($post_id) {

    if (!isset($_POST['mm_hero_media_nonce'])) return;
    if (!wp_verify_nonce($_POST['mm_hero_media_nonce'], 'mm_hero_media_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    update_post_meta($post_id, '_mm_hero_enabled', isset($_POST['mm_hero_enabled']) ? '1' : '0');
    update_post_meta($post_id, '_mm_hero_type', sanitize_text_field($_POST['mm_hero_type'] ?? ''));
    update_post_meta($post_id, '_mm_hero_image', esc_url_raw($_POST['mm_hero_image'] ?? ''));
    update_post_meta($post_id, '_mm_hero_video', esc_url_raw($_POST['mm_hero_video'] ?? ''));

    update_post_meta($post_id, '_mm_hero_title', sanitize_text_field($_POST['mm_hero_title'] ?? ''));
    update_post_meta($post_id, '_mm_hero_text', sanitize_textarea_field($_POST['mm_hero_text'] ?? ''));

    update_post_meta($post_id, '_mm_hero_cta_enabled', isset($_POST['mm_hero_cta_enabled']) ? '1' : '0');
    update_post_meta($post_id, '_mm_hero_cta_text', sanitize_text_field($_POST['mm_hero_cta_text'] ?? ''));
    update_post_meta($post_id, '_mm_hero_cta_url', esc_url_raw($_POST['mm_hero_cta_url'] ?? ''));
});
