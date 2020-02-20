<?php

//tax_master, tax_type, tax_commodity
class dealer_c extends Controllers {

    public $admin_m;

    public function __construct() {
        parent::__construct();
        sessionCheckDealer();
        
        $_POST['token']=$_SESSION['tokenchekvalue'];
        sessionCheckToken($_POST);
        $_SESSION['token'] = bin2hex(random_bytes(24));
        $_SESSION['tokenchekvalue']=$_SESSION['token'];
        
        $this->dealer_m = $this->loadModel('dealer_m');
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