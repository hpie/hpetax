<?php
//tax_master, tax_type, tax_commodity
class employee_c extends Controllers {

    public $employee_m;

    public function __construct() {
        parent::__construct();
        sessionCheckEmployee();        
        $_POST['tokenvalue']=$_SESSION['tokenchekvalue'];
        sessionCheckToken($_POST);
        $_SESSION['tokenvalue'] = bin2hex(random_bytes(24));
        $_SESSION['tokenchekvalue']=$_SESSION['tokenvalue'];
        $this->employee_m = $this->loadModel('employee_m');
    }
//**************************tax_master*******************//
    public function invoke() {
//        $result = $this->admin_m->getTaxMasterList();
//        $this->data['result'] = $result;
        $this->data['TITLE'] = TITLE_TAX_EMPLOYEE_EDT;
        loadviewFront('front/', 'edt.php', $this->data);
    } 
}
?>