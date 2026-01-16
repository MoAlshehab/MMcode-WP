<?php
/**
 * Plugin Name: MMCode I18n
 * Description: Lightweight translation loader for MMCode theme
 * Version: 1.0
 * Author: Mo
 */

defined('ABSPATH') || exit;

add_action('plugins_loaded', function () {
  load_theme_textdomain(
    'mmcode',
    get_template_directory() . '/languages'
  );
});
