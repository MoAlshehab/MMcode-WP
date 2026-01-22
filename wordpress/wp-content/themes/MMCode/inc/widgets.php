<?php
/**
 * Widgets helpers
 */

/**
 * Check of widgets zichtbaar zijn op deze pagina
 */
function mm_show_widgets() {

    // Alleen voor pagina's
    if (is_page()) {
        return get_post_meta(get_the_ID(), '_mm_show_widgets', true) === '1';
    }

    // Voor andere post types: standaard tonen
    return true;
}
