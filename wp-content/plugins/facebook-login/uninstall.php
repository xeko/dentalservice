<?php

if(!defined("WP_UNINSTALL_PLUGIN")){
	exit();
}
 
facebook_hoatv_uninstall();
 
function facebook_hoatv_uninstall() {
    global $wpdb;
    // OPTION API
    delete_option('facebook_hoatv_options');
    delete_option('facebook_hoatv_version');

    $tableName = $wpdb->prefix . "facebook_hoatv_tbl";
    $sql = "DROP TABLE IF EXISTS" . $tableName;
    $wpdb->query($sql);
}