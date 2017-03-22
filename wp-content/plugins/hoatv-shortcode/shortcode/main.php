<?php

class Hoatv_Main_Run_Shortcode {

    public function __construct() {
        // Gọi tới phương thức text() để khởi tạo và nạp shortcode vào hệ thống
        $this->text();
    }

    public function text() {
        require_once HOATV_SHORTCODE_DIR . '/text.php';
        new Hoatv_Text_Shortcode();
    }

}
