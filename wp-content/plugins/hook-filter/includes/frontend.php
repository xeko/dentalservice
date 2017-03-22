<?php

class HoatvFrontend {

    public function __construct() {

//        add_filter('the_title', array($this, 'changeTitle'));
        add_filter('the_content', array($this, 'clearContent'));
        
        // Kiểm tra xem filter addContent có tồn tại không
//	 echo "<br />" .has_filter('the_content', array($this, 'clearContent'));
    }

    function changeTitle() {
        global $post;
        
        if($post->post_type == "post"){
            $title = 'Trang đơn giản';
        }
        return $title;
    }
    function clearContent() {
        $content = "";
        return $content;
    }

}
