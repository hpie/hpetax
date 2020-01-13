<?php
class admin_m extends Models {
    
    public $query;
    
    public function __construct() {
        $this->query = new Query();
    }
    public function getSum($status) {
        $q =    "SELECT SUM(tax_payment_amount) as totalamount FROM tax_transaction_queue
                 WHERE tax_transaction_status='$status'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row['totalamount'];
        }
        return false;
    }
    
    public function getCountEmployee() {
        $q =    "SELECT COUNT(tax_employee_id) as totalCount FROM tax_employee";                
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row['totalCount'];
        }
        return false;
    }
    
     public function getCountStsEmployee($status) {
        $q =    "SELECT COUNT(tax_employee_id) as totalCount FROM tax_employee WHERE tax_employee_status='$status'";                
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row['totalCount'];
        }
        return false;
    }
    
    public function getCountDealers() {
        $q =    "SELECT COUNT(tax_dealer_id) as totalCount FROM tax_dealer";                
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row['totalCount'];
        }
        return false;
    }
    public function getCountDealersSts($status) {
        $q = "SELECT COUNT(tax_dealer_id) as totalCount FROM tax_dealer WHERE tax_delaer_status='$status' AND tax_dealer_code!='' AND tax_dealer_password!=''";                
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row['totalCount'];
        }
        return false;
    }
    public function getCountDealersPendingAproval() {
        $q = "SELECT COUNT(tax_dealer_id) as totalCount FROM tax_dealer WHERE tax_dealer_code='' AND tax_dealer_password=''";                
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row['totalCount'];
        }
        return false;
    }
    
    
    public function getCount($status) {
        $q =    "SELECT COUNT(tax_payment_amount) as totalCount FROM tax_transaction_queue
                 WHERE tax_transaction_status='$status'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row['totalCount'];
        }
        return false;
    }
    
    
//    public function getCount($status) {
//        $q =    "SELECT SUM(ttq.tax_payment_amount) as totalStatus, SUM(ttq.tax_payment_amount) as totalamount FROM tax_transaction_queue
//                 WHERE ttq.tax_transaction_status='$status' AND tc.tax_type_id IN('$taxType')";
//        $result = $this->query->select($q);
//        if ($row = $this->query->fetch($result)) {
//            return $row;
//        }
//        return false;
//    }
    
    
//    public function getDealerList() {
//        $q = "SELECT * FROM tax_dealer";
//        $result = $this->query->select($q);
//        if ($data = $this->query->fetch_array($result)) {
//            return $data;
//        }
//        return false;
//    }
    
    
//**************************Common*******************//
    public function getExistRecordByColumn($id,$column,$table) {       
        $q = "SELECT * FROM $table WHERE $column='$id'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }
    public function getExistRecordByColumnUk($uid,$id,$column,$table) { 
        $id_field=$table.'_id';
        $q = "SELECT * FROM $table WHERE $column='$id' AND $id_field='$uid'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }
    public function getExistRecordByColumnUk1($uid,$id,$column,$table) { 
        $id_field=$table.'_id';
        $q = "SELECT * FROM $table WHERE $column='$id' AND $id_field!='$uid'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }
    public function getSingleRecordById($id,$column,$table) {       
        $q = "SELECT * FROM $table WHERE $column='$id'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    } 
    
//**************************tax_master*******************//
 public function getTaxMasterList() {
        $q = "SELECT * FROM tax_master";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }
    public function taxMasterInsert($params) {
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO tax_master($columns) values($values)";
            $id = $this->query->insert($q);            
            return $id;
        }
        return FALSE;
    }
    public function editTaxMaster($params,$id) {
        $columnsdesc = $this->updateMaker($params);
        if ($columnsdesc) {
            $q = "UPDATE tax_master SET $columnsdesc WHERE tax_master_id='$id'";
            return $this->query->update($q);
        }
        return FALSE;
    }
        
    
    
//**************************tax_type*******************//
    public function getTaxTypeList() {
        $q = "SELECT * FROM tax_type";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }
    public function taxTypeInsert($params) {
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO tax_type($columns) values($values)";
            $id = $this->query->insert($q);            
            return $id;
        }
        return FALSE;
    }
    public function editTaxType($params, $id) {
        $columnsdesc = $this->updateMaker($params);
        if ($columnsdesc) {
            $q = "UPDATE tax_type SET $columnsdesc WHERE tax_type_id='$id'";
            return $this->query->update($q);
        }
        return FALSE;
    }

//**************************tax_commodity*******************//
  public function getTaxCommodityList() {
        $q = "SELECT * FROM tax_commodity";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }
    public function taxCommodityInsert($params) {
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO tax_commodity($columns) values($values)";
            $id = $this->query->insert($q);            
            return $id;
        }
        return FALSE;
    }
    public function editTaxCommodity($params, $id) {
        $columnsdesc = $this->updateMaker($params);
        if ($columnsdesc) {
            $q = "UPDATE tax_commodity SET $columnsdesc WHERE tax_commodity_id=$id";
            return $this->query->update($q);
        }
        return FALSE;
    } 
    
    //**************************tax_transaction quee*******************//
    public function getTaxTransactionStatus($status,$taxType) {
        $q =    "SELECT COUNT(ttq.tax_transaction_status) as totalStatus, SUM(ttq.tax_payment_amount) as totalamount FROM tax_transaction_queue ttq
                INNER JOIN tax_challan tc
                ON tc.tax_challan_id=ttq.tax_challan_id
                WHERE ttq.tax_transaction_status='$status' AND tc.tax_type_id IN('$taxType')";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }
    public function getTaxTransactionStatusYearly($status,$taxType,$year) {
        $year2=$year+1;
        $q =    "SELECT COUNT(ttq.tax_transaction_status) as totalStatus, SUM(ttq.tax_payment_amount) as totalamount FROM tax_transaction_queue ttq
                INNER JOIN tax_challan tc
                ON tc.tax_challan_id=ttq.tax_challan_id
                WHERE ttq.tax_transaction_status='$status' AND tc.tax_type_id IN('$taxType') AND (ttq.tax_transaction_dt BETWEEN '$year-04-01' AND '$year2-03-31')";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }
    public function getTaxTransactionStatusMonthly($status,$taxType,$month) {        
        $q =    "SELECT COUNT(ttq.tax_transaction_status) as totalStatus, SUM(ttq.tax_payment_amount) as totalamount FROM tax_transaction_queue ttq
                INNER JOIN tax_challan tc
                ON tc.tax_challan_id=ttq.tax_challan_id
                WHERE ttq.tax_transaction_status='$status' AND tc.tax_type_id IN('$taxType') AND month(ttq.tax_transaction_dt) = '$month'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }
    public function getTaxTransactionStatusDaily($status,$taxType,$day,$month,$year) {        
        $q =    "SELECT COUNT(ttq.tax_transaction_status) as totalStatus, SUM(ttq.tax_payment_amount) as totalamount FROM tax_transaction_queue ttq
                INNER JOIN tax_challan tc
                ON tc.tax_challan_id=ttq.tax_challan_id
                WHERE ttq.tax_transaction_status='$status' AND tc.tax_type_id IN('$taxType') AND DATE(ttq.tax_transaction_dt) = '$year-$month-$day'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }
    
    
    /*************************dealer**************************/
     public function approve_student($status,$id) {
//        $columnsdesc = $this->updateMaker($params);
            $q = "UPDATE tax_dealer SET tax_delaer_status='$status' WHERE tax_dealer_id=$id";
            if($q)
            return $this->query->update($q);
        return FALSE;
    }
    public function editTaxDealerCredential($params, $id) {
        $columnsdesc = $this->updateMaker($params);
        if ($columnsdesc) {
            $q = "UPDATE tax_dealer SET $columnsdesc WHERE tax_dealer_id='$id'";
            return $this->query->update($q);
        }
        return FALSE;
    } 
    
     /*************************employee**************************/
     public function employeeInsert($params) {
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO tax_employee($columns) values($values)";
            $id = $this->query->insert($q);            
            return $id;
        }
        return FALSE;
    }
    public function editemployee($params, $id) {
        $columnsdesc = $this->updateMaker($params);
        if ($columnsdesc) {
            $q = "UPDATE tax_employee SET $columnsdesc WHERE tax_employee_id='$id'";
            return $this->query->update($q);
        }
        return FALSE;
    } 
     public function approve_employee($status,$id) {
//        $columnsdesc = $this->updateMaker($params);
            $q = "UPDATE tax_employee SET tax_employee_status='$status' WHERE tax_employee_id='$id'";
            if($q)
            return $this->query->update($q);
        return FALSE;
    }
    
}

?>