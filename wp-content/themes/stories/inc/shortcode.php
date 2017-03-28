<?php

add_shortcode('tabs', 'tabs_func');
add_shortcode('tab', 'tab_func');

function tab_func($atts, $content = null) {
    extract(shortcode_atts(array(
        'title' => ''
                    ), $atts));
    global $single_tab_array;
    $single_tab_array[] = array('title' => $title, 'content' => trim(do_shortcode($content)));
    return $single_tab_array;
}

add_shortcode('tab', 'tab_func');

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
        $tabs_nav .= '<li '. ( $tab == 1 ? 'class="current"' : '') . '>
             <a href="#tab-'.$tab.'">' . $tab_attr_array['title'] . '</a></li>';
        $tabs_content .= '<div id="tab-'.$tab.'" class="tab-content">' . $tab_attr_array['content'] . '</div>';
    }
    $tabs_nav .= '</ul>';

    $tabs_output = $tabs_nav . '<div class="tab">' . $tabs_content . '</div>';
    $tabs_output .= '</div>';
    return $tabs_output;
}

add_shortcode('tabs', 'tabs_func');

function tab_scripts() {
    wp_enqueue_style('tab-styles', get_template_directory_uri() . '/css/tab.css');
    wp_enqueue_script('tab-script', get_template_directory_uri() . '/js/tab.js');
}

add_action('wp_enqueue_scripts', 'tab_scripts');