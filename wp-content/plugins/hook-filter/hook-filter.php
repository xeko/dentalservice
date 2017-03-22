<?php

/*
  Plugin Name: Filter Hook
  Plugin URI: http://dentalservice.jp
  Description: Đây là một plugin dùng để tương tác với Filter Hook.
  Author: Hoatv
  Version: 0.1
  Author URI: None
 */
define('HOATV_FILTER_PLÙGIN_URL', plugin_dir_url(__FILE__));
define('HOATV_FILTER_PLÙGIN_DIR', plugin_dir_path(__FILE__));
define('HOATV_FILTER_INCLUDES_DIR', plugin_dir_path(__FILE__));

define('HOATV_FILTER_VIEWS_DIR', HOATV_FILTER_PLÙGIN_URL . '/views');
define('HOATV_FILTER_IMG_DIR', HOATV_FILTER_PLÙGIN_DIR . 'images');


if (!is_admin()) {
    require HOATV_FILTER_PLÙGIN_DIR . 'includes/frontend.php';
    new HoatvFrontend();
} else {
    require HOATV_FILTER_PLÙGIN_DIR . 'includes/backend.php';
    new HoatvBackend();
}