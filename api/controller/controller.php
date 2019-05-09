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
    public function getSingleRecordById($table,$id) {
        return $this->model->getSingleRecordById($table,$id);
    }
}

?>