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
            $id = $this->query->insert($q);              
            if ($id) {               
                return $id;
            }
        }
        return false;
    }
    
//*******************************//  
//*** Get Single record by id    *****//
//*****************************// 
    public function getSingleRecordById($table,$id) {
        $field_id=$table.'_id';
        $query = "SELECT * FROM $table WHERE $field_id=$id";
        $result = $this->query->select($query);
        if ($row = $this->query->fetch($result))
            return $row;
        return false;
    }

}

?>