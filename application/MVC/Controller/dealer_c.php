<?php

//tax_master, tax_type, tax_commodity
class dealer_c extends Controllers {

    public $admin_m;

    public function __construct() {
        parent::__construct();
        sessionCheckDealer();
        
        $_SESSION['securityToken2']=$_SESSION['securityToken1'];
        sessionCheckToken();
        $_SESSION['securityToken1'] = bin2hex(random_bytes(24)); 
        
        $this->dealer_m = $this->loadModel('dealer_m');
        
        $this->login_m = $this->loadModel('login_m');        
        if (isset($_SESSION['user_id'])) {
            $result = $this->login_m->getTokenAndCheck($_SESSION['usertype'], $_SESSION['user_id']);
            if ($result) {
                $token = $result['token'];
                if ($_SESSION['tokencheck'] != $token) {
                    session_destroy();
                    redirect(BASE_URL);
                }
            }
        }
        
        
    }
    public function invoke() {      
    }
    public function changePassword() {
        $this->data['TITLE'] = TITLE_FRONT_CHANGE_PASSWORD;
        loadviewFront('front/', 'changepassword.php', $this->data);
    }
    public function update_profile(){       
        $result=array();               
        if(isset($_POST['current_password']) && $_POST['current_password']!=''){             
            if($this->dealer_m->check_current_password($_POST['current_password'])){                
                $res = $this->dealer_m->update_password($_POST);                    
                if($res){
                    $_SESSION['updatedata']=1;
                    $result['success']="success";                   
                }                
            }
            else{
                $result['success']="fail";
            }
            echo json_encode($result);die;            
        }   
        redirect(FRONT_CHANE_PASSWORD_DEALER_FORM_LINK);
    }
}

?>