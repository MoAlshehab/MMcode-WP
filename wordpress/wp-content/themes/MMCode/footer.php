<?php
/**
 * Footer template
 * Gebruikt Theme Settings:
 * - Bedrijfsnaam
 * - E-mail
 * - Telefoonnummer
 * - KVK
 */

// Theme options ophalen (1 keer!)
$options = get_option('mm_theme_options');

// Fallbacks (altijd veilig)
$company_name = $options['company_name'] ?? get_bloginfo('name');
$email        = $options['company_email'] ?? '';
$phone        = $options['company_phone'] ?? '';
$kvk          = $options['company_kvk'] ?? '';
?>

<footer
    class="bg-white text-black border-t border-gray-200
           dark:bg-bg dark:text-textBase dark:border-borderBase"
>

    <div class="max-w-7xl mx-auto px-6 py-12 text-center">

        <!-- Footer navigatie -->
        <nav class="footer-nav mb-8">
            <?php mmcode_tailwind_footer_menu(); ?>
        </nav>

        <!-- Bedrijfsgegevens -->
        <div class="text-sm text-textMuted space-y-2">

            <?php if ($email) : ?>
                <p>
                    <a href="mailto:<?php echo esc_attr($email); ?>"
                       class="hover:underline">
                        <?php echo esc_html($email); ?>
                    </a>
                </p>
            <?php endif; ?>

            <?php if ($phone) : ?>
                <p>
                    <a href="tel:<?php echo esc_attr($phone); ?>"
                       class="hover:underline">
                        <?php echo esc_html($phone); ?>
                    </a>
                </p>
            <?php endif; ?>

            <?php if ($kvk) : ?>
                <p>
                    <?php _e('KVK:', 'mmcode'); ?>
                    <?php echo esc_html($kvk); ?>
                </p>
            <?php endif; ?>

        </div>

        <!-- Copyright -->
        <p class="mt-10 text-sm text-textMuted font-bodyFont">
            © <?php echo date('Y'); ?>
            <?php echo esc_html($company_name); ?>.
            <?php _e('All rights reserved.', 'mmcode'); ?>
        </p>

    </div>

</footer>

<?php wp_footer(); ?>

<!-- Back to top button -->
<button
    id="backToTop"
    class="back-to-top"
    aria-label="<?php esc_attr_e('Back to top', 'mmcode'); ?>"
>
    ↑ TOP
</button>

</body>
</html>
