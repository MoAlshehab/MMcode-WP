<?php
/**
 * Page template
 *
 * Toont:
 * - Header
 * - Optionele hero (per pagina aan/uit)
 * - Pagina content
 * - Widgets (per pagina aan/uit)
 * - Footer
 *
 * Klassieke PHP theme structuur
 */

get_header();

/**
 * ======================================
 * PAGE BACKGROUND KLEUR (PER PAGINA)
 * ======================================
 */
$page_bg = get_post_meta(get_the_ID(), '_mm_page_bg', true);
$main_style = $page_bg ? 'style="background-color:' . esc_attr($page_bg) . ';"' : '';

/**
 * ======================================
 * WIDGETS AAN / UIT (PER PAGINA)
 * ======================================
 * Default: widgets tonen
 */
$show_widgets = get_post_meta(get_the_ID(), '_mm_show_widgets', true) !== '0';
?>

<main <?php echo $main_style; ?>>

    <?php
    /**
     * ======================================
     * HERO (ADMIN AAN / UIT)
     * ======================================
     */
    $show_hero = get_post_meta(get_the_ID(), '_mm_show_hero', true);

    if ($show_hero === '1' && has_post_thumbnail()) :
    ?>
        <section class="relative h-[60vh] w-full overflow-hidden">

            <!-- Hero afbeelding -->
            <img
                src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>"
                alt="<?php echo esc_attr(get_the_title()); ?>"
                class="absolute inset-0 w-full h-full object-cover"
            >

            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/40"></div>

            <!-- Titel -->
            <div class="relative z-10 h-full flex items-center justify-center text-center px-6">
                <h1 class="text-white text-4xl md:text-6xl font-bold">
                    <?php the_title(); ?>
                </h1>
            </div>

        </section>
    <?php endif; ?>

    <?php
    /**
     * ======================================
     * PAGINA CONTENT + WIDGETS
     * ======================================
     */
    ?>
    <section class="<?php echo esc_attr(mm_container_class()); ?> mx-auto px-6 py-16">

        <div class="grid grid-cols-1 <?php echo $show_widgets ? 'md:grid-cols-3 gap-8' : ''; ?>">

            <!-- ===== CONTENT ===== -->
            <div class="<?php echo $show_widgets ? 'md:col-span-2' : 'col-span-full'; ?>">

                <?php
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
                ?>

            </div>

            <!-- ===== WIDGETS ===== -->
            <?php if ($show_widgets && is_active_sidebar('sidebar-1')) : ?>
                <aside class="md:col-span-1">
                    <?php dynamic_sidebar('sidebar-1'); ?>
                </aside>
            <?php endif; ?>

        </div>

    </section>

</main>

<?php get_footer(); ?>
