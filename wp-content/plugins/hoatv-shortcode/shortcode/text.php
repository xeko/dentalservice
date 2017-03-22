<?php

class Hoatv_Text_Shortcode {

    public function __construct() {
        add_shortcode('ks_sc_text', array($this, 'show'));
    }

    public function show() {
        $str = 'Đây là ví dụ về Shortcode API';
        return $str;
    }

}
