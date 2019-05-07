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
//*** Get User Profile     *****//
//*****************************// 
    public function getUserProfile($userId) {

        $query = "SELECT * FROM user WHERE user_id='$userId'";
        $result = $this->query->select($query);
        if ($row = $this->query->fetch($result, array('user_password')))
            return $row;
        return false;
    }

}

?>