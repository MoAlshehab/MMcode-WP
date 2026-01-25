<?php
/**
 * MMCODE Theme bootstrap
 */

require get_template_directory() . '/inc/setup.php';
require get_template_directory() . '/inc/assets.php';
require get_template_directory() . '/inc/menus.php';
require get_template_directory() . '/inc/sidebars.php';
require get_template_directory() . '/inc/excerpts.php';
require get_template_directory() . '/inc/pagination.php';
require get_template_directory() . '/inc/breadcrumb.php';
require get_template_directory() . '/inc/seo.php';
require get_template_directory() . '/inc/reading-time.php';
require get_template_directory() . '/inc/post-views.php';
require get_template_directory() . '/inc/open-graph.php';
require get_template_directory() . '/inc/schema.php';
require get_template_directory() . '/inc/toc.php';
require get_template_directory() . '/inc/lazy-load.php';
require get_template_directory() . '/inc/post-layout.php';
require get_template_directory() . '/inc/post-options.php';
require get_template_directory() . '/inc/featured-posts.php';


require get_template_directory() . '/inc/pattern-categories.php';
require get_template_directory() . '/inc/patterns/mm-patterns/patterns.php';
require get_template_directory() . '/inc/patterns/mm-patterns/cta.php';
require get_template_directory() . '/inc/patterns/mm-patterns/hero.php';
require get_template_directory() . '/inc/patterns/mm-patterns/homepage.php';

/**
 * Page header
 */
require get_stylesheet_directory() . '/inc/page-header.php';

require get_stylesheet_directory() . '/inc/admin/theme-settings.php';
require get_stylesheet_directory() . '/inc/dashboard-widgets.php';
require get_stylesheet_directory() . '/inc/admin-cleanup.php';
require get_stylesheet_directory() . '/inc/layout.php';
require get_stylesheet_directory() . '/inc/socials.php';
require get_stylesheet_directory() . '/inc/page-background-meta.php';
require get_stylesheet_directory() . '/inc/page-widgets-meta.php';
require get_stylesheet_directory() . '/inc/widgets.php';
require get_stylesheet_directory() . '/inc/page-hero-media-meta.php';
require get_stylesheet_directory() . '/inc/contact-form.php';


add_action('wp_head', function () {

    $hover = mm_get_option('menu_hover_color', '#2563eb');

    echo '<style>
        :root {
            --mm-menu-hover-color: ' . esc_attr($hover) . ';
        }
    </style>';
});


/**
 * Laad Google Fonts voor Gutenberg + frontend
 */
function mmcode_load_fonts() {

    wp_enqueue_style(
        'mmcode-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Poppins:wght@300;400;600;700&family=Roboto:wght@300;400;700&family=Montserrat:wght@300;400;600;700&family=Bebas+Neue&family=IBM+Plex+Sans:wght@300;400;600;700&display=swap',
        [],
        null
    );
}
add_action('wp_enqueue_scripts', 'mmcode_load_fonts');
add_action('enqueue_block_editor_assets', 'mmcode_load_fonts');
