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
/* * ***************************************************************************************** */
/* * ************************************************insert data in  tax_type ****************************** */
/* * ***************************************************************************************** */
$APP->post('add-tax-type', false, function() use($APP) {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
              
            $VARS=json_decode(file_get_contents("php://input"),true);
//                        
//            $APP->generateApiKey();
//             promocode();                        
            verifyRequiredParams(array('type_id','type_name','type_description','type_status','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }                          
            // print_r($VARS);die;
            $params = array();            
            $params['tax_type_id'] = $VARS['type_id'];
            $params['tax_type_name'] = $VARS['type_name'];
            $params['tax_type_description'] = $VARS['type_description'];
            $params['tax_type_status'] = $VARS['type_status'];                                           
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                           
            $res = $controller->addData($params,'tax_type');              
            if($res==0 || !empty($res)){                
                return array(true, "Tax tax type inserted successfully", $data);
            }                    
            return array(false, "Tax tax type process failed", $data);
        }); 

/******************************************************************************************* */
/************************************GET tax_type****************************** */
/******************************************************************************************* */
$APP->post('get-tax-type', false, function() use($APP) {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
            
            $VARS=json_decode(file_get_contents("php://input"),true);            
            issetID();            
            verifyRequiredParams(array('token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }                                  
            $result=$controller->getSingleRecordById('tax_type',$ID);
            if ($result) {
                $data['Result']=$result;
                return array(true, "Data Loaded successfully", $data);
            }
            return array(false, "No Record found", $data);
        });  
        
/* * ***************************************************************************************** */
/* * ************************************************Delete tax_type****************************** */
/* * ***************************************************************************************** */
$APP->delete('delete-tax-type', false, function() use($APP) {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
            
            $VARS=json_decode(file_get_contents("php://input"),true);
            
            issetID();
            verifyRequiredParams(array('token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            } 
            return DEFAULT_DELETE_METHOD('tax_type',$ID);
        });
        
/* * ****************************************************************************************** */
/* * ************************************Update tax_type************************************ */
/* * ****************************************************************************************** */
$APP->put('update-tax-type', false, function() {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;            
            $VARS=json_decode(file_get_contents("php://input"),true);            
            issetID(); 
            
            verifyRequiredParams(array('type_name','type_description','type_status','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }                          
            // print_r($VARS);die;
            $params = array();            
           
            $params['tax_type_name'] = $VARS['type_name'];
            $params['tax_type_description'] = $VARS['type_description'];
            $params['tax_type_status'] = $VARS['type_status'];                                           
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                        
            return DEFAULT_PUT_METHOD('tax_type',$params,$ID,false,"tax_type_id");
        });     
$APP->stop();
/* * *******
 * * finish all the function working
 * ***** */
?>