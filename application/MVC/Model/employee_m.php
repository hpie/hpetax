<?php

class employee_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    } 
     public function update_password($params) {
        $columnsdesc = $this->updateMaker($params);
        $new_password = md5($params['new_password']);            
        $user_id = $_SESSION['employeeDetails']['tax_employee_id'];
        if ($columnsdesc) {
            $q = "UPDATE tax_employee SET tax_employee_password='$new_password' WHERE tax_employee_id=$user_id";
            return $this->query->update($q);
        }
        return FALSE;
    }
    public function check_current_password($current_password) {
        $current_password = md5($current_password);        
        $user_id = $_SESSION['employeeDetails']['tax_employee_id'];
        $q = "SELECT * FROM tax_employee WHERE tax_employee_id='$user_id' AND tax_employee_password='$current_password'";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch($result)) {
            return true;
        }
        return false;
    }
}
?>