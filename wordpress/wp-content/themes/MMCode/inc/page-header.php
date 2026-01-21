<?php
/**
 * Page Header
 * Gebruikt:
 * - Titel van de pagina
 * - Samenvatting als intro
 * - Uitgelichte afbeelding als achtergrond (optioneel)
 */

function mm_render_page_header() {

    $post_id = get_queried_object_id();
    if (!$post_id) {
        return;
    }

    $title = get_the_title($post_id);
    $intro = get_the_excerpt($post_id);
    $image = get_the_post_thumbnail_url($post_id, 'full');
    ?>

    <section class="mm-page-header relative py-20 bg-gray-100">

        <?php if ($image) : ?>
            <!-- Achtergrondafbeelding -->
            <div class="absolute inset-0">
                <img
                    src="<?php echo esc_url($image); ?>"
                    alt="<?php echo esc_attr($title); ?>"
                    class="w-full h-full object-cover"
                >
                <div class="absolute inset-0 bg-black/40"></div>
            </div>
        <?php endif; ?>

        <!-- Header content -->
        <div class="relative z-10 max-w-7xl mx-auto px-6 text-center text-white">

            <h1 class="text-4xl md:text-5xl font-bold">
                <?php echo esc_html($title); ?>
            </h1>

            <?php if (!empty($intro)) : ?>
                <p class="mt-4 text-lg max-w-2xl mx-auto">
                    <?php echo esc_html($intro); ?>
                </p>
            <?php endif; ?>

        </div>

    </section>

    <?php
}
