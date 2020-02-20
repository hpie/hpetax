<?php

class token_c extends Controllers {

    public function __construct() {
        parent::__construct();
    }
    public function invoke() {
        $_SESSION['token'] = bin2hex(random_bytes(24));
        $_SESSION['tokenchekvalue']=$_SESSION['token'];
        
        $this->data['TITLE'] = TITLE_FRONT_COMMON;
        loadviewFront('front/', 'home.php', $this->data);
    }
}

?>