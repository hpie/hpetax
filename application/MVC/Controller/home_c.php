<?php

//tax_master, tax_type, tax_commodity
class home_c extends Controllers {

    public $home_m;

    public function __construct() {
        $this->home_m = $this->loadModel('home_m');
    }

    public function invoke() {
        $this->data['TITLE'] = TITLE_FRONT_COMMON;
        loadviewFront('front/', 'home.php', $this->data);
    }

    public function epayment() {        
        $deleteData = $this->home_m->deleteTaxItemQue($_SERVER["REMOTE_ADDR"]);
        $_SESSION['unregistered']=$_SERVER["REMOTE_ADDR"];
        $result = $this->home_m->getTaxType();
        $this->data['TITLE'] = TITLE_FRONT_EPAYMENT_UNREGISTER;
        $this->data['result'] = $result;
        loadviewFront('front/', 'epayment.php', $this->data);
    }

    public function commodityListAjax() {
        $refTaxTypeId = $_POST['id'];
        $result = $this->home_m->commodityListAjax($refTaxTypeId);
        $html ='';
        if (!empty($result)) {
            $html = $this->uiRender($refTaxTypeId);
        }
        $newArray = array();
        $newArray['result'] = 'success';
        $newArray['commodity'] = $result;
        $newArray['html'] = $html;
        echo json_encode($newArray);
        die;
    }
    public function uiRender($id) {
        $str = '';
        if ($id == 'AG') {
            $str .= '<tr class="removetr">
                        <td>&nbsp;</td>
                        <td>Source Location*</td>
                        <td><input type="text" id="sourcelocation" required="required"></td>
                        <td>&nbsp;</td>
                        <td>Destination Location*</td>
                        <td><input type="text" id="destinationlocation" required="required"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="removetr">
                        <td>&nbsp;</td>
                        <td>Distance (in Km) within HP*</td>
                        <td><input type="text" id="distance" required="required"></td>
                        <td>&nbsp;</td>
                        <td>Total Tax (in Rs.)</td>
                        <td><input type="text" id="totaltax" required="required"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>';
        }
        if($id=='PGT'){
             $str.='<tr class="removetr">
                        <td>&nbsp;</td>
                        <td>Total Tax (in Rs.)</td>
                        <td><input type="text" id="totaltax" value="" required="required"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>';
        }
        if ($id == 'PTCG') {
            $str .= '<tr class="removetr">
                        <td>&nbsp;</td>
                        <td>No. of Passenger*</td>
                        <td><input type="text" id="noofpassenger" required="required"></td>
                        <td>&nbsp;</td>
                        <td></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="removetr">
                        <td>&nbsp;</td>
                        <td>Distance (in Km) within HP*</td>
                        <td><input type="text" id="distance" required="required"></td>
                        <td>&nbsp;</td>
                        <td>Total Tax (in Rs.)</td>
                        <td><input type="text" id="totaltax" required="required"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>';
        } 
        
        if ($id == 'CGCR') {
            $str .= '<tr class="removetr">
                        <td>&nbsp;</td>
                        <td>Source Location*</td>
                        <td><input type="text" id="sourcelocation" required="required"></td>
                        <td>&nbsp;</td>
                        <td>Destination Location*</td>
                        <td><input type="text" id="destinationlocation" required="required"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="removetr">
                        <td>&nbsp;</td>
                        <td>Distance (in Km) within HP*</td>
                        <td><input type="text" id="distance" required="required"></td>
                        <td>&nbsp;</td>
                        <td>Total Tax (in Rs.)</td>
                        <td><input type="text" id="totaltax" required="required"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>';
        }        
        return $str;
    }
    public function commodityFieldAjax() {
        $commodityId = $_POST['id'];
        $result = $this->home_m->commodityFieldAjax($commodityId);       
        $html ='';
        if(!empty($result)){
            if(($result['tax_commodity_rate_unit'])>0 && ($result['tax_commodity_isdistancedependent'])=='NO'){                
                $html.='<tr class="removetr2">
                        <td>&nbsp;</td>
                        <td>Weight*</td>
                        <td><input type="text" id="rateunit" required="required">&nbsp;&nbsp;<input type="text" value="'.$result['tax_commodity_unit_measure'].'" id="mesuare" required="required" readonly></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>';
            }            
        }        
        $newArray = array();
        $newArray['result'] = 'success';
        $newArray['commodity'] = $result;
        $newArray['html'] = $html;
        echo json_encode($newArray);
        die;
    }
    
    public function addTaxItemQueAjax() {
        $params=array();
        $params['tax_queue_session']=$_SESSION['unregistered'];
        $params['tax_vehicle_number']=$_POST['vehicleno'];
        $params['tax_item_weight']=$_POST['weight'];
        $params['tax_item_weight_units']=$_POST['mesuare'];
        $params['tax_item_source_location']=$_POST['sourcelocation'];
        $params['tax_item_destination_location']=$_POST['destinationlocation'];
        $params['tax_item_distanceinkm']=$_POST['distance'];
        $params['tax_item_tax_amount']=$_POST['totaltax'];
        $params['tax_item_status']='ACTIVE';
        $params['tax_commodity_id']=$_POST['commodityid'];
        $params['tax_type_id']=$_POST['taxtypeid'];
    }
    
}

?>