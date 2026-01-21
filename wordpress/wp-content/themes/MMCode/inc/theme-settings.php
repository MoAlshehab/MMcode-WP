<?php
/**
 * Theme instellingen pagina
 * - Algemene bedrijfsgegevens
 * - Wordt opgeslagen via WordPress Settings API
 *
 * Database:
 * wp_options → mm_theme_options (array)
 */

if (!is_admin()) {
    return;
}

/**
 * 1. Menu-item toevoegen aan het dashboard
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
 * 2. Settings registreren
 */
add_action('admin_init', function () {

    // Registreer één option array
    register_setting(
        'mm_theme_settings',
        'mm_theme_options'
    );

    /**
     * ======================
     * Sectie: Bedrijfsgegevens
     * ======================
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
     * ======================
     * Sectie: CTA
     * ======================
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
});

/**
 * Helper: optie ophalen
 */
function mm_get_option($key) {
    $options = get_option('mm_theme_options');
    return $options[$key] ?? '';
}

/**
 * ======================
 * Field callbacks
 * ======================
 */

function mm_company_name_field() {
    ?>
    <input type="text"
           name="mm_theme_options[company_name]"
           value="<?php echo esc_attr(mm_get_option('company_name')); ?>"
           class="regular-text"
           placeholder="Bijv. MMCode">
    <?php
}

function mm_company_email_field() {
    ?>
    <input type="email"
           name="mm_theme_options[company_email]"
           value="<?php echo esc_attr(mm_get_option('company_email')); ?>"
           class="regular-text"
           placeholder="info@bedrijf.nl">
    <?php
}

function mm_company_phone_field() {
    ?>
    <input type="text"
           name="mm_theme_options[company_phone]"
           value="<?php echo esc_attr(mm_get_option('company_phone')); ?>"
           class="regular-text"
           placeholder="+31 6 12345678">
    <?php
}

function mm_company_kvk_field() {
    ?>
    <input type="text"
           name="mm_theme_options[company_kvk]"
           value="<?php echo esc_attr(mm_get_option('company_kvk')); ?>"
           class="regular-text"
           placeholder="12345678">
    <?php
}

function mm_cta_text_field() {
    ?>
    <input type="text"
           name="mm_theme_options[default_cta_text]"
           value="<?php echo esc_attr(mm_get_option('default_cta_text')); ?>"
           class="regular-text"
           placeholder="Neem contact met ons op">
    <?php
}

/**
 * 3. Pagina output
 * BELANGRIJK:
 * - settings_errors() zorgt dat WordPress correct redirect
 * - admin.php?page=mm-theme-settings blijft actief
 */
function mm_theme_settings_page() {
    ?>
    <div class="wrap">

        <h1><?php _e('Theme instellingen', 'mmcode'); ?></h1>

        <?php
        // Dit voorkomt redirect naar homepage
        settings_errors();
        ?>

        <p>
            Beheer hier de standaard bedrijfsgegevens.
            Deze instellingen gelden voor de hele website.
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
