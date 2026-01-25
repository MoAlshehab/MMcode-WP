<?php
/**
 * Default footer layout
 * - Bedrijfsgegevens
 * - Social media
 * - Footer menu
 */

// Theme options
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
    <div class="<?php echo esc_attr(mm_container_class()); ?> mx-auto px-6 py-12 text-center">

        <!-- Footer menu -->
        <nav class="footer-nav mb-8">
            <?php mmcode_tailwind_footer_menu(); ?>
        </nav>

        <!-- Bedrijfsgegevens -->
        <div class="text-sm text-textMuted space-y-2">

            <?php if ($email) : ?>
                <p>
                    📧
                    <a href="mailto:<?php echo esc_attr($email); ?>" class="mm-footer-link">
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

        <!-- Social media -->
        <div class="mt-8 flex justify-center gap-6 text-sm">
            <?php foreach ($socials as $label => $url) : ?>
                <?php if ($url) : ?>
                    <a
                        href="<?php echo esc_url($url); ?>"
                        target="_blank"
                        rel="noopener"
                        class="mm-footer-link transition"
                    >
                        <?php echo esc_html($label); ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <!-- Copyright -->
        <p class="mt-10 text-sm text-textMuted">
            © <?php echo date('Y'); ?>
            <?php echo esc_html($company_name); ?> —
            <?php _e('All rights reserved.', 'mmcode'); ?>
        </p>

    </div>
</footer>
