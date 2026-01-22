<?php
/**
 * Theme instellingen pagina
 * - Bedrijfsgegevens
 * - CTA
 * - Theme kleuren (via WordPress color picker)
 *
 * Database:
 * wp_options → mm_theme_options (array)
 */

if (!is_admin()) {
    return;
}

/**
 * ==================================================
 * 1. COLOR PICKER CORRECT LADEN (BELANGRIJK)
 * ==================================================
 *
 * Wat ik hier doe:
 * - Ik laad ALTIJD de WordPress color picker
 * - Alleen op admin-pagina’s
 * - Zonder afhankelijk te zijn van $hook (die faalt vaak)
 */
add_action('admin_enqueue_scripts', function () {

    if (!isset($_GET['page']) || $_GET['page'] !== 'mm-theme-settings') {
        return;
    }

    // WordPress color picker CSS + JS
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');

    // Inline JS om de picker te activeren
    wp_add_inline_script(
        'wp-color-picker',
        'jQuery(document).ready(function($){
            $(".mm-color-field").wpColorPicker();
        });'
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

    add_settings_field(
        'company_name',
        __('Bedrijfsnaam', 'mmcode'),
        'mm_company_name_field',
        'mm_theme_settings',
        'mm_company_section'
    );

    add_settings_field(
        'company_email',
        __('E-mailadres', 'mmcode'),
        'mm_company_email_field',
        'mm_theme_settings',
        'mm_company_section'
    );

    add_settings_field(
        'company_phone',
        __('Telefoonnummer', 'mmcode'),
        'mm_company_phone_field',
        'mm_theme_settings',
        'mm_company_section'
    );

    add_settings_field(
        'company_kvk',
        __('KVK-nummer', 'mmcode'),
        'mm_company_kvk_field',
        'mm_theme_settings',
        'mm_company_section'
    );

    /**
     * -------- CTA --------
     */
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

    /**
     * -------- KLEUREN --------
     */
    add_settings_section(
        'mm_color_section',
        __('Theme kleuren', 'mmcode'),
        '__return_false',
        'mm_theme_settings'
    );

    add_settings_field(
        'primary_color',
        __('Primaire kleur', 'mmcode'),
        'mm_primary_color_field',
        'mm_theme_settings',
        'mm_color_section'
    );

    add_settings_field(
        'secondary_color',
        __('Secundaire kleur', 'mmcode'),
        'mm_secondary_color_field',
        'mm_theme_settings',
        'mm_color_section'
    );
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
    ?>
    <input type="text"
           class="regular-text"
           name="mm_theme_options[company_name]"
           value="<?php echo esc_attr(mm_get_option('company_name')); ?>">
    <?php
}

function mm_company_email_field() {
    ?>
    <input type="email"
           class="regular-text"
           name="mm_theme_options[company_email]"
           value="<?php echo esc_attr(mm_get_option('company_email')); ?>">
    <?php
}

function mm_company_phone_field() {
    ?>
    <input type="text"
           class="regular-text"
           name="mm_theme_options[company_phone]"
           value="<?php echo esc_attr(mm_get_option('company_phone')); ?>">
    <?php
}

function mm_company_kvk_field() {
    ?>
    <input type="text"
           class="regular-text"
           name="mm_theme_options[company_kvk]"
           value="<?php echo esc_attr(mm_get_option('company_kvk')); ?>">
    <?php
}

function mm_cta_text_field() {
    ?>
    <input type="text"
           class="regular-text"
           name="mm_theme_options[default_cta_text]"
           value="<?php echo esc_attr(mm_get_option('default_cta_text')); ?>">
    <?php
}

/**
 * -------- KLEURVELDEN (HIER GEBEURT HET) --------
 */

function mm_primary_color_field() {
    ?>
    <input type="text"
           class="mm-color-field"
           name="mm_theme_options[primary_color]"
           value="<?php echo esc_attr(mm_get_option('primary_color', '#0f172a')); ?>"
           data-default-color="#0f172a">
    <p class="description">
        Hoofdkleur van de website (knoppen, links, highlights).
    </p>
    <?php
}

function mm_secondary_color_field() {
    ?>
    <input type="text"
           class="mm-color-field"
           name="mm_theme_options[secondary_color]"
           value="<?php echo esc_attr(mm_get_option('secondary_color', '#2563eb')); ?>"
           data-default-color="#2563eb">
    <p class="description">
        Accentkleur (CTA’s, hover, badges).
    </p>
    <?php
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

        <p>
            Beheer hier de standaard bedrijfsgegevens en kies de kleuren van je website.
        </p>

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
