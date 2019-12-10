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
            $res = $controller->addData($params,'tax_item_queue_suresh');           
            
            if(!empty($res)){  
                //echo "============in if>>>>>>>>> <pre>"; print_r($res); exit;
                
                if ($res['success'] == 1) { 
                    //echo "============in if>>>>>>>>> <pre>"; print_r($res); exit;
                    return array(true, "Tax tax item queue inserted successfully", $data);
                } else if ($res['success'] == 0) { 
                    //echo "in else if "; exit;
                    return array(false, $res['response'], $data);
                }
                
            }    
            //echo "=========in else===>>>>>>>>> <pre>"; print_r($res); exit;
            return array(false, "Tax tax item queue process failed", $data);
        }); 

/******************************************************************************************* */
/************************************GET tax item queue****************************** */
/******************************************************************************************* */
$APP->post('get-list', false, function() use($APP) {
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
            $search_query = $VARS['search_query'];
            $result=$controller->searchChallan('tax_challan', $search_query);
            if ($result) {
                $data['Result']=$result;
                return array(true, "Data Loaded successfully", $data);
            }
            return array(false, "No Record found", $data);
        });  
        
$APP->post('get-list-by-session', false, function() use($APP) {
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
            $search_query = $VARS['search_query'];
            $result=$controller->searchChallanBySession('tax_challan', $search_query);
            
           // return array(true, json_encode($result[0]['tax_challan_id']), $data);
            
            //============================= add record in tax challan transaction queue ========================
            if(isset($VARS['is_insert']) && $VARS['is_insert'] == 1) {
                
                // $result1= $controller->getExistTransaction('tax_transaction_queue', 'tax_challan_id', $result[0]['tax_challan_id']); 
                 
                 //return array(true, "================" . json_encode($result1), $data);
                 
            $params = array(); 
            $params['tax_transaction_dept'] = "123456";
            $params['tax_challan_id'] = $result[0]['tax_challan_id'];                             
            $res = $controller->addData($params,'tax_transaction_queue'); 
            /*
            if($res==0 || !empty($res)){                
                return array(true, "tax transaction inserted successfully", $data);
            }    
            return array(false, "tax transaction insert failed", $data);
            */
}           
            //===================================================================================
            if ($result) {
                $data['Result']=$result;
                return array(true, "Data Loaded successfully", $data);
            }
            return array(false, "No Record found", $data);
        }); 
        
/* * ***************************************************************************************** */
/* * ************************************************Delete tax item queue****************************** */
/* * ***************************************************************************************** */
$APP->post('delete-tax-item-queue', false, function() use($APP) {
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
            //return DEFAULT_DELETE_METHOD('tax_item_queue_suresh',$ID, 'tax_item_id');
            $data = array('tax_item_id' => $ID);
            
           // return array(false, "No Record found", $data);
            
            $result=$controller->deleteSingleRecordById('tax_item_queue_suresh',$ID, 'tax_item_id');
            if ($result) {
                $data['Result']=$result;
                return array(true, "Data deleted successfully", $data);
            }
            return array(false, "No Record found", $data);
        });
        
/* * ****************************************************************************************** */
/* * ************************************Update tax item queue************************************ */
/* * ****************************************************************************************** */
$APP->post('update-tax-item-queue', false, function() {
            $data = array();
            //return array(false, "Tax tax item queue process failed", $data);
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
            $params['tax_item_id'] = $VARS['tax_item_id'];
            $params['tax_item_queue_id'] = $VARS['tax_item_queue_id'];
            
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
            //return DEFAULT_PUT_METHOD('tax_item_queue_suresh',$params,$ID,false,"tax_item_id");
            
            $res = $controller->updateData($params,'tax_item_queue_suresh', 'tax_item_id', $ID);            
            
            if(!empty($res)){  
                //echo "============in if>>>>>>>>> <pre>"; print_r($res); exit;
                
                if ($res['success'] == 1) { 
                    //echo "============in if>>>>>>>>> <pre>"; print_r($res); exit;
                    return array(true, "Tax item queue updated successfully", $data);
                } else if ($res['success'] == 0) { 
                    //echo "in else if "; exit;
                    return array(false, $res['response'], $data);
                }
                
            }    
            //echo "=========in else===>>>>>>>>> <pre>"; print_r($res); exit;
            return array(false, "Tax tax item queue process failed", $data);
        }); 
        
        /******************************************************************************************* */
/************************************GET all tax item queue****************************** */
/******************************************************************************************* */
$APP->post('list-tax-item-queue', false, function() use($APP) {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
            
            $VARS=json_decode(file_get_contents("php://input"),true);
            
            //issetID();            
            verifyRequiredParams(array('token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }                                  
            $result=$controller->getTaxQueueList('tax_item_queue_suresh', $VARS['queue_session']);
            if ($result) {
                $data['Result']=$result;
                return array(true, "Data Loaded successfully", $data);
            }
            return array(false, "No Record found", $data);
        });
        
$APP->post('get-challan-data', false, function() use($APP) {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
            
            $VARS=json_decode(file_get_contents("php://input"),true);
            
            //issetID();            
            verifyRequiredParams(array('token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }                                  
            $result=$controller->getChallanData('tax_item_queue_suresh', $VARS['queue_session']);
            if ($result) {
                
                
                $result[0]["challan_purpose"] = "Default Purpose";
                $result[0]["challan_code"] = "Default Code";
                
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