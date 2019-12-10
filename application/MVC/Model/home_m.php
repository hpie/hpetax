<?php

class home_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }

    public function getTaxTypeName($id) {
        $q = "SELECT tax_type_name FROM tax_type WHERE tax_type_id='$id'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row['tax_type_name'];
        }
        return false;
    }

    public function getCommodityName($id) {
        $q = "SELECT tax_commodity_name FROM tax_commodity WHERE tax_commodity_id='$id'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row['tax_commodity_name'];
        }
        return false;
    }

    public function getExistRecordByColumn($id, $column, $table) {
        $q = "SELECT * FROM $table WHERE $column='$id'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }

    public function registerationInsert($params) {
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO tax_dealer($columns) values($values)";
            $id = $this->query->insert($q);
            return $id;
        }
        return FALSE;
    }

    public function getDealerDetails($dealerID) {
        $q = "SELECT * FROM tax_dealer WHERE tax_dealer_id='$dealerID'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }

    public function getTaxType() {
        $q = "SELECT * FROM tax_type WHERE tax_type_status='ACTIVE'";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }

    public function commodityListAjax($refTaxTypeId) {
        $q = "SELECT * FROM tax_commodity WHERE tax_commodity_status='ACTIVE' AND tax_type_id='$refTaxTypeId'";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }

    public function commodityFieldAjax($commodityId) {
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

    public function getTaxItemQueById($taxItemQueId) {
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

    public function getTaxItemList($taxItemSession) {
        $q = "SELECT * FROM tax_item_queue WHERE tax_queue_session='$taxItemSession'";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }

    public function getTaxTotal($taxItemSession) {
        $q = "SELECT SUM(tax_item_tax_amount) as total FROM tax_item_queue WHERE tax_queue_session='$taxItemSession'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row['total'];
        }
        return false;
    }

    public function getTaxDetails($taxItemSession) {
        $q = "  SELECT tt.tax_type_id,tt.tax_type_name,tt.tax_type_head FROM tax_item_queue tiq
                INNER JOIN tax_type tt
                ON tiq.tax_type_id=tt.tax_type_id
                WHERE tiq.tax_queue_session='$taxItemSession'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }
    
    public function receiptHead() {
        $q = "  SELECT * FROM tax_revenue_receipt";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }
    
    public function getLocationDDO() {
        $q = "  SELECT * FROM tax_location_ddo";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }
    
    public function getTaxDetailsComodityHead($taxItemSession) {
        $q = "  SELECT tc.tax_commodity_id,tc.tax_commodity_name,tc.tax_commodity_subhead FROM tax_item_queue tiq
                INNER JOIN tax_commodity tc
                ON tiq.tax_commodity_id=tc.tax_commodity_id
                WHERE tiq.tax_queue_session='$taxItemSession'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }
    

    public function checkExistTaxItemQue($taxItemSession) {
        $q = "SELECT COUNT(tax_item_queue_id) as total FROM tax_item_queue WHERE tax_queue_session='$taxItemSession'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row['total'];
        }
        return false;
    }

    public function getModifyTaxItemQueAjax($id) {
        $q = "SELECT * FROM tax_item_queue WHERE tax_item_queue_id='$id'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }

    public function checkExistCommodityForAddNewTax($taxtypeid, $commodityId, $tax_queue_session) {
        $q = "SELECT * FROM tax_item_queue WHERE tax_type_id='$taxtypeid' AND tax_commodity_id='$commodityId' AND tax_queue_session='$tax_queue_session'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }

    public function checkExistCommodityForAddNewTaxByTaxItemQueeId($taxtypeid, $commodityId, $tax_item_queue_id) {
        $q = "SELECT * FROM tax_item_queue WHERE tax_type_id='$taxtypeid' AND tax_commodity_id='$commodityId' AND tax_item_queue_id != '$tax_item_queue_id'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }

    public function taxItemQueueUpdate($tax_item_queue_id, $params) {
        $columnsdesc = $this->updateMaker($params);
        if ($columnsdesc) {
            $q = "UPDATE tax_item_queue SET $columnsdesc WHERE tax_item_queue_id=$tax_item_queue_id";
            return $this->query->update($q);
        }
        return FALSE;
    }

}

?>