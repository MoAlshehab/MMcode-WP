<?php
/**
 * Footer template
 * Toont:
 * - Container breedte (uit Theme Settings)
 * - Bedrijfsgegevens
 * - Social media links
 *
 * Dit is bewust uitgebreid zodat je het verschil ziet
 */

// Theme options (1x ophalen)
$options = get_option('mm_theme_options');

// Bedrijfsgegevens
$company_name = $options['company_name'] ?? get_bloginfo('name');
$email        = $options['company_email'] ?? '';
$phone        = $options['company_phone'] ?? '';
$kvk          = $options['company_kvk'] ?? '';

// Social media
$socials = [
    'Instagram' => $options['social_instagram'] ?? '',
    'LinkedIn'  => $options['social_linkedin'] ?? '',
    'Facebook'  => $options['social_facebook'] ?? '',
];
?>

<footer
    class="mm-footer bg-white text-black border-t border-gray-200
           dark:bg-bg dark:text-textBase dark:border-borderBase" 
>

    <!--
      Container breedte komt UIT THEME SETTINGS
      Verander dit in dashboard → Theme instellingen → Layout
    -->
    <div class="<?php echo esc_attr(mm_container_class()); ?> mx-auto px-6 py-12 text-center">

        <!-- ===== DEBUG / VISUEEL ===== -->
        <p class="text-xs text-gray-400 mb-6">
            Container class:
            <strong><?php echo esc_html(mm_container_class()); ?></strong>
        </p>

        <!-- ===== FOOTER MENU ===== -->
        <nav class="footer-nav mb-8">
            <?php mmcode_tailwind_footer_menu(); ?>
        </nav>

        <!-- ===== BEDRIJFSGEGEVENS ===== -->
        <div class="text-sm text-textMuted space-y-2">

            <?php if ($email) : ?>
                <p>
                    📧
                    <a href="mailto:<?php echo esc_attr($email); ?>" class="hover:underline">
                        <?php echo esc_html($email); ?>
                    </a>
                </p>
            <?php endif; ?>

            <?php if ($phone) : ?>
                <p>
                    📞
                    <a href="tel:<?php echo esc_attr($phone); ?>" class="hover:underline">
                        <?php echo esc_html($phone); ?>
                    </a>
                </p>
            <?php endif; ?>

            <?php if ($kvk) : ?>
                <p>
                    🏢 <?php _e('KVK:', 'mmcode'); ?>
                    <?php echo esc_html($kvk); ?>
                </p>
            <?php endif; ?>

        </div>

        <!-- ===== SOCIAL MEDIA ===== -->
        <div class="mt-8 flex justify-center gap-6 text-sm">

            <?php foreach ($socials as $label => $url) : ?>
                <?php if ($url) : ?>
                    <a
                        href="<?php echo esc_url($url); ?>"
                        target="_blank"
                        rel="noopener"
                        class="hover:text-primary transition"
                    >
                        <?php echo esc_html($label); ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>

        </div>

        <!-- ===== COPYRIGHT ===== -->
        <p class="mt-10 text-sm text-textMuted">
            © <?php echo date('Y'); ?>
            <?php echo esc_html($company_name); ?> —
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
