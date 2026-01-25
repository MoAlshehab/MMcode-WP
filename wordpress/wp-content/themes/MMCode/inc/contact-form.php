<?php
/**
 * MMCODE Contact Form
 * - Shortcode: [mm_contact_form]
 * - Automatisch op contact-pagina (slug: contact-us)
 * - AJAX submit (blijft op dezelfde pagina)
 * - Anti-spam: nonce + honeypot + rate limit
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * ==================================================
 * 1. SHORTCODE OUTPUT
 * ==================================================
 */
add_shortcode('mm_contact_form', function () {

    ob_start();
    ?>

    <form id="mm-contact-form"
          method="post"
          action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>"
          class="mm-form max-w-2xl space-y-5"
          novalidate>

        <input type="hidden" name="action" value="mm_contact_submit_ajax">
        <?php wp_nonce_field('mm_contact_form_nonce', 'mm_contact_nonce'); ?>

        <!-- Honeypot (anti-bot) -->
        <div style="position:absolute;left:-9999px;">
            <input type="text" name="mm_hp" tabindex="-1">
        </div>

        <div>
            <label class="block mb-1 font-medium">Naam *</label>
            <input type="text" name="mm_name" required
                   class="w-full rounded-lg border px-4 py-3">
        </div>

        <div>
            <label class="block mb-1 font-medium">E-mail *</label>
            <input type="email" name="mm_email" required
                   class="w-full rounded-lg border px-4 py-3">
        </div>

        <div>
            <label class="block mb-1 font-medium">Onderwerp *</label>
            <select name="mm_topic" required
                    class="w-full rounded-lg border px-4 py-3">
                <option value="">Kies een optie</option>
                <option value="Support">Support</option>
                <option value="Offerte">Offerte</option>
                <option value="Samenwerking">Samenwerking</option>
                <option value="Overig">Overig</option>
            </select>
        </div>

        <div>
            <label class="block mb-1 font-medium">Titel *</label>
            <input type="text" name="mm_subject" required
                   class="w-full rounded-lg border px-4 py-3">
        </div>

        <div>
            <label class="block mb-1 font-medium">Bericht *</label>
            <textarea name="mm_message" rows="5" required
                      class="w-full rounded-lg border px-4 py-3"></textarea>
        </div>

        <button type="submit"
                class="rounded-lg px-6 py-3 font-semibold text-white"
                style="background: var(--mm-color-primary);">
            Versturen
        </button>

        <!-- RESULT MELDING -->
        <div id="mm-form-result"
             class="hidden mt-4 rounded-lg border px-4 py-3 text-sm">
        </div>

    </form>

    <script>
    document.addEventListener('DOMContentLoaded', function () {

        const form   = document.getElementById('mm-contact-form');
        const result = document.getElementById('mm-form-result');

        if (!form || !result) return;

        form.addEventListener('submit', function (e) {
            e.preventDefault(); // ❌ geen page reload

            result.classList.remove('hidden');
            result.textContent = 'Bezig met verzenden...';
            result.style.borderColor = '#ccc';

            const data = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: data
            })
            .then(response => response.json())
            .then(response => {
                if (response.success) {
                    result.textContent = response.data;
                    result.style.borderColor = 'green';
                    form.reset();
                } else {
                    result.textContent = response.data;
                    result.style.borderColor = 'red';
                }
            })
            .catch(() => {
                result.textContent = 'Er ging iets mis.';
                result.style.borderColor = 'red';
            });
        });

    });
    </script>

    <?php
    return ob_get_clean();
});


/**
 * ==================================================
 * 2. AJAX FORM HANDLER
 * ==================================================
 */
add_action('wp_ajax_mm_contact_submit_ajax', 'mm_contact_form_handle_ajax');
add_action('wp_ajax_nopriv_mm_contact_submit_ajax', 'mm_contact_form_handle_ajax');

function mm_contact_form_handle_ajax() {

    // Nonce check
    if (
        !isset($_POST['mm_contact_nonce']) ||
        !wp_verify_nonce($_POST['mm_contact_nonce'], 'mm_contact_form_nonce')
    ) {
        wp_send_json_error('Beveiligingsfout.');
    }

    // Honeypot
    if (!empty($_POST['mm_hp'])) {
        wp_send_json_error('Spam gedetecteerd.');
    }

    // Rate limit (3 per 10 min per IP)
    $ip   = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    $key  = 'mm_contact_rate_' . md5($ip);
    $hits = (int) get_transient($key);

    if ($hits >= 3) {
        wp_send_json_error('Je verstuurt te snel. Probeer later opnieuw.');
    }

    set_transient($key, $hits + 1, 10 * MINUTE_IN_SECONDS);

    // Data
    $name    = sanitize_text_field($_POST['mm_name'] ?? '');
    $email   = sanitize_email($_POST['mm_email'] ?? '');
    $topic   = sanitize_text_field($_POST['mm_topic'] ?? '');
    $subject = sanitize_text_field($_POST['mm_subject'] ?? '');
    $message = wp_strip_all_tags($_POST['mm_message'] ?? '');

    if (!$name || !$email || !$topic || !$subject || !$message || !is_email($email)) {
        wp_send_json_error('Vul alle velden correct in.');
    }

    // Ontvanger
    $options = get_option('mm_theme_options');
    $to = !empty($options['company_email'])
        ? sanitize_email($options['company_email'])
        : get_option('admin_email');

    // Mail
    $site = wp_parse_url(home_url(), PHP_URL_HOST);
    $mail_subject = "[{$site}] {$subject} ({$topic})";

    $body =
        "Naam: {$name}\n" .
        "E-mail: {$email}\n" .
        "Type: {$topic}\n\n" .
        $message;

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $name . ' <' . $email . '>',
    ];

    if (wp_mail($to, $mail_subject, $body, $headers)) {
        wp_send_json_success('Bedankt! Je bericht is succesvol verzonden.');
    }

    wp_send_json_error('Verzenden mislukt.');
}


/**
 * ==================================================
 * 3. AUTOMATISCH OP CONTACT-PAGINA
 * ==================================================
 */
add_filter('the_content', function ($content) {

    if (is_admin() || !is_page()) {
        return $content;
    }

    // Pas slug aan indien nodig
    if (!is_page('contact-us')) {
        return $content;
    }

    // Als admin zelf shortcode heeft geplaatst → niets doen
    if (has_shortcode($content, 'mm_contact_form')) {
        return $content;
    }

    return $content . do_shortcode('[mm_contact_form]');
});
