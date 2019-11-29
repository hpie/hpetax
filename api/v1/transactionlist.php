<?php
/*
 * ---------------------------------------------------------------
 * System initialization
 * ---------------------------------------------------------------
 */

include_once("../config/init.php");
/* * *******
 * * Configure to use all the function from system 
 * * (1) REQUESTED action method name
 * * (2) Function name
 * * (3) use($APP) you can use to access data from my_base
 * * global $USERID;
 * * global $controller;
 * * global $VARS;
 * * global $ID;
 * * X-Authorization
 * ******* */

/* ################################# START REST API FROM HERE ############################ */
        
  
$APP->get('hpetax-payment', false, function() use($APP) {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;             
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";             
            $url_components = parse_url(urldecode($actual_link));
            parse_str($url_components['query'], $params);
            if(empty($params['challan_id']) || empty($params['depositorname']) || empty($params['amount']) || empty($params['token']) || empty($params['device'])){
                $message = 'Required field(s) is missing or empty';
                $APP->stop(array(false, $message, NULL));
            }
            if (!in_array($params['device'], array('iphone', 'android','web'))) {
                return array(false, "device name is invalid", $data);
            }          
            $challan_amount=$params['amount'];
            $depositors_name=$params['depositorname'];
            $challan_id=$params['challan_id'];
            $subId= subId(); 
            $refnum= subId();
            
            if($params['device']=='web'){
                $returnURL=BASE_URL."payment/updateTreasuryPayment/".$challan_id;
            }else{            
                $returnURL=BASE_URL_API."transactionlist/return-hpetax-payment/".$challan_id;
            }
            $payment = new TreasuryPayment(114, "HIMKOSH114", "ETO", "0039-00-102-01", "CTO00-012","https://himkosh.hp.nic.in/echallan/WebPages/wrfApplicationRequest.aspx","$returnURL");
            $mString = $payment->constructRequestedString($challan_amount,$refnum,$subId,"$depositors_name");
            $encryptedString = $payment->genEncryptedString($mString);
            $deCryptedString = $payment->genDecryptedString($encryptedString);                         
            if($encryptedString){
                $data['Result']=$encryptedString; 
                return array(true, "Data Loaded successfully", $data);
            }                    
            return array(false, "No Record found", $data);
        });
        
$APP->post('return-hpetax-payment', false, function() use($APP) {                            
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
            $VARS=json_decode(file_get_contents("php://input"),true);
            if(isset($VARS['encdata'])){
                $_POST['encdata']=$VARS['encdata'];
            }                        
//            $_POST['encdata']="MCdqKo8jYmuK0gICr/jtvuDEDJ/ZGp4Nhm6iMsOG/W5vVz9YSjxsLVgFk/iPAcDxJTtiykE2v04fkdBfBQYBAhvua05u4w6Vg+Y5g2CTX6HDgRKgQP1pD5T6SWT3u04DMykrkK+88l3exluHY4w4nrY+DRbIGsc+UWx+tk7Jw2VF8uynfCwZb4HJ1M/xJ4lOFBUHEQQRCkK7BCx7BHRtMaLXdvLANqZC9IN3EKXpwjFarpSoU67klqYP6Fv+AQQP0Bec0ryp+/IleenDiv73xA== ";
//            $_POST['encdata']="g3KEGDyNOj2cJUgTaqVxfIp5CWv73lYzJHtRrklZszD82JFcGX/GvX2T78v22bWY6dgY6jMRLOBJcx+4QGPhfpmz/iiT8DMsNTfT/q/PmBHoMkVDsCdWheXLqVFrSbENLH16z3EDgF3K8AMbsHYjhq2HdS2xWa+NZI5cSZR+g/Em6BmR57vTL/BuUfFBLkv+0RFvy495OCcyryctIeDWL91hCxfUNPHUGRIUUgxOuu5IuO/JwmiLGXUE0zGF+fI1lsGKqXhAJ7DrYMJAVj2ZYw==";
            if(empty($_POST['encdata'])){
                $message = 'Required field(s) is missing or empty';
                $APP->stop(array(false, $message, NULL));
            }                                    
            $encryptedString=$_POST['encdata'];  
            $payment = new TreasuryPayment();
            $deCryptedString = $payment->genDecryptedString($encryptedString);
            $params=explode("|", $deCryptedString);
            $resultArray=array();
            foreach ($params as $row){
                $resultParams=explode('=', $row);
                $resultArray[$resultParams[0]]=$resultParams[1];                
            }
            if($resultArray['StatusCd']==0){
                $resultArray['Status']="FAILURE";
            }
            if($resultArray['StatusCd']==1){
                $resultArray['Status']="SUCCESS";
            }
            if($resultArray['StatusCd']==2){
                $resultArray['Status']="PENDING";
            }                                               
            $insertParams=array();
            $insertParams['tax_challan_himgrn']=$resultArray['EchTxnId'];
            $insertParams['tax_challan_brn']=$resultArray['BankCIN'];            
            $insertParams['tax_transaction_status']=$resultArray['Status'];
            $insertParams['tax_challan_himgrn']=$resultArray['AppRefNo'];
            $insertParams['tax_payment_amount']=$resultArray['Amount'];
            $insertParams['tax_payment_dt']=$resultArray['Payment_date'];
            $insertParams['tax_transaction_dept']=$resultArray['DeptRefNo'];
            $insertParams['tax_payment_bank']=$resultArray['BankName'];
//          $insertParams['tax_challan_himgrn']=$resultArray['StatusCd'];
            $insertParams['tax_challan_id']=$ID;
            $insertParams['created_by'] ="SYSTEM";  
            $insertParams['modified_by'] = "SYSTEM";              
            $res = $controller->addUpdateTransaction($insertParams,'tax_transaction_queue');             
            if($res){
                $taxChallanArray=array();
                $taxChallanArray['tax_transaction_no']=$res;
                $taxChallanArray['tax_transaction_status']=$resultArray['Status'];
                DEFAULT_PUT_METHOD('tax_challan',$insertParams,$ID,false,"tax_challan_id");
                $data['Result']=$ID;
                return array(true, "Transaction added successfully", $data);
            }
            if($res==FALSE){
                $taxChallanArray=array();                
                $taxChallanArray['tax_transaction_status']=$resultArray['Status'];
                DEFAULT_PUT_METHOD('tax_challan',$insertParams,$ID,false,"tax_challan_id");
                return DEFAULT_PUT_METHOD('tax_transaction_queue',$insertParams,$ID,false,"tax_challan_id");
            }
            return array(false, "Transaction process failed", $data);
        });        
//$APP->post('hpetax-payment', false, function() use($APP) {
//            $data = array();
//            global $USERID;
//            global $controller;
//            global $VARS;
//            global $ID;              
//            $VARS=json_decode(file_get_contents("php://input"),true);            
//            verifyRequiredParams(array('challan_id','depositorname','amount','token', 'device'));
//            if (!in_array($VARS['device'], array('iphone', 'android'))) {
//                return array(false, "device name is invalid", $data);
//            }          
//            $challan_amount=$VARS['amount'];
//            $depositors_name=$VARS['depositorname'];
//            $challan_id=$VARS['challan_id'];
//            $subId= subId(); 
//            $refnum= subId();
//            $payment = new TreasuryPayment(114, "HIMKOSH114", "ETO", "0039-00-102-01", "CTO00-012","https://himkosh.hp.nic.in/echallan/WebPages/wrfApplicationRequest.aspx","https://hpetax.hpie.in/payment/updateTreasuryPayment/$challan_id");
//            $mString = $payment->constructRequestedString($challan_amount,$refnum,$subId,"$depositors_name");
//            $encryptedString = $payment->genEncryptedString($mString);
//            $deCryptedString = $payment->genDecryptedString($encryptedString);                         
//            if($encryptedString){
//                $data['Result']=$encryptedString; 
//                return array(true, "Data Loaded successfully", $data);
//            }                    
//            return array(false, "No Record found", $data);
//        });   
/* * ***************************************************************************************** */
/* * ****************************************************************************** */
/* * ***************************************************************************************** */
$APP->post('get-transaction-list', false, function() use($APP) {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;              
            $VARS=json_decode(file_get_contents("php://input"),true);                   
            verifyRequiredParams(array('token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }
            $from_date='';
            $to_date='';
            if(!empty($VARS['from_date']) && !empty($VARS['to_date'])){
                $from_date=dateFormatterMysql($VARS['from_date']);
                $to_date=dateFormatterMysql($VARS['to_date']);
            }
            $params = array();            
            $params['tax_transaction_queue_id'] = $VARS['transaction_no'];
            $params['tax_transaction_status'] = $VARS['transaction_status'];
            $params['tax_payment_dt_from'] = $from_date;
            $params['tax_payment_dt_to'] = $to_date;
            $result= $controller->getTransactionListSearch($params);              
            if($result){
                $data['Result']=$result;
                return array(true, "Data Loaded successfully", $data);
            }                    
            return array(false, "No Record found", $data);
        });     
$APP->stop();
/* * *******
 * * finish all the function working
 * ***** */
?>