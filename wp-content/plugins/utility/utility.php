<?php
/*
  Plugin Name: Utilities
  Plugin URI: http://dentalservice.jp
  Description: Chứa các shortcode khung soạn thảo. Như tạo tab, tạo table,...
  Author: TongHoa
  Version: 0.1
  Author URI: None
 */

define('UTILIES_SHORTCODE_PLUGIN_URL', plugin_dir_url(__FILE__));
define('UTILIES_SHORTCODE_PLUGIN_DIR', plugin_dir_path(__FILE__));

define('UTILIES_SHORTCODE_JS', UTILIES_SHORTCODE_PLUGIN_URL . 'js');
define('UTILIES_SHORTCODE_CSS', UTILIES_SHORTCODE_PLUGIN_URL . 'css');

if(!is_admin()){
    require_once UTILIES_SHORTCODE_PLUGIN_DIR. 'inc/frontend.php';
    new UtilitesFrontend();
}else{
    require_once UTILIES_SHORTCODE_PLUGIN_DIR. 'inc/backend.php';
    new UtilitesBackend();
}

