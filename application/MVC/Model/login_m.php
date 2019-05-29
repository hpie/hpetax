<?php
class login_m extends Models {

    public $query;
    

    public function __construct() {
        $this->query = new Query();
    }

    public function invoke() {
        
    }
    
    public function getAttemptCount(){
        $ip = $_SERVER["REMOTE_ADDR"];
        $q1 ="SELECT COUNT(ip_address) as total FROM `ip` WHERE `ip_address` LIKE '$ip' AND `ip_update` > (now() - interval 10 minute)";
        $result = $this->query->select($q1);
        if ($row = $this->query->fetch($result)) {
            if($row['total']>3){
                return true;
            }
            else{
                return false;
            }
        }
    }
     
    public function login_select($email, $password) {                                
        $password=md5($password);        
        $ip = $_SERVER["REMOTE_ADDR"];        
        $q = "INSERT INTO `ip` (`ip_address` ,`ip_update`)VALUES ('$ip',CURRENT_TIMESTAMP)";
        $res = $this->query->insert($q);               
        $q1 ="SELECT COUNT(ip_address) as total FROM `ip` WHERE `ip_address` LIKE '$ip' AND `ip_update` > (now() - interval 10 minute)";
        $result = $this->query->select($q1);
        if ($row = $this->query->fetch($result)) {
            if($row['total']>3){
                return 2;
            }
        }               
        $q3 = "SELECT * FROM admin_users WHERE username='$email' and password='$password'";
        $result = $this->query->select($q3);
        if ($row = $this->query->fetch($result)) {
            if ($email == $row['username'] && $password == $row['password']) {
                $admin_id=$row['admin_user_id'];
                $q4 = "UPDATE admin_users SET last_login=now() WHERE admin_user_id=$admin_id";
                $this->query->update($q4);
                sessionAdmin($row);
                return true;
            }
        }
        return false;
    }   
}
?>