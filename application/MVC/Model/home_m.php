<?php

class home_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }  
    public function getTaxType() {
        $q = "SELECT * FROM tax_type WHERE tax_type_status='ACTIVE'";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }
    public function commodityListAjax($refTaxTypeId){
        $q = "SELECT * FROM tax_commodity WHERE tax_commodity_status='ACTIVE' AND tax_type_id='$refTaxTypeId'";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }
    public function commodityFieldAjax($commodityId){
        $q = "SELECT * FROM tax_commodity WHERE tax_commodity_status='ACTIVE' AND tax_commodity_id='$commodityId'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }
    public function deleteTaxItemQue($ip) {
        $q = "DELETE FROM tax_item_queue WHERE tax_queue_session LIKE '$ip'";
        return $this->query->delete($q);
        return FALSE;
    }
    
    public function deleteTaxItemQueAjax($id) {
        $q = "DELETE FROM tax_item_queue WHERE tax_item_queue_id=$id";
        return $this->query->delete($q);
        return FALSE;
    }
        
    public function taxItemQueueInsert($params) {
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO tax_item_queue($columns) values($values)";
            $id = $this->query->insert($q);            
            return $id;
        }
        return FALSE;
    }
    
     public function getTaxItemQueById($taxItemQueId){
        $q = "SELECT tiq.*,tt.*,tc.* FROM tax_item_queue tiq
              LEFT JOIN tax_type tt
              ON tt.tax_type_id=tiq.tax_type_id
              LEFT JOIN tax_commodity tc
              ON tc.tax_commodity_id=tiq.tax_commodity_id
              WHERE tiq.tax_item_status='ACTIVE' AND tiq.tax_item_queue_id='$taxItemQueId'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }
    
}

?>