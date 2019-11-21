<?php

class dealer_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }
    
    public function update_password($params) {
        $columnsdesc = $this->updateMaker($params);
        $new_password = md5($params['new_password']);            
        $user_id = $_SESSION['dealerDetails']['tax_dealer_id'];
        if ($columnsdesc) {
            $q = "UPDATE tax_dealer SET tax_dealer_password='$new_password' WHERE tax_dealer_id=$user_id";
            return $this->query->update($q);
        }
        return FALSE;
    }
    public function check_current_password($current_password) {
        $current_password = md5($current_password);        
        $user_id = $_SESSION['dealerDetails']['tax_dealer_id'];
        $q = "SELECT * FROM tax_dealer WHERE tax_dealer_id='$user_id' AND tax_dealer_password='$current_password'";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch($result)) {
            return true;
        }
        return false;
    }
}
?>