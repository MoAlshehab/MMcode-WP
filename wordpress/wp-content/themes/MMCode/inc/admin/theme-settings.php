<?php
/**
 * Theme instellingen pagina
 *
 * Opslag:
 * wp_options → mm_theme_options (array)
 */

if (!is_admin()) {
    return;
}

/**
 * ==================================================
 * 1. ADMIN ASSETS (COLOR PICKER)
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
 * 2. DASHBOARD MENU
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

    /* =========================
       BEDRIJFSGEGEVENS
    ========================== */
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

    /* =========================
       CTA
    ========================== */
    add_settings_section(
        'mm_cta_section',
        __('Call To Action', 'mmcode'),
        '__return_false',
        'mm_theme_settings'
    );

    add_settings_field(
        'default_cta_text',
        __('Standaard CTA tekst', 'mmcode'),
        'mm_cta_text_field',
        'mm_theme_settings',
        'mm_cta_section'
    );

    /* =========================
       KLEUREN
    ========================== */
    add_settings_section(
        'mm_color_section',
        __('Theme kleuren', 'mmcode'),
        '__return_false',
        'mm_theme_settings'
    );

    add_settings_field('primary_color', __('Primaire kleur', 'mmcode'), 'mm_primary_color_field', 'mm_theme_settings', 'mm_color_section');
    add_settings_field('secondary_color', __('Secundaire kleur', 'mmcode'), 'mm_secondary_color_field', 'mm_theme_settings', 'mm_color_section');

    add_settings_field(
        'menu_hover_color',
        __('Menu hover kleur', 'mmcode'),
        'mm_menu_hover_color_field',
        'mm_theme_settings',
        'mm_color_section'
    );

    /* =========================
       TYPOGRAFIE
    ========================== */
    add_settings_section(
        'mm_typography_section',
        __('Typografie', 'mmcode'),
        '__return_false',
        'mm_theme_settings'
    );

    add_settings_field(
        'header_menu_font',
        __('Header menu font', 'mmcode'),
        'mm_header_menu_font_field',
        'mm_theme_settings',
        'mm_typography_section'
    );
        /**
         * ==================================================
         * 7. BESCHIKBARE  standerd Headers 
         * ==================================================
         */

            add_settings_section(
            'mm_header_section',
            __('Header instellingen', 'mmcode'),
            '__return_false',
            'mm_theme_settings'
        );

        add_settings_field(
            'site_header',
            __('Header layout', 'mmcode'),
            'mm_header_select_field',
            'mm_theme_settings',
            'mm_header_section'
        );



/**
 * ==================================================
 * 7. BESCHIKBARE  standerd footers 
 * ==================================================
 */
    add_settings_section(
    'mm_footer_section',
    __('Footer instellingen', 'mmcode'),
    '__return_false',
    'mm_theme_settings'
);

add_settings_field(
    'site_footer',
    __('Footer layout', 'mmcode'),
    'mm_footer_select_field',
    'mm_theme_settings',
    'mm_footer_section'
);

    /* =========================
       LAYOUT
    ========================== */
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

    /* =========================
       SOCIAL MEDIA
    ========================== */
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
 * 5. VELDEN
 * ==================================================
 */

/* --- Bedrijf --- */
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

/* --- CTA --- */
function mm_cta_text_field() {
    echo '<input class="regular-text" name="mm_theme_options[default_cta_text]" value="' . esc_attr(mm_get_option('default_cta_text')) . '">';
}

/* --- Kleuren --- */
function mm_primary_color_field() {
    echo '<input class="mm-color-field" name="mm_theme_options[primary_color]" value="' . esc_attr(mm_get_option('primary_color', '#0f172a')) . '" data-default-color="#0f172a">';
}
function mm_secondary_color_field() {
    echo '<input class="mm-color-field" name="mm_theme_options[secondary_color]" value="' . esc_attr(mm_get_option('secondary_color', '#2563eb')) . '" data-default-color="#2563eb">';
}
function mm_menu_hover_color_field() {
    echo '<input class="mm-color-field" name="mm_theme_options[menu_hover_color]" value="' . esc_attr(mm_get_option('menu_hover_color', '#2563eb')) . '" data-default-color="#2563eb">';
}

/* --- Typography --- */
function mm_header_menu_font_field() {

    $fonts   = mm_available_fonts();
    $current = mm_get_option('header_menu_font', 'inter');

    echo '<select name="mm_theme_options[header_menu_font]">';
    foreach ($fonts as $key => $label) {
        echo '<option value="' . esc_attr($key) . '" ' . selected($current, $key, false) . '>';
        echo esc_html($label);
        echo '</option>';
    }
    echo '</select>';

    echo '<p class="description">';
    esc_html_e('Dit font wordt alleen toegepast op het menu in de header.', 'mmcode');
    echo '</p>';
}

/* --- Layout --- */
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

/* --- Social --- */
function mm_social_instagram_field() {
    echo '<input class="regular-text" name="mm_theme_options[social_instagram]" value="' . esc_attr(mm_get_option('social_instagram')) . '">';
}
function mm_social_linkedin_field() {
    echo '<input class="regular-text" name="mm_theme_options[social_linkedin]" value="' . esc_attr(mm_get_option('social_linkedin')) . '">';
}
function mm_social_facebook_field() {
    echo '<input class="regular-text" name="mm_theme_options[social_facebook]" value="' . esc_attr(mm_get_option('social_facebook')) . '">';
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

/**
 * ==================================================
 * 7. BESCHIKBARE FONTS
 * ==================================================
 */
function mm_available_fonts() {
    return [
        'inter'      => 'Inter (default)',
        'poppins'    => 'Poppins',
        'roboto'     => 'Roboto',
        'montserrat' => 'Montserrat',
        'bebas'      => 'Bebas Neue',
        'ibm'        => 'IBM Plex Sans',
    ];
}


/**
 * ==================================================
 * 7. BESCHIKBARE  standerd footers 
 * ==================================================
 */

function mm_footer_select_field() {

    $current = mm_get_option('site_footer', 'default');

    $options = [
        'default' => __('Standaard footer', 'mmcode'),
        'minimal' => __('Minimal footer', 'mmcode'),
        'dark'    => __('Dark footer', 'mmcode'),
    ];

    echo '<select name="mm_theme_options[site_footer]">';

    foreach ($options as $key => $label) {
        echo '<option value="' . esc_attr($key) . '" ' . selected($current, $key, false) . '>';
        echo esc_html($label);
        echo '</option>';
    }

    echo '</select>';

    echo '<p class="description">';
    esc_html_e('Kies welke footer standaard wordt gebruikt op de website.', 'mmcode');
    echo '</p>';
}

/**
 * ==================================================
 * 7. BESCHIKBARE  standerd Headers 
 * ==================================================
 */
function mm_header_select_field() {

    $current = mm_get_option('site_header', 'default');

    $options = [
        'default'  => __('Standaard header', 'mmcode'),
        'centered' => __('Centered header', 'mmcode'),
        'minimal'  => __('Minimal header', 'mmcode'),
    ];

    echo '<select name="mm_theme_options[site_header]">';

    foreach ($options as $key => $label) {
        echo '<option value="' . esc_attr($key) . '" ' . selected($current, $key, false) . '>';
        echo esc_html($label);
        echo '</option>';
    }

    echo '</select>';

    echo '<p class="description">';
    esc_html_e('Kies welke header standaard wordt gebruikt op de website.', 'mmcode');
    echo '</p>';
}
