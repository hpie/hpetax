<?php
class login_m extends Models {

    public $query;
    

    public function __construct() {
        $this->query = new Query();
    }

    public function invoke() {
        
    }
    public function login_select($email, $password) {
        $password=md5($password);
        $q = "SELECT * FROM admin_users WHERE username='$email' and password='$password'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            if ($email == $row['username'] && $password == $row['password']) {               
                sessionAdmin($row);
                return true;
            }
        }
        return false;
    }   
}
?>