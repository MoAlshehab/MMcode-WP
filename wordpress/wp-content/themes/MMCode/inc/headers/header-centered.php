<?php
/**
 * Header: Centered
 * - Logo gecentreerd
 * - Menu eronder
 * - Modern / SaaS look
 */
?>

<header
    class="site-header border-b bg-white
           dark:bg-bg dark:border-borderBase"
    style="border-color: var(--mm-color-primary);"
>
    <div class="max-w-7xl mx-auto px-6 py-6 text-center">

        <!-- LOGO -->
        <a
            href="<?php echo esc_url(home_url('/')); ?>"
            class="inline-block text-2xl font-extrabold mb-4"
            style="color: var(--mm-color-primary);"
        >
            <?php has_custom_logo() ? the_custom_logo() : bloginfo('name'); ?>
        </a>

        <!-- MENU -->
        <nav class="nav-main flex justify-center gap-10">
            <?php mmcode_tailwind_menu(); ?>
        </nav>

    </div>
</header>
