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
/* * ************************************************insert data in tax item queue ****************************** */
/* * ***************************************************************************************** */
$APP->post('add-tax-item-queue', false, function() use($APP) {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
              
            $VARS=json_decode(file_get_contents("php://input"),true);
//                        
//            $APP->generateApiKey();
//             promocode();                        
            verifyRequiredParams(array('item_queue_id','queue_session','type_name','commodity_name','vehicle_number','item_weight','item_weight_units','item_quantity','item_quantity_units','item_source_location','item_destination_location','item_distanceinkm','item_tax_amount','item_status','commodity_id','type_id','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }                          
            // print_r($VARS);die;
            $params = array();            
            $params['tax_item_queue_id'] = $VARS['item_queue_id'];
            $params['tax_queue_session'] = $VARS['queue_session'];
            $params['tax_type_name'] = $VARS['type_name'];
            $params['tax_commodity_name'] = $VARS['commodity_name'];           
            $params['tax_vehicle_number'] =$VARS['vehicle_number'];                 
            $params['tax_item_weight'] =$VARS['item_weight']; 
            $params['tax_item_weight_units'] = $VARS['item_weight_units'];
            $params['tax_item_quantity'] = $VARS['item_quantity'];
            $params['tax_item_quantity_units'] = $VARS['item_quantity_units'];
            $params['tax_item_source_location'] =   $VARS['item_source_location'];            
            $params['tax_item_destination_location'] =   $VARS['item_destination_location'];
            $params['tax_item_distanceinkm'] =   $VARS['item_distanceinkm'];
            $params['tax_item_tax_amount'] =   $VARS['item_tax_amount'];
            $params['tax_item_status'] =   $VARS['item_status'];
            $params['tax_commodity_id'] =   $VARS['commodity_id'];
            $params['tax_type_id'] =   $VARS['type_id'];
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                           
            $res = $controller->addData($params,'tax_item_queue');              
            if($res==0 || !empty($res)){                
                return array(true, "Tax tax item queue inserted successfully", $data);
            }                    
            return array(false, "Tax tax item queue process failed", $data);
        }); 

/******************************************************************************************* */
/************************************GET tax item queue****************************** */
/******************************************************************************************* */
$APP->get('get-tax-item-queue', false, function() use($APP) {
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
            $result=$controller->getSingleRecordById('tax_item_queue',$ID);
            if ($result) {
                $data['Result']=$result;
                return array(true, "Data Loaded successfully", $data);
            }
            return array(false, "No Record found", $data);
        });  
        
/* * ***************************************************************************************** */
/* * ************************************************Delete tax item queue****************************** */
/* * ***************************************************************************************** */
$APP->delete('delete-tax-item-queue', false, function() use($APP) {
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
            return DEFAULT_DELETE_METHOD('tax_item_queue',$ID);
        });
        
/* * ****************************************************************************************** */
/* * ************************************Update tax item queue************************************ */
/* * ****************************************************************************************** */
$APP->put('update-tax-item-queue', false, function() {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;            
            $VARS=json_decode(file_get_contents("php://input"),true);            
            issetID(); 
            
       verifyRequiredParams(array('queue_session','type_name','commodity_name','vehicle_number','item_weight','item_weight_units','item_quantity','item_quantity_units','item_source_location','item_destination_location','item_distanceinkm','item_tax_amount','item_status','commodity_id','type_id','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }                          
           // print_r($VARS);die;
            $params = array();                        
            $params['tax_queue_session'] = $VARS['queue_session'];
            $params['tax_type_name'] = $VARS['type_name'];
            $params['tax_commodity_name'] = $VARS['commodity_name'];           
            $params['tax_vehicle_number'] =$VARS['vehicle_number'];                 
            $params['tax_item_weight'] =$VARS['item_weight']; 
            $params['tax_item_weight_units'] = $VARS['item_weight_units'];
            $params['tax_item_quantity'] = $VARS['item_quantity'];
            $params['tax_item_quantity_units'] = $VARS['item_quantity_units'];
            $params['tax_item_source_location'] =   $VARS['item_source_location'];            
            $params['tax_item_destination_location'] =   $VARS['item_destination_location'];
            $params['tax_item_distanceinkm'] =   $VARS['item_distanceinkm'];
            $params['tax_item_tax_amount'] =   $VARS['item_tax_amount'];
            $params['tax_item_status'] =   $VARS['item_status'];
            $params['tax_commodity_id'] =   $VARS['commodity_id'];
            $params['tax_type_id'] =   $VARS['type_id'];
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                      
            return DEFAULT_PUT_METHOD('tax_item_queue',$params,$ID,false,"tax_item_queue_id");
        });    
$APP->stop();
/* * *******
 * * finish all the function working
 * ***** */
?>