<?php

class admin_c extends Controllers {

    public $admin_m;

    public function __construct() {
        sessionCheck();
        $this->admin_m = $this->loadModel('admin_m');
    }

    /*     * ****************************************** common *********************************** */

    public function invoke() {
        $this->data['TITLE'] = DASHBOARD;
        loadview('dashboard/', 'dashboard.php', $this->data);
    }
}
?>