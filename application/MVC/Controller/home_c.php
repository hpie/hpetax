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
        $_SESSION['vehicleno_session'] = '';
        $deleteData = $this->home_m->deleteTaxItemQue($_SERVER["REMOTE_ADDR"]);
        $_SESSION['unregistered'] = $_SERVER["REMOTE_ADDR"];
        $result = $this->home_m->getTaxType();
        $this->data['TITLE'] = TITLE_FRONT_EPAYMENT_UNREGISTER;
        $this->data['result'] = $result;
        loadviewFront('front/', 'epayment.php', $this->data);
    }

    public function epaymenttreasury() {
        $this->data['TITLE'] = TITLE_FRONT_EPAYMENT_TREASURY;
        loadviewFront('front/', 'epaymenttreasury.php', $this->data);
    }

    public function commodityListAjax() {
        $refTaxTypeId = $_POST['id'];
        $result = $this->home_m->commodityListAjax($refTaxTypeId);
        $html = '';
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
                        <td>Distance (in Km) within HP*</td>
                        <td><input type="text" class="clearalltext" id="distance" required="required"></td>
                        <td>&nbsp;</td>
                        <td>Total Tax (in Rs.)</td>
                        <td><input type="text" class="clearalltext" id="totaltax" required="required" readonly></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>';
        }
        if ($id == 'PGT') {
            $str .= '<tr class="removetr">
                        <td>&nbsp;</td>
                        <td>Total Tax (in Rs.)</td>
                        <td><input type="text" id="totaltax" class="clearalltext" value="" required="required" readonly></td>
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
                        <td><input type="text" id="noofpassenger" class="clearalltext" required="required"></td>
                        <td>&nbsp;</td>
                        <td></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="removetr">
                        <td>&nbsp;</td>
                        <td>Distance (in Km) within HP*</td>
                        <td><input type="text" id="distance" class="clearalltext" required="required"></td>
                        <td>&nbsp;</td>
                        <td>Total Tax (in Rs.)</td>
                        <td><input type="text" id="totaltax" class="clearalltext" required="required" readonly></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>';
        }
        if ($id == 'CGCR') {
            $str .= '<tr class="removetr">
                        <td>&nbsp;</td>
                        <td>Distance (in Km) within HP*</td>
                        <td><input type="text" id="distance" class="clearalltext" required="required"></td>
                        <td>&nbsp;</td>
                        <td>Total Tax (in Rs.)</td>
                        <td><input type="text" id="totaltax" class="clearalltext" required="required" readonly></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>';
        }
        return $str;
    }

    public function commodityFieldAjax() {
        $commodityId = $_POST['id'];
        $result = $this->home_m->commodityFieldAjax($commodityId);
        $html = '';
        if (!empty($result)) {
            if (($result['tax_commodity_rate_unit']) > 0 && ($result['tax_commodity_isdistancedependent']) == 'NO') {
                $html .= '<tr class="removetr2">
                        <td>&nbsp;</td>
                        <td>Weight*</td>
                        <td><input type="text" id="rateunit" class="clearalltext" required="required">&nbsp;&nbsp;<input type="text" class="clearalltext" value="' . $result['tax_commodity_unit_measure'] . '" id="mesuare" required="required" readonly></td>
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
        $newArray = array();
        $html = '';
        $existcomodity = $this->home_m->checkExistCommodityForAddNewTax($_POST['taxtypeid'], $_POST['commodityid']);
        if (empty($existcomodity)) {
            $params = array();
            if ($_POST['noofpassenger'] != 0) {
                $params['tax_item_quantity'] = $_POST['noofpassenger'];
            }
            $params['tax_queue_session'] = $_SESSION['unregistered'];
            $params['tax_vehicle_number'] = $_POST['vehicleno'];
            $params['tax_item_weight'] = $_POST['weight'];
            $params['tax_item_weight_units'] = $_POST['mesuare'];
            $params['tax_item_source_location'] = $_POST['sourcelocation'];
            $params['tax_item_destination_location'] = $_POST['destinationlocation'];
            $params['tax_item_distanceinkm'] = $_POST['distance'];
            $params['tax_item_tax_amount'] = $_POST['totaltax'];
            $params['tax_item_status'] = 'ACTIVE';
            $params['tax_commodity_id'] = $_POST['commodityid'];
            $params['tax_type_id'] = $_POST['taxtypeid'];
            $result = $this->home_m->taxItemQueueInsert($params);           
            if ($result['res'] == 1 || !empty($result['id'])) {
                $_SESSION['vehicleno_session'] = $_POST['vehicleno'];
                $res = $this->home_m->getTaxItemQueById($result['id']);

                $html .= '<tr align="center">'
                        . '<td class="deletetd hovercs"  id="del' . $res['tax_item_queue_id'] . '">Delete</td>'
                        . '<td class="modifytd hovercs" id="md' . $res['tax_item_queue_id'] . '">Modify</td>'
                        . '<td class="">' . $res["tax_type_name"] . '</td>'
                        . '<td class="">' . $res["tax_commodity_description"] . '</td>'
                        . '<td class="">' . $res["tax_vehicle_number"] . '</td>'
                        . '<td class="">' . $res["tax_item_weight"] . '</td>'
                        . '<td class="">' . $res["tax_commodity_unit_measure"] . '</td>'
                        . '<td class="">' . $res["tax_item_quantity"] . '</td>'
                        . '<td class="">' . $res["tax_item_source_location"] . '</td>'
                        . '<td class="">' . $res["tax_item_destination_location"] . '</td>'
                        . '<td class="">' . $res["tax_item_distanceinkm"] . '</td>'
                        . '<td class="">' . $res["tax_item_tax_amount"] . '</td>'
                        . '</tr>';
            }
        $newArray['result'] = 'success';
        }
        else{
            $newArray['result'] = 'failed';
        }
        $total = $this->home_m->getTaxTotal($_SESSION['unregistered']);                       
        $newArray['total'] = $total;
        $newArray['html'] = $html;
        echo json_encode($newArray);
        die;
    }
    public function deleteTaxItemQueAjax() {
        $id = $_POST['id'];
        $result = $this->home_m->deleteTaxItemQueAjax($id);
        $total = $this->home_m->getTaxTotal($_SESSION['unregistered']);
        $newArray = array();
        $newArray['result'] = 'success';
        $newArray['total'] = $total;
        echo json_encode($newArray);
        die;
    }

    public function checkExistTaxItemQue() {
        $result = $this->home_m->checkExistTaxItemQue($_SESSION['unregistered']);
        $newArray = array();
        if ($result > 0) {
            $newArray['result'] = 'success';
        } else {
            $newArray['result'] = 'failed';
        }
        echo json_encode($newArray);
        die;
    }

    public function getModifyTaxItemQueAjax() {
        $id = $_POST['id'];
        $result = $this->home_m->getModifyTaxItemQueAjax($id);
        $newArray = array();
        if (!empty($result)) {
            $newArray['result'] = 'success';
            $commodity = $this->home_m->commodityListAjax($result['tax_type_id']);
            $html = $this->modifyUiRender($result);

            $newArray['taxtype_id'] = $result['tax_type_id'];
            $newArray['commodity_id'] = $result['tax_commodity_id'];
            $newArray['hiderate'] = $result['tax_item_tax_amount'];                      
            $newArray['html'] = $html['htmlstr'];           
            $newArray['commodityhtml'] = $html['htmlcommodity'];
            $newArray['commodity'] = $commodity;
        } else {
            $newArray['result'] = 'failed';
        }
        echo json_encode($newArray);
        die;
    }

    public function modifyUiRender($res) {
        
        $resArray = array();
        $id = $res['tax_type_id'];
        $str = '';

        $result = $this->home_m->commodityFieldAjax($res['tax_commodity_id']);
       // print_r($result);
        $html = '';
        if (($result['tax_commodity_rate_unit']) > 0 && ($result['tax_commodity_isdistancedependent']) == 'NO') {
            $html .= '<tr class="removetr2">
                        <td>&nbsp;</td>
                        <td>Weight*</td>
                        <td><input type="text" id="rateunit" class="clearalltext" required="required" value="' . $res['tax_item_weight'] . '">&nbsp;&nbsp;<input type="text" class="clearalltext" value="' . $result['tax_commodity_unit_measure'] . '" id="mesuare" required="required" readonly></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>';
        }

        if ($id == 'AG') {
            $str .= '<tr class="removetr">
                        <td>&nbsp;</td>
                        <td>Distance (in Km) within HP*</td>
                        <td><input type="text" class="clearalltext" id="distance" required="required" value="' . $res['tax_item_distanceinkm'] . '"></td>
                        <td>&nbsp;</td>
                        <td>Total Tax (in Rs.)</td>
                        <td><input type="text" class="clearalltext" id="totaltax" required="required" readonly value="' . $res['tax_item_tax_amount'] . '"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>';
        }
        if ($id == 'PGT') {
            $str .= '<tr class="removetr">
                        <td>&nbsp;</td>
                        <td>Total Tax (in Rs.)</td>
                        <td><input type="text" id="totaltax" class="clearalltext" value="" required="required" readonly value="' . $res['tax_item_tax_amount'] . '"></td>
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
                        <td><input type="text" id="noofpassenger" class="clearalltext" required="required" value="' . $res['tax_item_weight'] . '"></td>
                        <td>&nbsp;</td>
                        <td></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="removetr">
                        <td>&nbsp;</td>
                        <td>Distance (in Km) within HP*</td>
                        <td><input type="text" id="distance" class="clearalltext" required="required" value="' . $res['tax_item_distanceinkm'] . '"></td>
                        <td>&nbsp;</td>
                        <td>Total Tax (in Rs.)</td>
                        <td><input type="text" id="totaltax" class="clearalltext" required="required" readonly value="' . $res['tax_item_tax_amount'] . '"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>';
        }
        if ($id == 'CGCR') {
            $str .= '<tr class="removetr">
                        <td>&nbsp;</td>
                        <td>Distance (in Km) within HP*</td>
                        <td><input type="text" id="distance" class="clearalltext" required="required" value="' . $res['tax_item_distanceinkm'] . '"></td>
                        <td>&nbsp;</td>
                        <td>Total Tax (in Rs.)</td>
                        <td><input type="text" id="totaltax" class="clearalltext" required="required" readonly value="' . $res['tax_item_tax_amount'] . '"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>';
        }
        
        $resArray['htmlstr'] = $str;
        $resArray['htmlcommodity'] = $html;
        return $resArray;
    }

}

?>