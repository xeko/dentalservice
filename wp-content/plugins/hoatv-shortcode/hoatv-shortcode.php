<?php

/**
 * @package Hoatv Shortcode API
 * @version 0.1
 */
/*
  Plugin Name: Hoatv Shortcode API
  Plugin URI: http://dentalservice.jp
  Description: Đây là một plugin dùng để tương tác vói Shortcode API.
  Author: Hoatv
  Version: 0.1
  Author URI: None
 */

define('HOATV_SHORTCODE_PLUGIN_URL', plugin_dir_url(__FILE__));
define('HOATV_SHORTCODE_PLUGIN_DIR', plugin_dir_path(__FILE__));


define('HOATV_SHORTCODE_INCLUDES_DIR', HOATV_SHORTCODE_PLUGIN_DIR . '/includes');
define('HOATV_SHORTCODE_DIR', HOATV_SHORTCODE_PLUGIN_DIR . '/shortcode');



if (!is_admin()) {
    require_once HOATV_SHORTCODE_INCLUDES_DIR . '/frontend.php';
    new HoatvFrontend();
} else {
    require_once HOATV_SHORTCODE_INCLUDES_DIR . '/backend.php';
    new HoatvBackend();
}

add_shortcode('basic_shortcode', 'hoatv_create_shortcode_simple');

function hoatv_create_shortcode_simple() {
    $str = 'Đây là ví dụ về Shortcode API';
    return $str;
}
