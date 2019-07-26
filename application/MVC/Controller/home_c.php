<?php

//tax_master, tax_type, tax_commodity
class home_c extends Controllers {

    public $home_m;

    public function __construct() {
        $this->home_m = $this->loadModel('home_m');
    }

    public function invoke() {    
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);       
// set document information
        $pdf->SetCreator("HPETAX");        
        $pdf->SetHeaderData(PDF_HEADER_LOGO,25, 'E-CHALLAN',"Govt Of Himachal Pradesh\nDepartment Of Finance\nTreasuries,Accounts & Lotteries");

// set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

// ---------------------------------------------------------
// set font
        $pdf->SetFont('helvetica', '', 10);

// add a page
        $pdf->AddPage();

        /* NOTE:
         * *********************************************************
         * You can load external XHTML using :
         *
         * $html = file_get_contents('/path/to/your/file.html');
         *
         * External CSS files will be automatically loaded.
         * Sometimes you need to fix the path of the external CSS.
         * *********************************************************
         */

// define some HTML content with style
        $html = <<<EOF
<!-- EXAMPLE OF CSS STYLE -->
<style>
    h1 {
        color: navy;
        font-family: times;
        font-size: 24pt;
        text-decoration: underline;
    }
    p.first {
        color: #003300;
        font-family: helvetica;
        font-size: 12pt;
    }
    p.first span {
        color: #006600;
        font-style: italic;
    }
    p#second {
        color: rgb(00,63,127);
        font-family: times;
        font-size: 12pt;
        text-align: justify;
    }
    p#second > span {
        background-color: #FFFFAA;
    }
    table.first {
        color: #003300;
        font-family: helvetica;
        font-size: 8pt;
        border-left: 3px solid red;
        border-right: 3px solid #FF00FF;
        border-top: 3px solid green;
        border-bottom: 3px solid blue;
        background-color: #ccffcc;
    }
    td {
        border: 2px solid blue;
        background-color: #ffffee;
    }
    td.second {
        border: 2px dashed green;
    }
    div.test {
        color: #CC0000;
        background-color: #FFFF66;
        font-family: helvetica;
        font-size: 10pt;
        border-style: solid solid solid solid;
        border-width: 2px 2px 2px 2px;
        border-color: green #FF00FF blue red;
        text-align: center;
    }
    .lowercase {
        text-transform: lowercase;
    }
    .uppercase {
        text-transform: uppercase;
    }
    .capitalize {
        text-transform: capitalize;
    }
</style>

<h1 class="title">Example of <i style="color:#990000">XHTML + CSS</i></h1>

<p class="first">Example of paragraph with class selector. <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed imperdiet lectus. Phasellus quis velit velit, non condimentum quam. Sed neque urna, ultrices ac volutpat vel, laoreet vitae augue. Sed vel velit erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras eget velit nulla, eu sagittis elit. Nunc ac arcu est, in lobortis tellus. Praesent condimentum rhoncus sodales. In hac habitasse platea dictumst. Proin porta eros pharetra enim tincidunt dignissim nec vel dolor. Cras sapien elit, ornare ac dignissim eu, ultricies ac eros. Maecenas augue magna, ultrices a congue in, mollis eu nulla. Nunc venenatis massa at est eleifend faucibus. Vivamus sed risus lectus, nec interdum nunc.</span></p>

<p id="second">Example of paragraph with ID selector. <span>Fusce et felis vitae diam lobortis sollicitudin. Aenean tincidunt accumsan nisi, id vehicula quam laoreet elementum. Phasellus egestas interdum erat, et viverra ipsum ultricies ac. Praesent sagittis augue at augue volutpat eleifend. Cras nec orci neque. Mauris bibendum posuere blandit. Donec feugiat mollis dui sit amet pellentesque. Sed a enim justo. Donec tincidunt, nisl eget elementum aliquam, odio ipsum ultrices quam, eu porttitor ligula urna at lorem. Donec varius, eros et convallis laoreet, ligula tellus consequat felis, ut ornare metus tellus sodales velit. Duis sed diam ante. Ut rutrum malesuada massa, vitae consectetur ipsum rhoncus sed. Suspendisse potenti. Pellentesque a congue massa.</span></p>

<div class="test">example of DIV with border and fill.
<br />Lorem ipsum dolor sit amet, consectetur adipiscing elit.
<br /><span class="lowercase">text-transform <b>LOWERCASE</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
<br /><span class="uppercase">text-transform <b>uppercase</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
<br /><span class="capitalize">text-transform <b>cAPITALIZE</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
</div>

<br />

<table class="first" cellpadding="4" cellspacing="6">
 <tr>
  <td width="30" align="center"><b>No.</b></td>
  <td width="140" align="center" bgcolor="#FFFF00"><b>XXXX</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="80" align="center"> <b>XXXX</b></td>
  <td width="80" align="center"><b>XXXX</b></td>
  <td width="45" align="center"><b>XXXX</b></td>
 </tr>
 <tr>
  <td width="30" align="center">1.</td>
  <td width="140" rowspan="6" class="second">XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="140">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="30" align="center" rowspan="3">2.</td>
  <td width="140" rowspan="3">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="80">XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="80" rowspan="2" >XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="30" align="center">3.</td>
  <td width="140">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr bgcolor="#FFFF80">
  <td width="30" align="center">4.</td>
  <td width="140" bgcolor="#00CC00" color="#FFFF00">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
</table>
EOF;

// output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('example_061.pdf', 'I');

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
        $result = $this->home_m->getTaxDetails($_SESSION['unregistered']);
        $total = $this->home_m->getTaxTotal($_SESSION['unregistered']);
        $this->data['TITLE'] = TITLE_FRONT_EPAYMENT_TREASURY;
        $this->data['total'] = $total;
        $this->data['result'] = $result;
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
                $html .= '<tr align="center" id="datatr' . $res['tax_item_queue_id'] . '">'
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
        } else {
            $newArray['result'] = 'failed';
        }
        $total = $this->home_m->getTaxTotal($_SESSION['unregistered']);
        $newArray['total'] = $total;
        $newArray['html'] = $html;
        echo json_encode($newArray);
        die;
    }

    public function updateTaxItemQueAjax() {
        $newArray = array();
        $html = '';
        $existcomodity = $this->home_m->checkExistCommodityForAddNewTaxByTaxItemQueeId($_POST['taxtypeid'], $_POST['commodityid'], $_POST['tax_item_quee_id']);
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
            $result = $this->home_m->taxItemQueueUpdate($_POST['tax_item_quee_id'], $params);
            if ($result == 1 || !empty($result)) {
                $_SESSION['vehicleno_session'] = $_POST['vehicleno'];
                $res = $this->home_m->getTaxItemQueById($_POST['tax_item_quee_id']);
                $html .= '<td class="deletetd hovercs"  id="del' . $res['tax_item_queue_id'] . '">Delete</td>'
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
                        . '';
            }
            $newArray['result'] = 'success';
        } else {
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
            $newArray['data'] = $result;
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
                        <td><input type="text" id="totaltax" class="clearalltext" required="required" readonly value="' . $res['tax_item_tax_amount'] . '"></td>
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
                        <td><input type="text" id="noofpassenger" class="clearalltext" required="required" value="' . $res['tax_item_quantity'] . '"></td>
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

    public function wrfapplicationuser() {
        loadLoginView('front/', 'wrfapplicationuser.php', $this->data);
    }

}

?>