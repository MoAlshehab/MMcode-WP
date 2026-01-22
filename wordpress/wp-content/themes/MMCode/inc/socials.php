<?php
/**
 * Social media helpers
 */

function mm_get_social_links() {

    $links = [
        'instagram' => mm_get_option('social_instagram'),
        'linkedin'  => mm_get_option('social_linkedin'),
        'facebook'  => mm_get_option('social_facebook'),
    ];

    // Verwijder lege waarden
    return array_filter($links);
}
