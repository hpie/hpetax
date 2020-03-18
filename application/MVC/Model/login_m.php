<?php

class login_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }

    public function getAttemptCount() {
        $ip = $_SERVER["REMOTE_ADDR"];
        $q1 = "SELECT COUNT(ip_address) as total FROM `ip` WHERE `ip_address` LIKE '$ip' AND `ip_update` > (now() - interval 10 minute)";
        $result = $this->query->select($q1);
        if ($row = $this->query->fetch($result)) {
            if ($row['total'] > 3) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function login_select($email, $password) {
        $password = md5($password);
        $ip = $_SERVER["REMOTE_ADDR"];
        $q = "INSERT INTO `ip` (`ip_address` ,`ip_update`)VALUES ('$ip',CURRENT_TIMESTAMP)";
        $res = $this->query->insert($q);
        $q1 = "SELECT COUNT(ip_address) as total FROM `ip` WHERE `ip_address` LIKE '$ip' AND `ip_update` > (now() - interval 10 minute)";
        $result = $this->query->select($q1);
        if ($row = $this->query->fetch($result)) {
            if ($row['total'] > 3) {
                return 2;
            }
        }
        $q3 = "SELECT * FROM admin_users WHERE username='$email' and password='$password'";
        $result = $this->query->select($q3);
        if ($row = $this->query->fetch($result)) {
            if ($email == $row['username'] && $password == $row['password']) {
                $admin_id = $row['admin_user_id'];
                $q4 = "UPDATE admin_users SET last_login=now() WHERE admin_user_id=$admin_id";
                $this->query->update($q4);
                sessionAdmin($row);
                
                
                $token = "";
                $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
                $codeAlphabet .= "0123456789";
                $max = strlen($codeAlphabet); // edited
                for ($i = 0; $i < 10; $i++) {
                    $token .= $codeAlphabet[random_int(0, $max - 1)];
                }                
                $_SESSION['tokencheck'] = $token;
                $uid=$_SESSION['adminDetails']['admin_user_id'];   
                
                $result_token = $this->query->select("select count(*) as allcount from admin_token");
                $row_token = $this->query->fetch($result_token);
                if ($row_token['allcount'] > 0) {                    
                    $this->query->update("update admin_token set token='$token' where user_id='$uid'");
                } else {
                    $this->query->insert("insert into admin_token(user_id,token) values('$uid','$token')");
                }                                                                                
                return true;
            }
        }
        return false;
    }

    public function login_delear($email, $password) {
        $password = md5($password);
        $q = "SELECT * FROM tax_dealer WHERE tax_dealer_code='$email' AND tax_dealer_password='$password' AND tax_delaer_status='ACTIVE'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            if ($email == $row['tax_dealer_code'] && $password == $row['tax_dealer_password']) {
                sessionDealer($row);
                
                $token = "";
                $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
                $codeAlphabet .= "0123456789";
                $max = strlen($codeAlphabet); // edited
                for ($i = 0; $i < 10; $i++) {
                    $token .= $codeAlphabet[random_int(0, $max - 1)];
                }                
                $_SESSION['tokencheck'] = $token;
                $uid=$_SESSION['dealerDetails']['tax_dealer_id'];   
                
                $result_token = $this->query->select("select count(*) as allcount from dealer_token");
                $row_token = $this->query->fetch($result_token);
                if ($row_token['allcount'] > 0) {                    
                    $this->query->update("update dealer_token set token='$token' where user_id='$uid'");
                } else {
                    $this->query->insert("insert into dealer_token(user_id,token) values('$uid','$token')");
                }                                                                                                                
                return true;
            }
        }
        return false;
    }
    public function login_employee($email, $password) {
        $password = md5($password);
        $q = "SELECT * FROM tax_employee WHERE tax_employee_code='$email' AND tax_employee_password='$password' AND tax_employee_status='ACTIVE'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            if ($email == $row['tax_employee_code'] && $password == $row['tax_employee_password']) {
                sessionEmployee($row);
                
                $token = "";
                $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
                $codeAlphabet .= "0123456789";
                $max = strlen($codeAlphabet); // edited
                for ($i = 0; $i < 10; $i++) {
                    $token .= $codeAlphabet[random_int(0, $max - 1)];
                }                
                $_SESSION['tokencheck'] = $token;
                $uid=$_SESSION['employeeDetails']['tax_employee_id'];   
                
                $result_token = $this->query->select("select count(*) as allcount from employee_token");
                $row_token = $this->query->fetch($result_token);
                if ($row_token['allcount'] > 0) {                    
                    $this->query->update("update employee_token set token='$token' where user_id='$uid'");
                } else {
                    $this->query->insert("insert into employee_token(user_id,token) values('$uid','$token')");
                }                                                                
                return true;
            }
        }
        return false;
    }
    
    public function getTokenAndCheck($table,$user_id) {        
        $result = $this->query->select("SELECT token FROM $table where user_id='$user_id'");
        $data = $this->query->fetch($result);
        if($data){
            return $data;
        }
        return false;
    }
}
?>