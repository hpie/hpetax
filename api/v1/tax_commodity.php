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
/* * ************************************************insert data in tax_commodity ****************************** */
/* * ***************************************************************************************** */
$APP->post('add-commodity', false, function() use($APP) {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
              
            $VARS=json_decode(file_get_contents("php://input"),true);
//                        
//            $APP->generateApiKey();
//             promocode();                        
            verifyRequiredParams(array('commodity_id','commodity_name','commodity_description','commodity_rate','commodity_rate_unit','commodity_unit_measure','commodity_taxcalculation','commodity_isdistancedependent','commodity_status','type_id','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }            
           // print_r($VARS);die;
            $params = array();            
            $params['tax_commodity_id'] = $VARS['commodity_id'];
            $params['tax_commodity_name'] = $VARS['commodity_name'];
            $params['tax_commodity_description'] = $VARS['commodity_description'];
            $params['tax_commodity_rate'] = $VARS['commodity_rate'];           
            $params['tax_commodity_rate_unit'] =$VARS['commodity_rate_unit'];                 
            $params['tax_commodity_unit_measure'] =$VARS['commodity_unit_measure']; 
            $params['tax_commodity_taxcalculation'] = $VARS['commodity_taxcalculation'];
            $params['tax_commodity_isdistancedependent'] = $VARS['commodity_isdistancedependent'];
            $params['tax_commodity_status'] = $VARS['commodity_status'];
            $params['tax_type_id'] =   $VARS['type_id'];                  
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                           
            $res = $controller->addData($params,'tax_commodity');              
            if($res==0 || !empty($res)){                
                return array(true, "Tax commodity inserted successfully", $data);
            }                    
            return array(false, "Tax commodity process failed", $data);
        }); 

/******************************************************************************************* */
/************************************GET Tax commodity****************************** */
/******************************************************************************************* */
$APP->get('get-commodity', false, function() use($APP) {
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
            $result=$controller->getSingleRecordById('tax_commodity',$ID);
            if ($result) {
                $data['Result']=$result;
                return array(true, "Data Loaded successfully", $data);
            }
            return array(false, "No Record found", $data);
        });  
        
/* * ***************************************************************************************** */
/* * ************************************************Delete Tax commodity****************************** */
/* * ***************************************************************************************** */
$APP->delete('delete-commodity', false, function() use($APP) {
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
            return DEFAULT_DELETE_METHOD('tax_commodity',$ID);
        });
        
/* * ****************************************************************************************** */
/* * ************************************Update Tax commodity************************************ */
/* * ****************************************************************************************** */
$APP->put('update-commodity', false, function() {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;            
            $VARS=json_decode(file_get_contents("php://input"),true);            
            issetID(); 
            
            verifyRequiredParams(array('commodity_name','commodity_description','commodity_rate','commodity_rate_unit','commodity_unit_measure','commodity_taxcalculation','commodity_isdistancedependent','commodity_status','type_id','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }            
           // print_r($VARS);die;
            $params = array();                        
            $params['tax_commodity_name'] = $VARS['commodity_name'];
            $params['tax_commodity_description'] = $VARS['commodity_description'];
            $params['tax_commodity_rate'] = $VARS['commodity_rate'];           
            $params['tax_commodity_rate_unit'] =$VARS['commodity_rate_unit'];                 
            $params['tax_commodity_unit_measure'] =$VARS['commodity_unit_measure']; 
            $params['tax_commodity_taxcalculation'] = $VARS['commodity_taxcalculation'];
            $params['tax_commodity_isdistancedependent'] = $VARS['commodity_isdistancedependent'];
            $params['tax_commodity_status'] = $VARS['commodity_status'];
            $params['tax_type_id'] =   $VARS['type_id'];                  
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                     
            return DEFAULT_PUT_METHOD('tax_commodity',$params,$ID,false,"tax_commodity_id");
        });                        
$APP->stop();
/* * *******
 * * finish all the function working
 * ***** */
?>