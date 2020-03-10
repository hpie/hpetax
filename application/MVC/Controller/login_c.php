<?php

class login_c extends Controllers {
    
    public $login_m;
    public function __construct() {
        parent::__construct();
        
        $_SESSION['securityToken2']=$_SESSION['securityToken1'];
        sessionCheckToken();
        $_SESSION['securityToken1'] = bin2hex(random_bytes(24)); 
        
        $this->login_m = $this->loadModel('login_m');
    }
    
    public function page_404() {  
        loadLoginView('front/', '404.php', $this->data);
    }                      
    public function invoke() {                        
        $error = '';
        $_SESSION['valid'] = 0;
        $count = $this->login_m->getAttemptCount();
        if ($count==false) {        
            if (isset($_POST['email']) && isset($_POST['password'])) {                                                
                $result = $this->login_m->login_select($_POST['email'], $_POST['password']);                                              
                if ($result==true) {                    
                    redirect(ADMIN_DASHBOARD_LINK);
                }
                if ($result == false) {
                    $_SESSION['valid'] = 1;
                } 
                if($result==2){
                    redirect(LOGIN);
                }               
            }              
        }        
        $_SESSION['token'] = bin2hex(random_bytes(24));
        $_SESSION['tokenchekvalue']=$_SESSION['token'];        
        $this->data['count'] = $count;
        loadLoginView('login/', 'login.php', $this->data);
    }        
    public function employeeLoginForm() {
        
//        $_POST['tokenvalue']=$_SESSION['tokenchekvalue'];
//        sessionCheckToken($_POST);
//        $_SESSION['tokenvalue'] = bin2hex(random_bytes(24));
//        $_SESSION['tokenchekvalue']=$_SESSION['tokenvalue'];
        
        $this->data['TITLE'] = TITLE_FRONT_EMPLOYEE_LOGIN;
        loadviewFront('front/', 'employeeLogin.php', $this->data);
    }    
    public function loginDealer() {
        
//        $_POST['tokenvalue']=$_SESSION['tokenchekvalue'];
//        sessionCheckToken($_POST);
//        $_SESSION['tokenvalue'] = bin2hex(random_bytes(24));
//        $_SESSION['tokenchekvalue']=$_SESSION['tokenvalue'];
        
        if(!isset($_SESSION['employeeDetails'])){
        $error = '';
        $_SESSION['valid'] = 0;       
            if (isset($_POST['code']) && isset($_POST['password'])) {
                $result = $this->login_m->login_delear($_POST['code'], $_POST['password']);                                              
                if ($result==true) { 
                    $_SESSION['valid']=1;
                    redirect(BASE_URL);
                }                             
            } 
        }
        $_SESSION['invalid']=1;
        redirect(BASE_URL);
    }
    public function employeeLogin() {        
//        $_POST['tokenvalue']=$_SESSION['tokenchekvalue'];
//        sessionCheckToken($_POST);
//        $_SESSION['tokenvalue'] = bin2hex(random_bytes(24));
//        $_SESSION['tokenchekvalue']=$_SESSION['tokenvalue'];
        
        if(!isset($_SESSION['dealerDetails'])){
        $error = '';
        $_SESSION['valid'] = 0;       
            if (isset($_POST['code']) && isset($_POST['password'])) {
                $result = $this->login_m->login_employee($_POST['code'], $_POST['password']);                                              
                if ($result==true) { 
                    $_SESSION['valid']=1;
                    redirect(FRONT_EMPLOYEE_EDT_LINK);
                }                             
            }
        }
        $_SESSION['invalid']=1;
        redirect(FRONT_LOGIN_EMPLOYEE_LOGIN_FORM_LINK);
    }     
    public function logout() {
        sessionDestroy();
        redirect(LOGIN);
    }
    public function logoutDealer() {
        sessionDestroy();
        redirect(BASE_URL);
    }
}

?>