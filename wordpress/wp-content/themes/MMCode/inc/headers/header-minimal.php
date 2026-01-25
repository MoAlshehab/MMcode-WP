<?php
/**
 * Header: Minimal
 * - Alleen logo
 * - Perfect voor landing pages
 */
?>

<header
    class="site-header bg-transparent py-6"
>
    <div class="max-w-7xl mx-auto px-6 flex justify-center">

        <!-- LOGO -->
        <a
            href="<?php echo esc_url(home_url('/')); ?>"
            class="text-2xl font-bold"
            style="color: var(--mm-color-primary);"
        >
            <?php has_custom_logo() ? the_custom_logo() : bloginfo('name'); ?>
        </a>

    </div>
</header>
