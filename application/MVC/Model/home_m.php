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
}

?>