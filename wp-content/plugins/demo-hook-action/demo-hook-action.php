<?php

/*
  Plugin Name: Demo Hook Action
  Plugin URI: http://laptrinhweb.org
  Description: Demo về cách sử dụng Hook Action.
  Author: Hoatv
  Version: 1.0
  Author URI: None
 */
add_action('kenshin_hook_head', 'kenshin_new_hook_head', '', 2);
 
function kenshin_new_hook_head($css, $js){
	echo 'Kenshin new hook head is working with '.$css. ' and '.$js.'';
}
 
function ks_head($css = 'css', $js = 'jquery'){
	do_action('kenshin_hook_head', $css, $js);
}