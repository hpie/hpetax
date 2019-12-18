<?php

class app_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }
    
    public function getTaxChallan($id) {
        $q = "SELECT * FROM tax_challan WHERE tax_challan_id='$id'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }

	public function getMainHead($id, $receipt) {
        $tax_challan_item_query = "SELECT * FROM tax_challan_item WHERE tax_challan_id='$id'";

        $tax_challan_item_query_result = $this->query->select($tax_challan_item_query);

		

        if ($tax_challan_item_query_result_row = $this->query->fetch($tax_challan_item_query_result)) {
          //echo "=======>>>tax_challan_item_query_result_row>>>>>>>> <pre>"; print_r($tax_challan_item_query_result_row); //exit;


				$tax_type_data = $this->getByColumn('tax_type', 'tax_type_id', $tax_challan_item_query_result_row['tax_type_code']);
//print_r($tax_type_data);

				$commodity_data = $this->getByColumn('tax_commodity', 'tax_commodity_id', $tax_challan_item_query_result_row['tax_commodity_id']);
//print_r($commodity_data);
				$tax_revenue_receipt_data = $this->getByColumn('tax_revenue_receipt', 'tax_revenue_receipt_id', $receipt, 'tax_receipt_head', $receipt);

//print_r($tax_revenue_receipt_data);

				return $mainHead = $tax_type_data['tax_type_head'].'-'.$commodity_data['tax_commodity_subhead'].'-'.$tax_revenue_receipt_data['tax_receipt_head'];
        }
        return false;
    }

	public function getByColumn($table, $colmn_name, $column_val, $or_column_name = "" , $or_column_val = "") {
       $q = "SELECT * FROM $table WHERE $colmn_name ='".$column_val."'";
	   if($or_column_name != "") {
			$q .= " OR $or_column_name ='".$or_column_val."'";
	   }
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }

	public function getDdo($id) {
        $q = "SELECT * FROM tax_challan WHERE tax_challan_id='$id'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }

    

}

?>