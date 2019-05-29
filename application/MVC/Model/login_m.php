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
                $admin_id=$row['admin_user_id'];
                $q = "UPDATE admin_users SET last_login=now() WHERE admin_user_id=$admin_id";
                $this->query->update($q);
                sessionAdmin($row);
                return true;
            }
        }
        return false;
    }   
}
?>