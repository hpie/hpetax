<?php

class login_c extends Controllers {

    public $login_m;

    public function __construct() {
        parent::__construct();
        $this->login_m = $this->loadModel('login_m');
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
      
        $this->data['count'] = $count;
        loadLoginView('login/', 'login.php', $this->data);
    }
    
    public function loginDealer() {
        $error = '';
        $_SESSION['valid'] = 0;       
            if (isset($_POST['code']) && isset($_POST['password'])) {
                $result = $this->login_m->login_delear($_POST['code'], $_POST['password']);                                              
                if ($result==true) { 
                    $_SESSION['valid']=1;
                    redirect(BASE_URL);
                }                             
            } 
        redirect(BASE_URL);
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