<?php /* Template Name: Page Facebook */ ?>
<?php get_header(); ?>
<?php

$facebook_transient = "facebook_like_count";

$fb_like_count_cache = get_transient($facebook_transient);

if ($fb_like_count_cache == FALSE) {//Not exitst cache
    echo "Not exist";
    $url = 'http://graph.facebook.com/http://vysajp.org/news/vysa-kanto-gap-mat-doan-cong-tac-tu-doan/';
    // Get remote HTML file
    $response = wp_remote_get($url);

    // Check for error
    if (is_wp_error($response)) {
        return;
    }

    // Parse remote HTML file
    $data_json = wp_remote_retrieve_body($response);

    // Check for error
    if (is_wp_error($data_json)) {
        return;
    }    

    // Store remote HTML file in transient, expire after 24 hours
    set_transient($facebook_transient, $data_json, 24 * HOUR_IN_SECONDS);
} else {
    echo "Exist";
    $data_json = $fb_like_count_cache;
}

$data = json_decode($data_json);
//delete_transient($facebook_transient);
echo $data->share->share_count;

get_footer();

