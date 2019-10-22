<?php

//tax_master, tax_type, tax_commodity
class home_c extends Controllers {

    public $home_m;

    public function __construct() {
        parent::__construct();
        $this->home_m = $this->loadModel('home_m');
    }

    public function invoke() {
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
        $pdf->SetCreator("HPETAX");
        $pdf->SetHeaderData(PDF_HEADER_LOGO, 22, 'E-CHALLAN', "Govt Of Himachal Pradesh\nDepartment Of Finance\nTreasuries,Accounts & Lotteries");

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
//        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
//            require_once(dirname(__FILE__) . '/lang/eng.php');
//            $pdf->setLanguageArray($l);
//        }

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
<table cellpadding="3" cellspacing="3" style="font-size:11px;">
 <tr>
  <td width="13%" align="left">HIMGRN:</td>
  <td width="40%" align="left"><u><b>A19G145689</b></u></td>
  <td width="15%" align="right">Date:</td>
  <td width="35%" align="right"><b>21-07-2019  09:25:45PM</b></td>
 </tr>
 <tr>
  <td width="13%" align="left">Book No.</td>
  <td width="40%" align="left"><u><b></b></u></td>
  <td width="15%" align="right">Book Date:</td>
  <td width="35%" align="right"><b></b></td>
 </tr>
<tr>
  <td width="15%" align="left">*Tender By.</td>
  <td width="85%" align="left"><b>AVTAR SINGH</b></td>
  <td width="" align="right"></td>
  <td width="" align="right"></td>
 </tr>  
<tr>
  <td width="15%" align="left">Dept. Ref No.</td>
  <td width="85%" align="left"><b>DL1Z2779[VAH TXN-HPY1907210643166]</b></td>
  <td width="" align="right"></td>
  <td width="" align="right"></td>
 </tr>
<tr>
  <td width="15%" align="left">Receipt Type</td>
  <td width="85%" align="left"><b>COMPOSITE FEE PENALTY(TOKEN TAX) REGISTRATION FEE INSPECTION FEE PENALTY</b></td>
  <td width="" align="right"></td>
  <td width="" align="right"></td>
 </tr> 
<tr>
  <td width="15%" align="left">&nbsp;</td>
  <td width="85%" align="left"></td>
  <td width="" align="right"></td>
  <td width="" align="right"></td>
 </tr>  
 <tr>
  <td width="15%" align="left">Amount(*GC)</td>
  <td width="85%" align="left"><b>200 (Two Hundred)</b></td>
  <td width="" align="right"></td>
  <td width="" align="right"></td>
 </tr> 
</table>
<h1 style="color:#00000047">Transaction Success..    </h1>
<br>
<hr>
   <table cellpadding="3" cellspacing="3" style="font-size:11px;">
 <tr>
  <td width="15%" align="left">Treasury</td>
  <td width="85%" align="left"><b>CTO00</b></td>
  <td width="" align="right"></td>
  <td width="" align="right"></td>
 </tr>
<tr>
  <td width="15%" align="left">DDO</td>
  <td width="85%" align="left"><b>317</b>&nbsp;&nbsp;&nbsp;(On whose behalf the money is tendered)</td>
  <td width="" align="right"></td>
  <td width="" align="right"></td>
 </tr>
<tr>
  <td width="15%" align="left">&nbsp;</td>
  <td width="85%" align="left"><b>ASST CONTT F AND A TRANSPORT DEPTT SHIMLA</b></td>
  <td width="" align="right"></td>
  <td width="" align="right"></td>
 </tr>
<tr>
  <td width="100%" align="right"><b>For the Period [21-07-2019 To 22-07-2019]</b></td>
  <td width="" align="left"></td>
  <td width="" align="right"></td>
  <td width="" align="right"></td>
 </tr>
</table>   
<table style="font-size:11px;">
 <tr>
  <td width="60%" align="left">MajCd-SmjCd-MinCd-SmnCd</td>
  <td width="20%" align="left">Book No.</td>
  <td width="20%" align="left">Amount(Rs.)</td>  
 </tr>
 <tr>
  <td width="60%" align="left"><b>0041-00-101-02(REGISTRATION FEE INSPECTION FEE)</b></td>
  <td width="20%" align="left"><b></b></td>
  <td width="20%" align="left"><b>0</b></td>  
 </tr>
<tr>
  <td width="60%" align="left"><b>0041-00-101-04(PENALTY)</b></td>
  <td width="20%" align="left"><b></b></td>
  <td width="20%" align="left"><b>0</b></td>  
 </tr>
<tr>
  <td width="60%" align="left"><b>0041-00-102-02(PENALTY (TOKEN TAX))</b></td>
  <td width="20%" align="left"><b></b></td>
  <td width="20%" align="left"><b>0</b></td>  
 </tr>
                <tr>
  <td width="60%" align="left"><b>0041-00-102-04(COMPOSITE FEE)</b></td>
  <td width="20%" align="left"><b></b></td>
  <td width="20%" align="left"><b>200</b></td>  
 </tr>
</table>
<br><br>
<hr>
<table cellpadding="3" cellspacing="3" style="font-size:11px;">
 <tr>
  <td width="30%" align="left"><b>Bank Transaction Details</b></td>
  <td width="70%" align="left"></td>
 </tr>
</table>
                <hr>
<table cellpadding="4" cellspacing="4" style="font-size:11px;">
 <tr>
  <td width="30%" align="left">Bank Reference No.</td>
  <td width="70%" align="left"><b>CPT5744262</b></td>
 </tr>
                <tr>
  <td width="30%" align="left">HIMGRN</td>
  <td width="70%" align="left"><b>A19G145689</b></td>
 </tr>
                <tr>
  <td width="30%" align="left">Amount (*GC + *SC)</td>
  <td width="70%" align="left"><b>Rs. 220 (200+20)</b></td>
 </tr>
                            <tr>
  <td width="30%" align="left">Amount in Words</td>
  <td width="70%" align="left"><b>Two Hundred Twenty</b></td>
 </tr>
                                           <tr>
  <td width="30%" align="left">Status</td>
  <td width="70%" align="left"><b>Completed Successfully</b></td>
 </tr>
                                                         <tr>
  <td width="30%" align="left">Date-Time</td>
  <td width="70%" align="left"><b>21-07-2019 09:27:19PM</b></td>
 </tr>
</table>
<p><b>*</b> Service Providers Should Verify the identity of Remmiter before Delivering Services.</p>
<p><b>*</b> GC-Govt. Free Collected, *SC-Service Charge Paid</p>  
<hr style="border-top: 1px dashed red !important;">
                
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
        $existcomodity = $this->home_m->checkExistCommodityForAddNewTax($_POST['taxtypeid'], $_POST['commodityid'],$_SESSION['unregistered']);
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

    public function addChalan() {
        
        $challan_id=gen_uuid();
        $challan_title =$_POST['challan_title'];
        $depositors_name =$_POST['depositors_name'];
        $depositors_phone =$_POST['depositors_phone'];
        $depositors_address =$_POST['depositors_address'];
        $challan_location =$_POST['challan_location'];
        $challan_duration =$_POST['challan_duration'];                
        $challan_from_dt = dateFormatterMysql($_POST['challan_from_dt']);
        $challan_to_dt = dateFormatterMysql($_POST['challan_to_dt']);
        $challan_purpose =$_POST['challan_purpose'];
        $challan_amount =$_POST['challan_amount'];
        $transaction_no =$_POST['transaction_no'];
        $transaction_status =$_POST['transaction_status'];
        $challan_status =$_POST['challan_status'];
        $type_code =$_POST['type_code'];
        $token =$_POST['token'];
        $device =$_POST['device'];
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://localhost/hpetax/api/v1/tax_challan/add-tax-challan/1",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\t\"challan_id\":\"$challan_id\",\r\n\t\"challan_title\":\"$challan_title\",\r\n\t\"depositors_name\":\"$depositors_name\",\r\n\t\"depositors_phone\":\"$depositors_phone\",\r\n\t\"depositors_address\":\"$depositors_address\",\r\n\t\"challan_location\":\"$challan_location\",\r\n\t\"challan_duration\":\"$challan_duration\",\r\n\t\"challan_from_dt\":\"$challan_from_dt\",\r\n\t\"challan_to_dt\":\"$challan_to_dt\",\r\n\t\"challan_purpose\":\"$challan_purpose\",\r\n\t\"challan_amount\":\"$challan_amount\",\r\n\t\"transaction_no\":\"$transaction_no\",\r\n\t\"transaction_status\":\"$transaction_status\",\r\n\t\"challan_status\":\"$challan_status\",\r\n\t\"type_code\":\"$type_code\",\r\n\t\"created_by\":\"vasim\",\r\n\t\"modified_by\":\"vasim\",\r\n\t\"token\":\"123\",\r\n\t\"device\":\"android\"\r\n}",
//            CURLOPT_HTTPHEADER => array(
//                "Accept: */*",
//                "Accept-Encoding: gzip, deflate",
//                "Cache-Control: no-cache",
//                "Connection: keep-alive",
//                "Content-Length: 512",
//                "Content-Type: application/json",
//
//                "Postman-Token: d55b46b2-dc73-4592-9632-6534a35076ae,29d92d84-88e2-43c4-a7c2-71a940f3b130",
//                "User-Agent: PostmanRuntime/7.17.1",
//                "cache-control: no-cache"
//            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            $result['result'] = 'success';
//            echo "cURL Error #:" . $err;
        } else {
            echo $response;die;
            $result['result'] = 'success';
        }
        echo json_encode($result);
        die;
    }
    public function signupform() {
        $this->data['TITLE'] = TITLE_FRONT_SIGNUP_FORM;
        loadviewFront('front/', 'signupform.php', $this->data);
    }

}

?>