<?PHP

class Model extends Models {

    public function __construct() {
        parent::__construct();
    }

//*******************************//  
//*** Common insert function with table name     *****//
//*****************************//
    public function addData($params, $table) {      
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO $table($columns) VALUES($values)";
            //$id = $this->query->insert($q);
            $response = $this->query->insert($q);
            
            return $response;
            //echo "==========".json_encode($response)."==>>>>>>>>>"; exit;
           // echo "============>>>>>>>>> <pre>"; print_r($response); exit;
            if ($response['success'] == 1) { 
                //echo "in if ".json_encode($response); exit;
                //$response['id'] = $id;
                return $response['response'];
            }
        }
                //echo "in last ".json_encode($response); exit;
        return false;
    }
    
    public function updateData($params, $table, $update_key, $update_value) {      
        $columns = $this->updateMaker($params);
        
        if ($columns) {
            $q = "UPDATE " . $table . " SET $columns WHERE $update_key = '".$update_value."'";
            
           // $id = $this->query->update($q);            
            //if ($id) {      
            
            $response = $this->query->update($q);  
            return $response;
           // echo "==========".json_encode($response)."==>>>>>>>>>"; exit;
            if ($response['success']) {               
                return $response['response'];
            }
        }
        return false;
    }
    
//*******************************//  
//***Get Single record by id*****//
//*****************************// 
    public function getSingleRecordById($table,$id) {
        $field_id=$table.'_id';
        $query = "SELECT * FROM $table WHERE $field_id='$id'";
        $result = $this->query->select($query);
        if ($row = $this->query->fetch($result))
            return $row;
        return false;
    }
    
    public function getSingleRecordByParameter($table,$id, $column) {
        
        $query = "SELECT * FROM $table WHERE $column='$id'";
        $result = $this->query->select($query);
        if ($row = $this->query->fetch($result))
            return $row;
        return false;
    }
    
//*******************************//  
//***Get Single record by username and password*****//
//*****************************// 
    public function login($params) {
        
        if($params["user_type"] == "1") {
            $query = "SELECT * FROM tax_dealer WHERE tax_dealer_email ='".$params['username']."' AND tax_dealer_password = '".$params['password']."'";
        } else {
             $query = "SELECT * FROM tax_employee WHERE tax_employee_email ='".$params['username']."' AND tax_employee_password = '".$params['password']."'";
        }
        
        $result = $this->query->select($query);
        if ($row = $this->query->fetch($result))
            return $row;
        return false;
    }
    
    
//*******************************//  
//***Delete Single record by id*****//
//*****************************// 
    public function deleteSingleRecordById($table,$id, $id_field_name = "") {
        if($id_field_name == "") {
        $id_field_name=$table.'_id';
        }
         $result = $this->query->delete("DELETE FROM $table WHERE $id_field_name='$id'");
        if ($result)
            return true;

        return false;
    }
    
        
//*******************************//  
//***Get all record by*****//
//*****************************// 
    public function getTaxTypeAll($table) {        
        $query = "SELECT * FROM $table";
        $result = $this->query->select($query);
        if ($data = $this->query->fetch_array($result))
            return $data;
        return false;
    }
    
 //*******************************//  
//***Get tax queue list*****//
//*****************************//    
    public function getTaxQueueList($table, $session) {        
        //$query = "SELECT * FROM $table";
        
       $query = "SELECT * FROM $table WHERE tax_queue_session = '".$session."'";
        $result = $this->query->select($query);
        if ($data = $this->query->fetch_array($result))
            return $data;
        return false;
    }
    
    
//*******************************//  
//***Get commodity list based on tax type*****//
//*****************************// 
    public function getCommodityList($table,$taxId) {        
        $query = "SELECT * FROM $table WHERE tax_type_id='".$taxId."'";
        $result = $this->query->select($query);
        if ($data = $this->query->fetch_array($result))
            return $data;
        return false;
    }    

//*******************************//  
//***Get transaction list by search*****//
//*****************************// 
    public function getTransactionListSearch($params) {
        $transactionNo=$params['tax_transaction_queue_id'];
        $transactionStatus=$params['tax_transaction_status'];
        $from_dt=$params['tax_payment_dt_from'];
        $to_dt=$params['tax_payment_dt_to'];
        
        $query="SELECT * FROM tax_transaction_queue ";
                
        if(!empty($transactionNo) || !empty($transactionStatus) || (!empty($from_dt) && !empty($to_dt)))
        {
            $query.=" WHERE ";
            if(!empty($transactionNo)){
                $query.=" tax_transaction_queue_id='$transactionNo' ";
            }
            if(!empty($transactionStatus)){
                if(!empty($transactionNo)){
                    $query.=" AND ";
                }
                $query.=" tax_transaction_status='$transactionStatus' ";
            }
            if((!empty($from_dt) && !empty($to_dt))){
                    
                if(!empty($transactionNo) || !empty($transactionStatus)){
                    $query.=" AND ";
                }
                $query.=" (tax_payment_dt BETWEEN '$from_dt' AND '$to_dt') ";                
            }
        }                       
        $result = $this->query->select($query);
        if ($data = $this->query->fetch_array($result))
            return $data;
        return false;
    } 
    
    public function addChallanItems($params, $table, $challan_id) {      
        $query="SELECT * FROM ".$table." WHERE tax_queue_session = '".$params['queue_session']."'";
        
        //$query="SELECT * FROM ".$table;
                
        $result = $this->query->select($query);
        if ($data = $this->query->fetch_array($result)) {
            if(count($data) > 0) {
                array_walk($data, array($this, 'insertChallanItems'), $challan_id);
            }
            return $data;
        }
        return false;                       
        
    }
    
    public function insertChallanItems($VARS,$key, $challan_id) {   

            $params = array();            
            $params['tax_challan_item_id'] = $VARS['tax_item_id'];
            $params['tax_type_name'] = $VARS['tax_type_name'];
            $params['tax_commodity_name'] = $VARS['tax_commodity_name'];
            $params['tax_vehicle_number'] = $VARS['tax_vehicle_number'];           
            $params['tax_item_weight'] =$VARS['tax_item_weight'];                 
            $params['tax_item_weight_units'] =$VARS['tax_item_weight_units']; 
            $params['tax_item_quantity_units'] = $VARS['tax_item_quantity_units'];
            $params['tax_item_source_location'] = $VARS['tax_item_source_location'];
            $params['tax_item_destination_location'] = $VARS['tax_item_destination_location'];
            $params['tax_item_distanceinkm'] =   $VARS['tax_item_distanceinkm'];          
            $params['tax_item_tax_amount'] = $VARS['tax_item_tax_amount'];
            //$params['tax_item_status'] = $VARS['item_status'];
            $params['tax_challan_id'] = $challan_id;            
            $params['tax_commodity_id'] = $VARS['tax_commodity_id'];           
            $params['tax_type_code'] = $VARS['tax_type_id'];
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                           
            $res = $this->addData($params,'tax_challan_item'); 
            
            if($res) {
                $this->deleteSingleRecordById("tax_item_queue_suresh",$VARS['tax_item_id'], "tax_item_id");
            }
    }
    
    public function generate_challan_id() {
        
        //$query = "INSERT INTO FROM tax_challan SET";
    }
    
     //*******************************//  
//***Get tax queue list*****//
//*****************************//    
    public function getChallanData($table, $session) {        
        //$query = "SELECT tax_type_id, tax_type_name, SUM(tax_item_tax_amount) as tax_amount FROM $table";
        
       // $query = "SELECT * FROM $table WHERE tax_queue_session = '".$session."'
       
       $query = "SELECT tax_type_id, tax_type_name, SUM(tax_item_tax_amount) as tax_amount FROM $table WHERE tax_queue_session = '".$session."'";
       
        $result = $this->query->select($query);
        if ($data = $this->query->fetch_array($result))
            return $data;
        return false;
    }
    
    //*******************************//  
//***Get challan search results*****//
//*****************************//    
    public function searchChallan($table, $search_query) {        
        
       $query = "SELECT * FROM $table WHERE tax_depositors_name LIKE '%".$search_query."%'";
       
        $result = $this->query->select($query);
        if ($data = $this->query->fetch_array($result))
            return $data;
        return false;
    }
    
    //*******************************//  
//***Get challan search results by session*****//
//*****************************//    
    public function searchChallanBySession($table, $search_query) {        
        
       $query = "SELECT * FROM $table WHERE tax_challan_id ='".$search_query."'";
       
        $result = $this->query->select($query);
        if ($data = $this->query->fetch_array($result))
            return $data;
        return false;
    }
    
    public function getExistTransaction($table_name, $table_id_name, $id) {        
        $result = $this->query->select("SELECT * FROM $table_name WHERE $table_id_name = '$id'");
		if($row = $this->query->fetch($result))
			return true;
		return false;
    }

	//*******************************//  
	//***Get commodity list based on tax type*****//
	//*****************************// 
    public function getLocationDDO() {        
        $query =  "SELECT * FROM tax_location_ddo";
        $result = $this->query->select($query);
        if ($data = $this->query->fetch_array($result))
            return $data;
        return false;
    } 

	//*******************************//  
	//***Get commodity list based on tax type*****//
	//*****************************// 
    public function receiptHead() {        
        $query = "SELECT * FROM tax_revenue_receipt";
        $result = $this->query->select($query);
        if ($data = $this->query->fetch_array($result))
            return $data;
        return false;
    } 
    
}

?>