<?php
/**
 * Page template
 *
 * Toont:
 * - Header
 * - Hero (image of video, per pagina AAN/UIT)
 * - Pagina content
 * - Widgets (per pagina aan/uit)
 * - Footer
 */

get_header();

/**
 * ======================================
 * PAGE BACKGROUND KLEUR (PER PAGINA)
 * ======================================
 */
$page_bg = get_post_meta(get_the_ID(), '_mm_page_bg', true);
$main_style = $page_bg
    ? 'style="background-color:' . esc_attr($page_bg) . ';"'
    : '';

/**
 * ======================================
 * WIDGETS AAN / UIT (PER PAGINA)
 * ======================================
 */
$show_widgets = get_post_meta(get_the_ID(), '_mm_show_widgets', true) !== '0';

/**
 * ======================================
 * HERO DATA (PER PAGINA)
 * ======================================
 */
$hero_enabled = get_post_meta(get_the_ID(), '_mm_hero_enabled', true);
$hero_type    = get_post_meta(get_the_ID(), '_mm_hero_type', true);
$hero_image   = get_post_meta(get_the_ID(), '_mm_hero_image', true);
$hero_video   = get_post_meta(get_the_ID(), '_mm_hero_video', true);
$hero_cta_enabled = get_post_meta(get_the_ID(), '_mm_hero_cta_enabled', true);
$hero_cta_text    = get_post_meta(get_the_ID(), '_mm_hero_cta_text', true);
$hero_cta_url     = get_post_meta(get_the_ID(), '_mm_hero_cta_url', true);

?>

<main <?php echo $main_style; ?> class="flex-1">

    <?php
    /**
     * ======================================
     * HERO (FULL WIDTH)
     * ======================================
     */
    if ($hero_enabled === '1') :
    ?>

        <?php if ($hero_type === 'image' && $hero_image) : ?>

            <!-- HERO IMAGE -->
            <section class="relative w-screen h-[75vh] overflow-hidden left-1/2 right-1/2 -ml-[50vw] -mr-[50vw]">

                <img
                    src="<?php echo esc_url($hero_image); ?>"
                    alt="<?php echo esc_attr(get_the_title()); ?>"
                    class="absolute inset-0 w-full h-full object-cover"
                >

                <div class="absolute inset-0 bg-black/40"></div>

                <div class="relative z-10 h-full flex items-center">
                    <div class="<?php echo esc_attr(mm_container_class()); ?> mx-auto px-6">
                     <div class="text-white max-w-4xl">
    <h1 class="text-4xl md:text-6xl font-bold">
        <?php the_title(); ?>
    </h1>

    <?php if ($hero_cta_enabled === '1' && $hero_cta_text && $hero_cta_url) : ?>
        <a
            href="<?php echo esc_url($hero_cta_url); ?>"
            class="inline-block mt-8 px-8 py-4 rounded-lg font-semibold
                   bg-white text-black hover:bg-gray-200 transition"
        >
            <?php echo esc_html($hero_cta_text); ?>
        </a>
    <?php endif; ?>
</div>

                    </div>
                </div>

            </section>

        <?php elseif ($hero_type === 'video' && $hero_video) : ?>

            <!-- HERO VIDEO -->
            <section class="relative w-screen h-[75vh] overflow-hidden left-1/2 right-1/2 -ml-[50vw] -mr-[50vw]">

                <video
                    autoplay
                    muted
                    loop
                    playsinline
                    class="absolute inset-0 w-full h-full object-cover"
                >
                    <source src="<?php echo esc_url($hero_video); ?>" type="video/mp4">
                </video>

                <div class="absolute inset-0 bg-black/40"></div>

                <div class="relative z-10 h-full flex items-center">
                    <div class="<?php echo esc_attr(mm_container_class()); ?> mx-auto px-6">
                        <h1 class="text-white text-4xl md:text-6xl font-bold max-w-4xl">
                            <?php the_title(); ?>
                        </h1>
                    </div>
                </div>

            </section>

        <?php endif; ?>

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

            <!-- CONTENT -->
            <div class="<?php echo $show_widgets ? 'md:col-span-2' : 'col-span-full'; ?>">

                <?php
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
                ?>

            </div>

            <!-- SIDEBAR -->
            <?php if ($show_widgets && is_active_sidebar('sidebar-1')) : ?>
                <aside class="md:col-span-1">
                    <?php dynamic_sidebar('sidebar-1'); ?>
                </aside>
            <?php endif; ?>

        </div>

    </section>

</main>

<?php get_footer(); ?>
