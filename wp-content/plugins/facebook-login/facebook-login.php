<?php

/*
  Plugin Name: Login via Facebook
  Plugin URI: http://dentalservice.jp
  Description: Login wordpress via social facebook
  Author: hoatv
  Version: 1.0
  Author URI: http://dentalservice.jp
 */

register_activation_hook(__FILE__, "facebook_hoatv_active");
register_deactivation_hook(__FILE__, "facebook_hoatv_deactive");
//register_uninstall_hook(__FILE__, 'facebook_hoatv_uninstall');

function welcome() {

//    echo dirname(__FILE__) . '/style/custom.css<br />'; //Default PHP
//    echo plugin_dir_path(__FILE__) . '<br />';
//    echo plugins_url('style/custom.css', __FILE__);

    global $wpdb;
    echo $wpdb->prefix . "facebook_hoatv_tbl<br />";

    $tableName = $wpdb->prefix . "facebook_hoatv_tbl";
    echo $wpdb->get_var("SHOW TABLES LIKE '" . $tableName . "'");
}

//add_action('admin_notices', 'welcome');

function facebook_hoatv_active() {
    global $wpdb;
    $vs = '1.0';

    $ksArr = array(
        'source' => 'WordPress 4.7.3',
        'author' => 'Hoatv',
        'website' => 'http://dentalservice.jp'
    );
    add_option('facebook_hoatv_options', $ksArr, '');
    add_option('facebook_hoatv_version', $vs, '');

    $tableName = $wpdb->prefix . "facebook_hoatv_tbl";
    if ($wpdb->get_var("SHOW TABLES LIKE '" . $tableName . "'") != $tableName) {
        $sql = "CREATE TABLE `" . $tableName . "` (
		`ID` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
		`my_name` varchar(50) DEFAULT NULL,
		`nick_name` varchar(50) DEFAULT NULL,
		PRIMARY KEY (`ID`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }

    // Update field
    $tableName = $wpdb->prefix . "options";
    $wpdb->update(
            $tableName, array('autoload' => 'yes'), array('option_name' => 'facebook_hoatv_options'), array('%s'), array('%s')
    );
}

function facebook_hoatv_deactive() {
    global $wpdb;
    $tableName = $wpdb->prefix . "options";
    $wpdb->update(
            $tableName, array("autoload" => "no"), array("option_name" => "facebook_hoatv_options"), array("%s"), array("%s")
    );
}

//function facebook_hoatv_uninstall() {
//    global $wpdb;
//    // OPTION API
//    delete_option('facebook_hoatv_options');
//    delete_option('facebook_hoatv_version');
//
//    $tableName = $wpdb->prefix . "facebook_hoatv_tbl";
//    $sql = "DROP TABLE IF EXISTS" . $tableName;
//    $wpdb->query($sql);
//}

