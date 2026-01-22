<?php
/**
 * Layout helpers
 */

/**
 * Container class bepalen
 * - Eerst per pagina
 * - Daarna theme instelling
 */
function mm_container_class() {

    // 1. Pagina override
    if (is_page()) {
        $page_width = get_post_meta(get_the_ID(), '_mm_container_width', true);

        if ($page_width) {
            return mm_container_map($page_width);
        }
    }

    // 2. Fallback: theme setting
    $theme_width = mm_get_option('container_width', 'md');
    return mm_container_map($theme_width);
}

/**
 * Map breedte naar Tailwind class
 */
function mm_container_map($key) {

    $map = [
        'sm' => 'max-w-[1100px]',
        'md' => 'max-w-7xl',
        'lg' => 'max-w-[1440px]',
    ];

    return $map[$key] ?? 'max-w-7xl';
}
