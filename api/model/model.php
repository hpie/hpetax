<?PHP

class Model extends Models {

    public function __construct() {
        parent::__construct();
    }

    
    public function getExistTransaction($id) {        
        $res=$this->checkRecord('tax_transaction_queue','tax_challan_id',"$id");        
        if ($res)
            return true;
        return false;
    }
    public function addTransaction($params, $table) {      
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO $table($columns) VALUES($values)";
            $id = $this->query->insert($q);              
            if ($id) {               
                return $id;
            }
        }
        return false;
    }   
//*******************************//  
//*** Common insert function with table name     *****//
//*****************************//
    public function addData($params, $table) {      
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO $table($columns) VALUES($values)";
            $id = $this->query->insert($q);              
            if ($id) {               
                return $id;
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
//***Get commodity list based on tax type*****//
//*****************************// 
    public function getCommodityList($table,$taxId) {        
        $query = "SELECT tax_commodity_id,tax_commodity_name FROM $table WHERE tax_type_id='$taxId'";
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
    
}

?>