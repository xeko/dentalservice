<?php

class WP_Widget_Post_Last extends WP_Widget {

    //Cache wp
    private $_wp_caching_name = "_wp_caching_post_new";
    // Constructor
    function __construct() {
        $id_base = "recentpost";
        $name = "Last post with thumnail";
        $widget_options = array(
            'description' => 'WP-PostViews last post with thumnail'
        );
        parent::__construct($id_base, $name, $widget_options);
    }
   
    // Display Widget 
    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', esc_attr($instance['title']));
        $limit = intval($instance['limit']);
        $disp_views = intval($instance['disp_views']);

        echo $before_widget . $before_title . $title . $after_title;
        
        $cache = get_transient($this->_wp_caching_name);
        
        if($cache == FALSE) { //cache is not existing
//            echo "Not cache <br />";
            $args = array('numberposts' => $limit, 'post_status' => 'publish');
            $recent_posts = wp_get_recent_posts($args);
            set_transient($this->_wp_caching_name, $recent_posts, 3*HOUR_IN_SECONDS);
        } else { //cache is existed
//            echo "Cache<br />";
            $recent_posts = $cache;
        }
        echo '<div class="box">';
        echo '<ul id="recent-post" class="list-unstyled">';
        foreach ($recent_posts as $recent) {
            $count = get_post_meta($recent["ID"], 'tanaka_post_views_count', true);
            echo '<li>
            <a href="' . get_permalink($recent["ID"]) . '" title="' . $recent["post_title"] . '">' . get_the_post_thumbnail($recent["ID"], array(80, 80), array('class' => 'pull-left')) . '
            ' . $recent["post_title"] . '</a>';
            echo '<ul id="post-meta" class="list-inline list-unstyled">';
            if ($disp_views)
                echo '<li><i class="fa fa-clock-o" aria-hidden="true"></i> ' . get_the_time("Y-m-d", $recent["ID"]) . '</li>';

            echo '<li><i class="fa fa-eye" aria-hidden="true"></i> ' . $count . ' views</li>
                    </ul>';

            echo '</li> ';
        }
        echo '</ul></div>';

        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        if (!isset($new_instance['submit'])) {
            return false;
        }
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['limit'] = intval($new_instance['limit']);
        $instance['disp_views'] = strip_tags($new_instance['disp_views']);
        
        //Delete cache if update data
        delete_transient($this->_wp_caching_name);
        
        return $instance;
    }

    // Display Widget Control Form
    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => __('最近の投稿', 'wp-postrecent'), 'type' => 'recent_post', 'mode' => 'both', 'limit' => 5, 'disp_views' => 0));
        $title = esc_attr($instance['title']);
        $limit = intval($instance['limit']);
        $disp_views = intval($instance['disp_views']);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('タイトル:', 'wp-postrecent'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Number of posts to show:', 'wp-postrecent'); ?> 
                <input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="number" value="<?php echo $limit; ?>" /></label>
        </p>
        <p>
            <input type="checkbox" id="disp_views" name="<?php echo $this->get_field_name('disp_views'); ?>" value="1" <?php checked($disp_views, "1"); ?>>
            <label for="disp_views"><?php _e(' Display post date?', 'wp-postrecent'); ?></label>
        </p>

        <input type="hidden" id="<?php echo $this->get_field_id('submit'); ?>" name="<?php echo $this->get_field_name('submit'); ?>" value="1" />
        <?php
    }

}

add_action('widgets_init', 'bzb_widget_last_post_init');

function bzb_widget_last_post_init() {
    register_widget('WP_Widget_Post_Last');
}
