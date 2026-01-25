<?php
/**
 * MMCODE Theme Bootstrap
 * Loads all theme modules in a structured way.
 */

$inc = get_template_directory() . '/inc';

/**
 * Core
 */
require $inc . '/core/setup.php';
require $inc . '/core/assets.php';
require $inc . '/core/menus.php';
require $inc . '/core/sidebars.php';
require $inc . '/core/layout.php';
require $inc . '/core/widgets.php';

/**
 * Content
 */
require $inc . '/content/excerpts.php';
require $inc . '/content/pagination.php';
require $inc . '/content/breadcrumbs.php';
require $inc . '/content/reading-time.php';
require $inc . '/content/post-views.php';
require $inc . '/content/post-layout.php';
require $inc . '/content/post-options.php';
require $inc . '/content/featured-posts.php';

/**
 * SEO
 */
require $inc . '/seo/seo.php';
require $inc . '/seo/open-graph.php';
require $inc . '/seo/schema.php';
require $inc . '/seo/toc.php';

/**
 * Performance
 */
require $inc . '/performance/lazy-load.php';

/**
 * Admin
 */
require $inc . '/admin/theme-settings.php';
require $inc . '/admin/dashboard-widgets.php';
require $inc . '/admin/admin-cleanup.php';

/**
 * Meta
 */
require $inc . '/meta/page-background.php';
require $inc . '/meta/page-widgets.php';
require $inc . '/meta/page-hero-media.php';

/**
 * UI
 */
require $inc . '/ui/page-header.php';
require $inc . '/ui/socials.php';

/**
 * Forms
 */
require $inc . '/forms/contact-form.php';

/**
 * Patterns
 */
require $inc . '/patterns/categories.php';
require $inc . '/patterns/mm-patterns/index.php';
require $inc . '/patterns/mm-patterns/hero.php';
require $inc . '/patterns/mm-patterns/cta.php';
