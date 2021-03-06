<?php
//tax_master, tax_type, tax_commodity
class employee_c extends Controllers {

    public $employee_m;

    public function __construct() {
        parent::__construct();
        sessionCheckEmployee();        
        
        $_SESSION['securityToken2']=$_SESSION['securityToken1'];
        sessionCheckToken();
        $_SESSION['securityToken1'] = bin2hex(random_bytes(24)); 
        
        $this->employee_m = $this->loadModel('employee_m');
        
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
//**************************tax_master*******************//
    public function invoke() {
//        $result = $this->admin_m->getTaxMasterList();
//        $this->data['result'] = $result;
        $this->data['TITLE'] = TITLE_TAX_EMPLOYEE_EDT;
        loadviewFront('front/', 'edt.php', $this->data);
    } 
    public function changePassword() {
        $this->data['TITLE'] = TITLE_FRONT_CHANGE_PASSWORD;
        loadviewFront('front/', 'changepassword_employee.php', $this->data);
    }
    public function update_profile(){       
        $result=array();               
        if(isset($_POST['current_password']) && $_POST['current_password']!=''){             
            if($this->employee_m->check_current_password($_POST['current_password'])){                
                $res = $this->employee_m->update_password($_POST);                    
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
        redirect(FRONT_CHANE_PASSWORD_EMPLOYEE_FORM_LINK);
    }
    
    public function dealerlist() {
        $this->data['TITLE'] = TITLE_TAX_DEALER_LIST;
        loadviewFront('front/', 'dealerlist.php', $this->data);
    } 
}
?>