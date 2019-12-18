<?php

//tax_master, tax_type, tax_commodity
class admin_c extends Controllers {

    public $admin_m;

    public function __construct() {
        parent::__construct();
        sessionCheck();
        $this->admin_m = $this->loadModel('admin_m');
    }
    public function invoke() {
        $totalSuccessCollectionRs = $this->admin_m->getSum('SUCCESS');
        $totalPendingCollectionRs = $this->admin_m->getSum('PENDING');
        $totalFailedCollectionRs = $this->admin_m->getSum('FAILURE');
        
        $totalEmployee=$this->admin_m->getCountEmployee();
        $totalActiveEmployee=$this->admin_m->getCountStsEmployee('ACTIVE');
        $totalInActiveEmployee=$this->admin_m->getCountStsEmployee('INACTIVE');
        
        $totalDealers=$this->admin_m->getCountDealers();
        $totalDealersPendingAproval=$this->admin_m->getCountDealersPendingAproval();
        $totalActiveDealers=$this->admin_m->getCountDealersSts('ACTIVE');
        $totalInActiveDealers=$this->admin_m->getCountDealersSts('INACTIVE');
        
        $totalSuccessCollectionNumber = $this->admin_m->getCount('SUCCESS');
        $totalPendingCollectionNumber = $this->admin_m->getCount('PENDING');
        $totalFailedCollectionNumber = $this->admin_m->getCount('FAILURE');

        $this->data['totalSuccessCollectionRs'] = $totalSuccessCollectionRs;
        $this->data['totalPendingCollectionRs'] = $totalPendingCollectionRs;
        $this->data['totalFailedCollectionRs'] = $totalFailedCollectionRs;
        
        $this->data['totalSuccessCollectionNumber'] = $totalSuccessCollectionNumber;
        $this->data['totalPendingCollectionNumber'] = $totalPendingCollectionNumber;
        $this->data['totalFailedCollectionNumber'] = $totalFailedCollectionNumber;
        
        $this->data['totalDealers'] = $totalDealers;
        $this->data['totalDealersPendingAproval'] = $totalDealersPendingAproval;
        $this->data['totalActiveDealers'] = $totalActiveDealers;
        $this->data['totalInActiveDealers'] = $totalInActiveDealers;        
        
        $this->data['totalEmployee'] = $totalEmployee;
        $this->data['totalActiveEmployee'] = $totalActiveEmployee;
        $this->data['totalInActiveEmployee'] = $totalInActiveEmployee;
        
        $this->data['TITLE'] = TITLE_DASHBOARD;
        loadview('dashboard/', 'dashboard.php', $this->data);
    }
//**************************tax_master*******************//
    public function taxMasterList() {
        $result = $this->admin_m->getTaxMasterList();
        $this->data['result'] = $result;
        $this->data['TITLE'] = TITLE_TAX_MASTER_LIST;
        loadview('tax_master/', 'list.php', $this->data);
    }

    public function taxMasterAddForm() {
        $this->data['TITLE'] = TITLE_TAX_MASTER_ADD_FORM;
        loadview('tax_master/', 'add.php', $this->data);
    }

    public function taxMasterInsert() {
        $existRecord = $this->admin_m->getExistRecordByColumn($_POST['tax_master_id'], 'tax_master_id', 'tax_master');
        $existRecord1 = $this->admin_m->getExistRecordByColumn($_POST['tax_transaction_head'], 'tax_transaction_head', 'tax_master');
        $existRecord2 = $this->admin_m->getExistRecordByColumn($_POST['tax_transaction_dept'], 'tax_transaction_dept', 'tax_master');
        $existRecord3 = $this->admin_m->getExistRecordByColumn($_POST['tax_transaction_ddo'], 'tax_transaction_ddo', 'tax_master');
        if ($existRecord) {
            $_SESSION['data'] = $_POST;
            $_SESSION['existrecord'] = 1;
            redirect(ADMIN_TAX_MASTER_ADD_FORM_LINK);
        }
        if ($existRecord1) {
            $_SESSION['data'] = $_POST;
            $_SESSION['tax_transaction_head_exisit'] = 1;
            redirect(ADMIN_TAX_MASTER_ADD_FORM_LINK);
        }
        if ($existRecord2) {
            $_SESSION['data'] = $_POST;
            $_SESSION['tax_transaction_dept_exisit'] = 1;
            redirect(ADMIN_TAX_MASTER_ADD_FORM_LINK);
        }
        if ($existRecord3) {
            $_SESSION['data'] = $_POST;
            $_SESSION['tax_transaction_ddo_exisit'] = 1;
            redirect(ADMIN_TAX_MASTER_ADD_FORM_LINK);
        }
        $result = $this->admin_m->taxMasterInsert($_POST);
        if ($result['res'] == 1 || !empty($result['id'])) {
            $_SESSION['adddata'] = 1;
            redirect(ADMIN_TAX_MASTER_LIST_LINK);
        } else {
            $_SESSION['data'] = $_POST;
            $_SESSION['Error'] = 1;
            redirect(ADMIN_TAX_MASTER_ADD_FORM_LINK);
        }
    }

    public function taxMasterEditForm($id) {
        $result = $this->admin_m->getSingleRecordById($id, 'tax_master_id', 'tax_master');
        $this->data['result'] = $result;
        $this->data['TITLE'] = TITLE_TAX_MASTER_EDIT_FORM;
        loadview('tax_master/', 'edit.php', $this->data);
    }

    public function editTaxMaster($Id) {
        $tax_transaction_head_exisit = $this->admin_m->getExistRecordByColumnUk1($Id, $_POST['tax_transaction_head'], 'tax_transaction_head', 'tax_master');
        if ($tax_transaction_head_exisit) {
            $_SESSION['tax_transaction_head_exisit'] = 1;
            redirect(ADMIN_TAX_MASTER_EDIT_FORM_LINK . $Id);
        }
        $tax_transaction_dept_exisit = $this->admin_m->getExistRecordByColumnUk1($Id, $_POST['tax_transaction_dept'], 'tax_transaction_dept', 'tax_master');
        if ($tax_transaction_dept_exisit) {
            $_SESSION['tax_transaction_dept_exisit'] = 1;
            redirect(ADMIN_TAX_MASTER_EDIT_FORM_LINK . $Id);
        }
        $tax_transaction_ddo_exisit = $this->admin_m->getExistRecordByColumnUk1($Id, $_POST['tax_transaction_ddo'], 'tax_transaction_ddo', 'tax_master');
        if ($tax_transaction_ddo_exisit) {
            $_SESSION['tax_transaction_ddo_exisit'] = 1;
            redirect(ADMIN_TAX_MASTER_EDIT_FORM_LINK . $Id);
        }
        $result = $this->admin_m->editTaxMaster($_POST, $Id);
        if ($result) {
            $_SESSION['dataupdate'] = 1;
            redirect(ADMIN_TAX_MASTER_LIST_LINK);
        } else {
            $_SESSION['Error'] = 1;
            redirect(ADMIN_TAX_MASTER_EDIT_FORM_LINK . $Id);
        }
    }

//**************************tax_type*******************//
    public function taxTypeList() {
        $result = $this->admin_m->getTaxTypeList();
        $this->data['result'] = $result;
        $this->data['TITLE'] = TITLE_TAX_TYPE_LIST;
        loadview('tax_type/', 'list.php', $this->data);
    }

    public function taxTypeAddForm() {       
        $this->data['TITLE'] = TITLE_TAX_TYPE_ADD_FORM;
        loadview('tax_type/', 'add.php', $this->data);
    }

    public function taxTypeInsert() {
        $existRecord = $this->admin_m->getExistRecordByColumn($_POST['tax_type_id'], 'tax_type_id', 'tax_type');
        $existRecord1 = $this->admin_m->getExistRecordByColumn($_POST['tax_type_name'], 'tax_type_name', 'tax_type');
        if ($existRecord) {
            $_SESSION['data'] = $_POST;
            $_SESSION['existrecord'] = 1;
            redirect(ADMIN_TAX_TYPE_ADD_FORM_LINK);
        }
        if ($existRecord1) {
            $_SESSION['data'] = $_POST;
            $_SESSION['existrecord1'] = 1;
            redirect(ADMIN_TAX_TYPE_ADD_FORM_LINK);
        }
        $result = $this->admin_m->taxTypeInsert($_POST);
        if ($result['res'] == 1 || !empty($result['id'])) {
            $_SESSION['adddata'] = 1;
            redirect(ADMIN_TAX_TYPE_LIST_LINK);
        } else {
            $_SESSION['data'] = $_POST;
            $_SESSION['Error'] = 1;
            redirect(ADMIN_TAX_TYPE_ADD_FORM_LINK);
        }
    }

    public function taxTypeEditForm($id) {
        $result = $this->admin_m->getSingleRecordById($id, 'tax_type_id', 'tax_type');
        $this->data['result'] = $result;
        $this->data['TITLE'] = TITLE_TAX_TYPE_EDIT_FORM;
        loadview('tax_type/', 'edit.php', $this->data);
    }

    public function editTaxType($Id) {
        $tax_type_name_exist = $this->admin_m->getExistRecordByColumnUk1($Id, $_POST['tax_type_name'], 'tax_type_name', 'tax_type');
        if ($tax_type_name_exist) {
            $_SESSION['tax_type_name_exist'] = 1;
            redirect(ADMIN_TAX_TYPE_EDIT_FORM_LINK . $Id);
        }
        $result = $this->admin_m->editTaxType($_POST, $Id);
        if ($result) {
            $_SESSION['dataupdate'] = 1;
            redirect(ADMIN_TAX_TYPE_LIST_LINK);
        } else {
            $_SESSION['Error'] = 1;
            redirect(ADMIN_TAX_TYPE_EDIT_FORM_LINK . $Id);
        }
    }

//**************************tax_commodity*******************//
    public function taxCommodityList() {
        $result = $this->admin_m->getTaxCommodityList();
        $this->data['result'] = $result;
        $this->data['TITLE'] = TITLE_TAX_COMMODITY_LIST;
        loadview('tax_commodity/', 'list.php', $this->data);
    }

    public function taxCommodityAddForm() {
        $result = $this->admin_m->getTaxTypeList();
        $this->data['result'] = $result;
        $this->data['TITLE'] = TITLE_TAX_COMMODITY_ADD_FORM;
        loadview('tax_commodity/', 'add.php', $this->data);
    }

    public function taxCommodityInsert() {
        $existRecord = $this->admin_m->getExistRecordByColumn($_POST['tax_commodity_id'], 'tax_commodity_id', 'tax_commodity');
        $existRecord1 = $this->admin_m->getExistRecordByColumn($_POST['tax_commodity_name'], 'tax_commodity_name', 'tax_commodity');
        if ($existRecord) {
            $_SESSION['data'] = $_POST;
            $_SESSION['existrecord'] = 1;
            redirect(ADMIN_TAX_COMMODITY_ADD_FORM_LINK);
        }
        if ($existRecord1) {
            $_SESSION['data'] = $_POST;
            $_SESSION['existrecord1'] = 1;
            redirect(ADMIN_TAX_COMMODITY_ADD_FORM_LINK);
        }
        $result = $this->admin_m->taxCommodityInsert($_POST);
        if ($result['res'] == 1 || !empty($result['id'])) {
            $_SESSION['adddata'] = 1;
            redirect(ADMIN_TAX_COMMODITY_LIST_LINK);
        } else {
            $_SESSION['data'] = $_POST;
            $_SESSION['Error'] = 1;
            redirect(ADMIN_TAX_COMMODITY_ADD_FORM_LINK);
        }
    }

    public function taxCommodityEditForm($id) {
        $result1 = $this->admin_m->getTaxTypeList();
        $this->data['result1'] = $result1;
        
        $result = $this->admin_m->getSingleRecordById($id, 'tax_commodity_id', 'tax_commodity');
        $this->data['result'] = $result;
        $this->data['TITLE'] = TITLE_TAX_COMMODITY_EDIT_FORM;
        loadview('tax_commodity/', 'edit.php', $this->data);
    }

    public function editTaxCommodity($Id) {
        $tax_commodity_name_exist = $this->admin_m->getExistRecordByColumnUk1($Id, $_POST['tax_commodity_name'], 'tax_commodity_name', 'tax_commodity');
        if ($tax_commodity_name_exist) {
            $_SESSION['tax_commodity_name_exist'] = 1;
            redirect(ADMIN_TAX_COMMODITY_EDIT_FORM_LINK.$Id);
        }
        $result = $this->admin_m->editTaxCommodity($_POST,$Id);
        if ($result) {
            $_SESSION['dataupdate'] = 1;
            redirect(ADMIN_TAX_COMMODITY_LIST_LINK);
        } else {
            $_SESSION['Error'] = 1;
            redirect(ADMIN_TAX_COMMODITY_EDIT_FORM_LINK.$Id);
        }
    }
    
    //**************************Reports*******************//
    
    
    public function reportsList($status) {
        $taxTypeList = $this->admin_m->getTaxTypeList();
        $this->data['taxTypeList'] = $taxTypeList;
        $this->data['status'] = $status;
        $this->data['TITLE'] = TITLE_TAX_REPORTS_LIST;
        loadview('reports/', 'reportsList.php', $this->data);
    }
    public function reports($taxType) {
        /*********all over reports********/
        $taxTypeInArray=array();
        $taxTypeList = $this->admin_m->getTaxTypeList();
        if($taxType=="ALL"){
            foreach ($taxTypeList as $row){
                array_push($taxTypeInArray, $row['tax_type_id']);
            }
        }else{
            $taxTypeInArray[0]=$taxType;
        } 
        $taxType = join("','",$taxTypeInArray); 
        $pending = $this->admin_m->getTaxTransactionStatus('PENDING',$taxType);
        $success = $this->admin_m->getTaxTransactionStatus('SUCCESS',$taxType);
        $failed = $this->admin_m->getTaxTransactionStatus('FAILURE',$taxType);                                
        $this->data['pending'] = $pending;
        $this->data['success'] = $success;
        $this->data['failed'] = $failed;

        /*********last five yearly reports********/         
        $yearArray=array();  
        $stsArray=array();  
        $yearDate=date("Y");
        for($i=4;$i>=0;$i--){
            $row=array();
            $yearArray[$i]=$yearDate-$i;             
            $row['pendingYearly'] = $this->admin_m->getTaxTransactionStatusYearly('PENDING',$taxType,$yearArray[$i]);  
            $row['successYearly'] = $this->admin_m->getTaxTransactionStatusYearly('SUCCESS',$taxType,$yearArray[$i]);
            $row['failedYearly'] = $this->admin_m->getTaxTransactionStatusYearly('FAILURE',$taxType,$yearArray[$i]);   
            array_push($stsArray,$row);
        }
        $this->data['yearArray'] = $yearArray;
        $this->data['stsArray'] = $stsArray;
        
        /*********yearly reports month wise********/
        $monthArray=array(); 
        for($i=1;$i<=12;$i++){
            $row=array();
            $row['pendingYearly'] = $this->admin_m->getTaxTransactionStatusMonthly('PENDING',$taxType,$i);
            $row['successYearly'] = $this->admin_m->getTaxTransactionStatusMonthly('SUCCESS',$taxType,$i);
            $row['failedYearly'] = $this->admin_m->getTaxTransactionStatusMonthly('FAILURE',$taxType,$i);
            array_push($monthArray,$row);
        }        
        $this->data['monthArray'] = $monthArray;              
        /*********daily reports current month wise********/
        $dayArray=array(); 
        $day=date('t');
        $month=date('m');
        $year=date('Y');
        for($i=1;$i<=$day;$i++){
            $row=array();
            $row['pendingYearly'] = $this->admin_m->getTaxTransactionStatusDaily('PENDING',$taxType,$i,$month,$year);
            $row['successYearly'] = $this->admin_m->getTaxTransactionStatusDaily('SUCCESS',$taxType,$i,$month,$year);
            $row['failedYearly'] = $this->admin_m->getTaxTransactionStatusDaily('FAILURE',$taxType,$i,$month,$year);
            array_push($dayArray,$row);
        }         
        $this->data['dayArray'] = $dayArray;       
        $this->data['totalday'] = $day;
//        echo '<pre>';        print_r($dayArray);        
        $this->data['TITLE'] = TITLE_TAX_TRANSACTION_REPORTS;
        loadview('reports/', 'reports.php', $this->data);
    }
    
    //**************************dealer*******************//
    public function dealerList() {
        $this->data['TITLE'] = TITLE_TAX_DEALER_LIST;
        loadview('dealer/', 'dealerlist.php', $this->data);
    }
    public function dealerListPending() {
        $this->data['TITLE'] = TITLE_TAX_DEALER_LIST_PENDING;
        loadview('dealer/', 'dealerlistpending.php', $this->data);
    }
    public function approve_dealer(){
        if(isset($_POST['tax_dealer_id'])){            
            $res = $this->admin_m->approve_student($_POST['tax_delaer_status'],$_POST['tax_dealer_id']);
            if($res){
                $data = array(
                    'suceess' => true
                );
            }
            echo json_encode($data);
        }
    }    
    public function taxDealerCredentialEditForm($id) {          
        $result = $this->admin_m->getSingleRecordById($id, 'tax_dealer_id', 'tax_dealer');
        $this->data['result'] = $result;
        $this->data['TITLE'] = TITLE_TAX_DEALER_CREDENTIAL_EDIT_FORM;
        loadview('dealer/', 'edit.php', $this->data);
    }

    public function editDealerCredential($Id) {  
        $email=$_POST['tax_dealer_email'];
        unset($_POST['tax_dealer_email']);
        $existRecord = $this->admin_m->getExistRecordByColumn($_POST['tax_dealer_code'], 'tax_dealer_code', 'tax_dealer');        
        if ($existRecord) {
            $_SESSION['data'] = $_POST;
            $_SESSION['existrecord'] = 1;
            redirect(ADMIN_TAX_DEALER_CREDENTIAL_EDIT_FORM_LINK.$Id);
        }
        $password=$_POST['tax_dealer_password'];
        $username=$_POST['tax_dealer_code'];        
                
        $_POST['tax_dealer_password']= md5($_POST['tax_dealer_password']);                       
        $result = $this->admin_m->editTaxDealerCredential($_POST,$Id);
        if ($result) { 
           
            $to = $email;
            $subject = 'Credential';
            $headers = "From: " . strip_tags('hpetax@hpie.in') . "\r\n";
            $headers .= "Reply-To: ". strip_tags('hpetax@hpie.in') . "\r\n";           
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
            $message = '<html><body>';
            $message .= "<b>username</b> : $username <br>";
            $message .= "<b>Password</b> : $password";
            $message .= '</body></html>';
            mail($to, $subject, $message, $headers);
                        
//            $mail= new SMTP_mail();
//            $mail->send_email_offers($email);
                        
            $_SESSION['dataupdate'] = 1;
            redirect(ADMIN_TAX_DEALER_LIST_LINK);
        } else {
            $_SESSION['Error'] = 1;
            redirect(ADMIN_TAX_DEALER_CREDENTIAL_EDIT_FORM_LINK.$Id);
        }
    }
    
    //**************************Employee*******************//
    public function employeeList() {
        $this->data['TITLE'] = TITLE_TAX_EMPLOYEE_LIST;
        loadview('employee/', 'empList.php', $this->data);
    }
     public function employeeAddForm() {       
        $this->data['TITLE'] = TITLE_TAX_EMPLOYEE_ADD_FORM;
        loadview('employee/', 'add.php', $this->data);
    }
     public function employeeInsert() {  
        $existRecord2 = $this->admin_m->getExistRecordByColumn($_POST['tax_employee_code'], 'tax_employee_code', 'tax_employee'); 
        $existRecord = $this->admin_m->getExistRecordByColumn($_POST['tax_employee_mobile'], 'tax_employee_mobile', 'tax_employee');
        $existRecord1 = $this->admin_m->getExistRecordByColumn($_POST['tax_employee_email'], 'tax_employee_email', 'tax_employee');
        if ($existRecord2) {
            $_SESSION['data'] = $_POST;
            $_SESSION['empCodeExist'] = 1;
            redirect(ADMIN_TAX_EMPLOYEE_ADD_FORM_LINK);
        }
         if ($existRecord) {
            $_SESSION['data'] = $_POST;
            $_SESSION['empMobileExist'] = 1;
            redirect(ADMIN_TAX_EMPLOYEE_ADD_FORM_LINK);
        }
        if ($existRecord1) {
            $_SESSION['data'] = $_POST;
            $_SESSION['empEmailExist'] = 1;
            redirect(ADMIN_TAX_EMPLOYEE_ADD_FORM_LINK);
        }
        $username=$_POST['tax_employee_code'];
        $password=$_POST['tax_employee_password'];
        $_POST['tax_employee_password']= md5($_POST['tax_employee_password']);   
        $result = $this->admin_m->employeeInsert($_POST);
        if ($result['res'] == 1 || !empty($result['id'])) {                       
            
            $to = $_POST['tax_employee_email'];
            $subject = 'Credential';
            $headers = "From: " . strip_tags('hpetax@hpie.in') . "\r\n";
            $headers .= "Reply-To: ". strip_tags('hpetax@hpie.in') . "\r\n";           
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
            $message = '<html><body>';
            $message .= "<b>username</b> : $username <br>";
            $message .= "<b>Password</b> : $password";
            $message .= '</body></html>';
            mail($to, $subject, $message, $headers);
            
            $_SESSION['adddata'] = 1;
            redirect(ADMIN_TAX_EMPLOYEE_LIST_LINK);
        } else {
            $_SESSION['data'] = $_POST;
            $_SESSION['Error'] = 1;
            redirect(ADMIN_TAX_EMPLOYEE_ADD_FORM_LINK);
        }
    }
     public function employeeEditForm($id) {        
        $result = $this->admin_m->getSingleRecordById($id, 'tax_employee_id', 'tax_employee');
        $this->data['result'] = $result;
        $this->data['TITLE'] = TITLE_TAX_EMPLOYEE_EDIT_FORM;
        loadview('employee/', 'edit.php', $this->data);
    }
       public function editEmployee($Id) {
        $code_exist = $this->admin_m->getExistRecordByColumnUk1($Id, $_POST['tax_employee_code'], 'tax_employee_code', 'tax_employee');   
        $email_exist = $this->admin_m->getExistRecordByColumnUk1($Id, $_POST['tax_employee_email'], 'tax_employee_email', 'tax_employee');
        $mobile_exist = $this->admin_m->getExistRecordByColumnUk1($Id, $_POST['tax_employee_mobile'], 'tax_employee_mobile', 'tax_employee');
         if ($code_exist) {
            $_SESSION['empCodeExist'] = 1;            
            redirect(ADMIN_TAX_EMPLOYEE_EDIT_FORM_LINK.$Id);
        }
        if ($mobile_exist) {
            $_SESSION['empMobileExist'] = 1;            
            redirect(ADMIN_TAX_EMPLOYEE_EDIT_FORM_LINK.$Id);
        }
        if ($email_exist) {
            $_SESSION['empEmailExist'] = 1;            
            redirect(ADMIN_TAX_EMPLOYEE_EDIT_FORM_LINK.$Id);
        }
        $result = $this->admin_m->editemployee($_POST,$Id);
        if ($result) {
            $_SESSION['dataupdate'] = 1;
            redirect(ADMIN_TAX_EMPLOYEE_LIST_LINK);
        } else {
            $_SESSION['Error'] = 1;
            redirect(ADMIN_TAX_EMPLOYEE_EDIT_FORM_LINK.$Id);
        }        
    }
    public function approve_employee(){
        if(isset($_POST['tax_employee_id'])){            
            $res = $this->admin_m->approve_employee($_POST['tax_employee_status'],$_POST['tax_employee_id']);
            if($res){
                $data = array(
                    'suceess' => true
                );
            }
            echo json_encode($data);
        }
    }  
}
?>