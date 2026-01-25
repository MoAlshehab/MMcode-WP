<?php
/**
 * Footer wrapper
 * - Laadt gekozen footer layout
 * - wp_footer()
 * - Back to top
 */

// 🔥 Laad footer layout op basis van admin-keuze
mm_load_footer();

// Verplicht voor plugins / scripts
wp_footer();
?>

<!-- Back to top button -->
<button
    id="backToTop"
    class="back-to-top"
    aria-label="<?php esc_attr_e('Back to top', 'mmcode'); ?>"
>
    ↑ TOP
</button>

</body>
</html>
