<?php

class admin_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }
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
            $q = "UPDATE tax_type SET $columnsdesc WHERE tax_type_id=$id";
            return $this->query->update($q);
        }
        return FALSE;
    }

//**************************tax_commodity*******************//
}

?>