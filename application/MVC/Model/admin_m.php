<?php

class admin_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }  
}
?>