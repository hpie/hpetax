<?PHP

/* include_once("../model/model.php"); */

class Controller extends Controllers {

    public function __construct() {
        parent::__construct();
        $this->model = new Model();
    }
//*********************************************************************************************//  
//******************************************** add data common ********************************//
//********************************************************************************************// 
    public function addData($params, $table) {
        return $this->model->addData($params, $table);
    } 
    public function updateData($params, $table, $update_key, $update_value) {
        return $this->model->updateData($params, $table, $update_key, $update_value);
    } 
    public function getSingleRecordById($table,$id) {
        return $this->model->getSingleRecordById($table,$id);
    } 
    public function getSimilarRecordById($table,$id) {
        return $this->model->getSimilarRecordById($table,$id);
    }
    public function getSingleRecordByparameter($table,$id, $column="") {
        return $this->model->getSingleRecordByParameter($table,$id,$column);
    } 
    public function getAllRecordByParameter($table, $column, $search_text) {
        return $this->model->getAllRecordByParameter($table, $column, $search_text);
    } 
    public function deleteSingleRecordById($table,$id, $id_field_name="") {
        return $this->model->deleteSingleRecordById($table,$id,$id_field_name);
    } 
    public function getTaxTypeAll($table) {
        return $this->model->getTaxTypeAll($table);
    } 
    public function getTaxQueueList($table, $session) {
        return $this->model->getTaxQueueList($table, $session);
    }     
    public function getCommodityList($table,$taxId) {       
        return $this->model->getCommodityList($table,$taxId);
    }
    
    public function getTransactionListSearch($params) {        
        return $this->model->getTransactionListSearch($params);
    }
    
    public function addChallanItems($params, $table, $challan_id) {
        return $this->model->addChallanItems($params, $table, $challan_id);
    }
    public function getChallanData($table, $session) {
        return $this->model->getChallanData($table, $session);
    } 
    public function login($params) {
        return $this->model->login($params);
    }
    public function searchChallan($params, $search_query) {
        return $this->model->searchChallan($params, $search_query);
    }
    public function searchChallanBySession($params, $search_query) {
        return $this->model->searchChallanBySession($params, $search_query);
    }
    public function getExistTransaction($table_name, $table_id_name, $id) {
        return $this->model->getExistTransaction($table_name, $table_id_name, $id);
    }
    public function getLocationDDO() {
        return $this->model->getLocationDDO();
    }
    public function receiptHead($query) {
        return $this->model->receiptHead($query);
    }
    
}

?>