<?php
/**
 * Dashboard widget
 */

add_action('wp_dashboard_setup', function () {

    wp_add_dashboard_widget(
        'mm_dashboard_info',
        __('Welkom bij jouw website', 'mmcode'),
        'mm_dashboard_widget_content'
    );
});

function mm_dashboard_widget_content() {
    ?>
    <p><strong>Welkom!</strong></p>
    <p>Via dit dashboard kun je je website beheren.</p>

    <ul>
        <li>👉 Pagina’s aanpassen</li>
        <li>👉 Afbeeldingen beheren</li>
        <li>👉 Theme instellingen wijzigen</li>
    </ul>
    <?php
}
