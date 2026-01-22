<?php
/**
 * Theme instellingen pagina
 * - Bedrijfsgegevens
 * - CTA
 * - Theme kleuren (via WordPress color picker)
 * - Layout (container breedte)
 * - Social media links
 *
 * Database:
 * wp_options → mm_theme_options (array)
 */

if (!is_admin()) {
    return;
}

/**
 * ==================================================
 * 1. COLOR PICKER CORRECT LADEN
 * ==================================================
 */
add_action('admin_enqueue_scripts', function () {

    if (!isset($_GET['page']) || $_GET['page'] !== 'mm-theme-settings') {
        return;
    }

    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');

    wp_add_inline_script(
        'wp-color-picker',
        'jQuery(function($){ $(".mm-color-field").wpColorPicker(); });'
    );
});

/**
 * ==================================================
 * 2. MENU IN DASHBOARD
 * ==================================================
 */
add_action('admin_menu', function () {

    add_menu_page(
        __('Theme instellingen', 'mmcode'),
        __('Theme instellingen', 'mmcode'),
        'manage_options',
        'mm-theme-settings',
        'mm_theme_settings_page',
        'dashicons-admin-customizer',
        61
    );
});

/**
 * ==================================================
 * 3. SETTINGS REGISTREREN
 * ==================================================
 */
add_action('admin_init', function () {

    register_setting(
        'mm_theme_settings',
        'mm_theme_options'
    );

    /**
     * -------- Bedrijfsgegevens --------
     */
    add_settings_section(
        'mm_company_section',
        __('Bedrijfsgegevens', 'mmcode'),
        '__return_false',
        'mm_theme_settings'
    );

    add_settings_field('company_name', __('Bedrijfsnaam', 'mmcode'), 'mm_company_name_field', 'mm_theme_settings', 'mm_company_section');
    add_settings_field('company_email', __('E-mailadres', 'mmcode'), 'mm_company_email_field', 'mm_theme_settings', 'mm_company_section');
    add_settings_field('company_phone', __('Telefoonnummer', 'mmcode'), 'mm_company_phone_field', 'mm_theme_settings', 'mm_company_section');
    add_settings_field('company_kvk', __('KVK-nummer', 'mmcode'), 'mm_company_kvk_field', 'mm_theme_settings', 'mm_company_section');

    /**
     * -------- CTA --------
     */
    add_settings_section(
        'mm_cta_section',
        __('Call To Action', 'mmcode'),
        '__return_false',
        'mm_theme_settings'
    );

    add_settings_field('default_cta_text', __('Standaard CTA tekst', 'mmcode'), 'mm_cta_text_field', 'mm_theme_settings', 'mm_cta_section');

    /**
     * -------- KLEUREN --------
     */
    add_settings_section(
        'mm_color_section',
        __('Theme kleuren', 'mmcode'),
        '__return_false',
        'mm_theme_settings'
    );

    add_settings_field('primary_color', __('Primaire kleur', 'mmcode'), 'mm_primary_color_field', 'mm_theme_settings', 'mm_color_section');
    add_settings_field('secondary_color', __('Secundaire kleur', 'mmcode'), 'mm_secondary_color_field', 'mm_theme_settings', 'mm_color_section');

    /**
     * ==================================================
     * LAYOUT (CONTAINER BREEDTE)  ✅ NIEUW
     * ==================================================
     */
    add_settings_section(
        'mm_layout_section',
        __('Layout', 'mmcode'),
        '__return_false',
        'mm_theme_settings'
    );

    add_settings_field(
        'container_width',
        __('Container breedte', 'mmcode'),
        'mm_container_width_field',
        'mm_theme_settings',
        'mm_layout_section'
    );

    /**
     * ==================================================
     * SOCIAL MEDIA  ✅ NIEUW
     * ==================================================
     */
    add_settings_section(
        'mm_social_section',
        __('Social media', 'mmcode'),
        '__return_false',
        'mm_theme_settings'
    );

    add_settings_field('social_instagram', __('Instagram URL', 'mmcode'), 'mm_social_instagram_field', 'mm_theme_settings', 'mm_social_section');
    add_settings_field('social_linkedin', __('LinkedIn URL', 'mmcode'), 'mm_social_linkedin_field', 'mm_theme_settings', 'mm_social_section');
    add_settings_field('social_facebook', __('Facebook URL', 'mmcode'), 'mm_social_facebook_field', 'mm_theme_settings', 'mm_social_section');
});

/**
 * ==================================================
 * 4. HELPER
 * ==================================================
 */
function mm_get_option($key, $default = '') {
    $options = get_option('mm_theme_options');
    return $options[$key] ?? $default;
}

/**
 * ==================================================
 * 5. FIELDS
 * ==================================================
 */

function mm_company_name_field() {
    echo '<input class="regular-text" name="mm_theme_options[company_name]" value="' . esc_attr(mm_get_option('company_name')) . '">';
}

function mm_company_email_field() {
    echo '<input class="regular-text" name="mm_theme_options[company_email]" value="' . esc_attr(mm_get_option('company_email')) . '">';
}

function mm_company_phone_field() {
    echo '<input class="regular-text" name="mm_theme_options[company_phone]" value="' . esc_attr(mm_get_option('company_phone')) . '">';
}

function mm_company_kvk_field() {
    echo '<input class="regular-text" name="mm_theme_options[company_kvk]" value="' . esc_attr(mm_get_option('company_kvk')) . '">';
}

function mm_cta_text_field() {
    echo '<input class="regular-text" name="mm_theme_options[default_cta_text]" value="' . esc_attr(mm_get_option('default_cta_text')) . '">';
}

/**
 * -------- KLEURVELDEN --------
 */
function mm_primary_color_field() {
    echo '<input class="mm-color-field" name="mm_theme_options[primary_color]" value="' . esc_attr(mm_get_option('primary_color', '#0f172a')) . '" data-default-color="#0f172a">';
}

function mm_secondary_color_field() {
    echo '<input class="mm-color-field" name="mm_theme_options[secondary_color]" value="' . esc_attr(mm_get_option('secondary_color', '#2563eb')) . '" data-default-color="#2563eb">';
}

/**
 * -------- CONTAINER BREEDTE --------
 */
function mm_container_width_field() {

    $current = mm_get_option('container_width', 'md');

    $options = [
        'sm' => 'Sm – 1100px',
        'md' => 'Md – 1280px (standaard)',
        'lg' => 'Lg – 1440px',
    ];

    echo '<select name="mm_theme_options[container_width]">';

    foreach ($options as $key => $label) {
        echo '<option value="' . esc_attr($key) . '" ' . selected($current, $key, false) . '>';
        echo esc_html($label);
        echo '</option>';
    }

    echo '</select>';
}

/**
 * -------- SOCIAL MEDIA --------
 */
function mm_social_instagram_field() {
    echo '<input class="regular-text" name="mm_theme_options[social_instagram]" value="' . esc_attr(mm_get_option('social_instagram')) . '" placeholder="https://instagram.com/bedrijf">';
}

function mm_social_linkedin_field() {
    echo '<input class="regular-text" name="mm_theme_options[social_linkedin]" value="' . esc_attr(mm_get_option('social_linkedin')) . '" placeholder="https://linkedin.com/company/bedrijf">';
}

function mm_social_facebook_field() {
    echo '<input class="regular-text" name="mm_theme_options[social_facebook]" value="' . esc_attr(mm_get_option('social_facebook')) . '" placeholder="https://facebook.com/bedrijf">';
}

/**
 * ==================================================
 * 6. PAGINA OUTPUT
 * ==================================================
 */
function mm_theme_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php _e('Theme instellingen', 'mmcode'); ?></h1>

        <?php settings_errors(); ?>

        <form method="post" action="options.php">
            <?php
            settings_fields('mm_theme_settings');
            do_settings_sections('mm_theme_settings');
            submit_button(__('Instellingen opslaan', 'mmcode'));
            ?>
        </form>
    </div>
    <?php
}
