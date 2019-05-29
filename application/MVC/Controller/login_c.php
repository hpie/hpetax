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
                if($result==2){
                    redirect(LOGIN);
                }
                if ($result == true) {
                    redirect(ADMIN_DASHBOARD_LINK);
                }
                if ($result == false) {
                    $_SESSION['valid'] = 1;
                }
            }
        }
        $this->data['count'] = $count;
        loadLoginView('login/', 'login.php', $this->data);
    }

    public function logout() {
        sessionDestroy();
        redirect(LOGIN);
    }

}

?>