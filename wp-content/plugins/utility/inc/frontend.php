<?php

class UtilitesFrontend {

    function __construct() {

        add_action('wp_footer', array($this, 'shortcode_scripts'));

        add_shortcode('tab', array($this, 'tab_func'));
        add_shortcode('tabs', array($this, 'tabs_func'));

        add_shortcode('feature', array($this, 'func_feature'));
        add_shortcode('feature-item', array($this, 'feature_item'));
    }

    function shortcode_scripts() {
        wp_enqueue_style('shortcode-styles', UTILIES_SHORTCODE_PLUGIN_URL . 'css/utility.css');
        wp_enqueue_script('shortcode-script', UTILIES_SHORTCODE_PLUGIN_URL . 'js/shortcode.js');
    }

    function tab_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'title' => ''
                        ), $atts));
        global $single_tab_array;
        $single_tab_array[] = array('title' => $title, 'content' => trim(do_shortcode($content)));
        return $single_tab_array;
    }

    function tabs_func($atts, $content = null) {
        global $single_tab_array;
        $single_tab_array = array(); // clear the array

        $tabs_nav = '';
        $tabs_content = '';
        $tabs_output = '';

        $tabs_nav .= '<div class="tabs-container">';
        $tabs_nav .= '<ul class="tabs-menu">';

        do_shortcode($content);

        foreach ($single_tab_array as $tab => $tab_attr_array) {

            $tab++;
            $tabs_nav .= '<li ' . ( $tab == 1 ? 'class="current"' : '') . '>
             <a href="#tab-' . $tab . '">' . $tab_attr_array['title'] . '</a></li>';
            $tabs_content .= '<div id="tab-' . $tab . '" class="tab-content">' . $tab_attr_array['content'] . '</div>';
        }
        $tabs_nav .= '</ul>';

        $tabs_output = $tabs_nav . '<div class="tab">' . $tabs_content . '</div>';
        $tabs_output .= '</div>';
        return $tabs_output;
    }

    /**
     * Shortcode feature
     */
    function feature_item($atts, $content = "") {
        extract(shortcode_atts(array(
            'title' => '',
            'class' => 'inactive' //Default class
                        ), $atts));
        global $feature_item_array;
        $feature_item_array[] = array('title' => $title, 'class' => $class);
        return $feature_item_array;
    }

    function func_feature($atts, $content = "") {
        extract(shortcode_atts(array(
            'item_per_row' => '4', //Default item per row
                        ), $atts));
        global $feature_item_array;

        $feature_item_array = array();
        do_shortcode($content);

        $feature_str = '<div class="feature-list">';
        foreach ($feature_item_array as $key => $feature_item) {
            $key++;
            $clearfix = ($key % (int) $atts['item_per_row'] == 0) ? '<div class="clearfix"></div>' : "";
            $feature_str .= '<span class="' . $feature_item["class"] . '">' . $feature_item['title'] . '</span>' . $clearfix;
        }

        $feature_str .= '</div>';

        return $feature_str;
    }

}
