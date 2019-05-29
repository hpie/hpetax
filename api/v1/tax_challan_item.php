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
/* * ************************************************insert data in tax_challan_item ****************************** */
/* * ***************************************************************************************** */
$APP->post('add-tax-challan-item', false, function() use($APP) {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
              
            $VARS=json_decode(file_get_contents("php://input"),true);
//                        
//            $APP->generateApiKey();
//             promocode();                        
            verifyRequiredParams(array('challan_item_id', 'type_name','commodity_name','vehicle_number','item_weight','item_weight_units','item_quantity_units','item_source_location','item_destination_location','item_distanceinkm','item_tax_amount','item_status','challan_id','commodity_id','type_code','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }            
           // print_r($VARS);die;
            $params = array();            
            $params['tax_challan_item_id'] = $VARS['challan_item_id'];
            $params['tax_type_name'] = $VARS['type_name'];
            $params['tax_commodity_name'] = $VARS['commodity_name'];
            $params['tax_vehicle_number'] = $VARS['vehicle_number'];           
            $params['tax_item_weight'] =$VARS['item_weight'];                 
            $params['tax_item_weight_units'] =$VARS['item_weight_units']; 
            $params['tax_item_quantity_units'] = $VARS['item_quantity_units'];
            $params['tax_item_source_location'] = $VARS['item_source_location'];
            $params['tax_item_destination_location'] = $VARS['item_destination_location'];
            $params['tax_item_distanceinkm'] =   $VARS['item_distanceinkm'];          
            $params['tax_item_tax_amount'] = $VARS['item_tax_amount'];
            $params['tax_item_status'] = $VARS['item_status'];
            $params['tax_challan_id'] = $VARS['challan_id'];            
            $params['tax_commodity_id'] = $VARS['commodity_id'];           
            $params['tax_type_code'] = $VARS['type_code'];
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                           
            $res = $controller->addData($params,'tax_challan_item');              
            if($res==0 || !empty($res)){                
                return array(true, "Tax challan item inserted successfully", $data);
            }                    
            return array(false, "Tax challan item process failed", $data);
        }); 

/******************************************************************************************* */
/************************************GET Tax challan item****************************** */
/******************************************************************************************* */
$APP->get('get-tax-challan-item', false, function() use($APP) {
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
            $result=$controller->getSingleRecordById('tax_challan_item',$ID);
            if ($result) {
                $data['Result']=$result;
                return array(true, "Data Loaded successfully", $data);
            }
            return array(false, "No Record found", $data);
        });  
        
/* * ***************************************************************************************** */
/* * ************************************************Delete Tax challan item****************************** */
/* * ***************************************************************************************** */
$APP->delete('delete-tax-challan-item', false, function() use($APP) {
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
            return DEFAULT_DELETE_METHOD('tax_challan_item',$ID);
        });
        
/* * ****************************************************************************************** */
/* * ************************************Update Tax challan Item************************************ */
/* * ****************************************************************************************** */
$APP->put('update-tax-challan-item', false, function() {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;            
            $VARS=json_decode(file_get_contents("php://input"),true);            
            issetID(); 
            
            verifyRequiredParams(array('challan_item_id', 'type_name','commodity_name','vehicle_number','item_weight','item_weight_units','item_quantity_units','item_source_location','item_destination_location','item_distanceinkm','item_tax_amount','item_status','challan_id','commodity_id','type_code','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }            
           // print_r($VARS);die;
            $params = array();            
            $params['tax_challan_item_id'] = $VARS['challan_item_id'];
            $params['tax_type_name'] = $VARS['type_name'];
            $params['tax_commodity_name'] = $VARS['commodity_name'];
            $params['tax_vehicle_number'] = $VARS['vehicle_number'];           
            $params['tax_item_weight'] =$VARS['item_weight'];                 
            $params['tax_item_weight_units'] =$VARS['item_weight_units']; 
            $params['tax_item_quantity_units'] = $VARS['item_quantity_units'];
            $params['tax_item_source_location'] = $VARS['item_source_location'];
            $params['tax_item_destination_location'] = $VARS['item_destination_location'];
            $params['tax_item_distanceinkm'] =   $VARS['item_distanceinkm'];          
            $params['tax_item_tax_amount'] = $VARS['item_tax_amount'];
            $params['tax_item_status'] = $VARS['item_status'];
            $params['tax_challan_id'] = $VARS['challan_id'];            
            $params['tax_commodity_id'] = $VARS['commodity_id'];           
            $params['tax_type_code'] = $VARS['type_code'];
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                     
            return DEFAULT_PUT_METHOD('tax_challan_item',$params,$ID,false,"tax_challan_item_id");
        });                       
$APP->stop();
/* * *******
 * * finish all the function working
 * ***** */
?>