<?php
class login_m extends Models {

    public $query;
    

    public function __construct() {
        $this->query = new Query();
    }

    public function invoke() {
        
    }
    public function login_select($email, $password) {
        $q = "SELECT * FROM admin WHERE admin_email='$email' and admin_password='$password'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            if ($email == $row['admin_email'] && $password == $row['admin_password']) {
                sessionAdmin($row);
                return true;
            }
        }
        return false;
    }
     public function login_selectTech($email, $password) {
        $q = "SELECT * FROM technician WHERE technician_email='$email' and technician_password='$password'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            if ($email == $row['technician_email'] && $password == $row['technician_password']) {
                sessionTechnician($row);
                return true;
            }
        }
        return false;
    }
}
?>