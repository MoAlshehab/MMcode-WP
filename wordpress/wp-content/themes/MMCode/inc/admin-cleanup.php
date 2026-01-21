<?php
/**
 * Admin menu opruimen
 */

add_action('admin_menu', function () {

    if (!current_user_can('manage_options')) {
        remove_menu_page('tools.php');
        remove_menu_page('plugins.php');
    }
});
