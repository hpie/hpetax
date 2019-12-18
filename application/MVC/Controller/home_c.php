<?php

//tax_master, tax_type, tax_commodity
class home_c extends Controllers {

    public $home_m;

    public function __construct() {
        parent::__construct();
        $this->home_m = $this->loadModel('home_m');
    }

    public function invoke() {
        $this->data['TITLE'] = TITLE_FRONT_COMMON;
        loadviewFront('front/', 'home.php', $this->data);
    }

//    public function invoke() {
    public function pdf() {
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
        if (isset($_SESSION['dealerDetails']['tax_dealer_id'])) {
            $dealerDetails = $this->home_m->getDealerDetails($_SESSION['dealerDetails']['tax_dealer_id']);
            $this->data['dealerDetails'] = $dealerDetails;
        }
        $result = $this->home_m->getTaxDetails($_SESSION['unregistered']);  
        $locationDDO = $this->home_m->getLocationDDO();  
        $headReceipt = $this->home_m->receiptHead();  
        $comodityHead = $this->home_m->getTaxDetailsComodityHead($_SESSION['unregistered']);
        $total = $this->home_m->getTaxTotal($_SESSION['unregistered']);
        $this->data['TITLE'] = TITLE_FRONT_EPAYMENT_TREASURY;
        $this->data['total'] = $total;
        $this->data['result'] = $result;
        $this->data['comodityHead'] = $comodityHead;
        $this->data['locationDDO'] = $locationDDO;
        $this->data['headReceipt'] = $headReceipt;
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
            if($result['tax_commodity_taxcalculation']=='BY_COUNT')  {
                if (($result['tax_commodity_rate_unit']) > 0 && ($result['tax_commodity_isdistancedependent']) == 'NO') {
                $html .= '<tr class="removetr2">
                        <td>&nbsp;</td>
                        <td>Weight*</td>
                        <td><input type="text" id="rateunit" class="clearalltext" required="required">&nbsp;&nbsp;<input type="text" class="clearalltext" value="Kg" id="mesuare" required="required" readonly></td>
                        <td>&nbsp;</td>
                        <td>Quantity ('.$result['tax_commodity_unit_measure'].')*</td>
                        <td><input type="text" id="quintityBY_COUNT" class="clearalltext" required="required"></td>                        
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>';
                }
            }          
            if($result['tax_commodity_taxcalculation']=='BY_WEIGHT')  {
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
        $existcomodity = $this->home_m->checkExistCommodityForAddNewTax($_POST['taxtypeid'], $_POST['commodityid'], $_SESSION['unregistered']);
        if (empty($existcomodity)) {
            $params = array();
            $params['tax_item_quantity'] = $_POST['quintityBY_COUNT'];
            
            if ($_POST['noofpassenger'] != 0) {
                $params['tax_item_quantity'] = $_POST['noofpassenger'];
            }            
            $params['tax_queue_session'] = $_SESSION['unregistered'];
            $params['tax_type_name'] = $this->home_m->getTaxTypeName($_POST['taxtypeid']);
            $params['tax_commodity_name'] = $this->home_m->getCommodityName($_POST['commodityid']);
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
            $params['tax_item_quantity'] = $_POST['quintityBY_COUNT'];
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
            foreach ($commodity as $row){
                if($result['tax_commodity_id']==$row['tax_commodity_id']){
                    $hiderate=$row['tax_commodity_rate'];
                    $tax_commodity_rate_unit=$row['tax_commodity_rate_unit'];
                }
            }
            $html = $this->modifyUiRender($result);
            $newArray['taxtype_id'] = $result['tax_type_id'];
            $newArray['commodity_id'] = $result['tax_commodity_id'];
            $newArray['hiderate'] = $hiderate;
            $newArray['tax_commodity_rate_unit'] = $tax_commodity_rate_unit;
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
        $html = '';        
        if($result['tax_commodity_taxcalculation']=='BY_COUNT')  {
                if (($result['tax_commodity_rate_unit']) > 0 && ($result['tax_commodity_isdistancedependent']) == 'NO') {
                $html .= '<tr class="removetr2">
                        <td>&nbsp;</td>
                        <td>Weight*</td>
                        <td><input type="text" id="rateunit" class="clearalltext" required="required" value="' . $res['tax_item_weight'] . '">&nbsp;&nbsp;<input type="text" class="clearalltext" value="Kg" id="mesuare" required="required" readonly></td>
                        <td>&nbsp;</td>
                        <td>Quantity ('.$result['tax_commodity_unit_measure'].')*</td>
                        <td><input type="text" id="quintityBY_COUNT" class="clearalltext" required="required" value="' . $res['tax_item_quantity'] . '"></td>                        
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>';
                }
            }          
            if($result['tax_commodity_taxcalculation']=='BY_WEIGHT')  {
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
        $challan_id = gen_uuid();        
        $mainHead=$_POST['tax_type_head'].'-'.$_POST['tax_commodity_head'].'-'.$_POST['challan_receipt_head'];
        $ddo=$_POST['challan_ddo'];                
        $challan_title = $_POST['challan_title'];
        $tax_dealer_id = $_POST['tax_dealer_id'];
        $depositors_name = $_POST['depositors_name'];
        $depositors_phone = $_POST['depositors_phone'];
        $depositors_email = $_POST['depositors_email'];
        $depositors_city = $_POST['depositors_city'];
        $depositors_zip = $_POST['depositors_zip'];
        $depositors_address = $_POST['depositors_address'];
        $challan_location = $_POST['challan_location'];
        $challan_duration = $_POST['challan_duration'];
        $challan_from_dt = dateFormatterMysql($_POST['challan_from_dt']);
        $challan_to_dt = dateFormatterMysql($_POST['challan_to_dt']);
        $challan_purpose = $_POST['challan_purpose'];
        $challan_amount = $_POST['challan_amount'];
        $transaction_no = $_POST['transaction_no'];
        $transaction_status = $_POST['transaction_status'];
        $challan_status = $_POST['challan_status'];
        $type_code = $_POST['type_code'];
        $token = $_POST['token'];
        $device = $_POST['device'];

//*********************add tax challan**************************************//
        $curl = curl_init();
        $url = ADD_TAX_CHALLAN;
        curl_setopt_array($curl, array(
            CURLOPT_URL => "$url",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\t\"challan_id\":\"$challan_id\",\r\n\t\"challan_title\":\"$challan_title\",\r\n\t\"tax_dealer_id\":\"$tax_dealer_id\",\r\n\t\"depositors_name\":\"$depositors_name\",\r\n\t\"depositors_phone\":\"$depositors_phone\",\r\n\t\"depositors_email\":\"$depositors_email\",\r\n\t\"depositors_city\":\"$depositors_city\",\r\n\t\"depositors_zip\":\"$depositors_zip\",\r\n\t\"depositors_address\":\"$depositors_address\",\r\n\t\"challan_location\":\"$challan_location\",\r\n\t\"challan_duration\":\"$challan_duration\",\r\n\t\"challan_from_dt\":\"$challan_from_dt\",\r\n\t\"challan_to_dt\":\"$challan_to_dt\",\r\n\t\"challan_purpose\":\"$challan_purpose\",\r\n\t\"challan_amount\":\"$challan_amount\",\r\n\t\"transaction_no\":\"$transaction_no\",\r\n\t\"transaction_status\":\"$transaction_status\",\r\n\t\"challan_status\":\"$challan_status\",\r\n\t\"type_code\":\"$type_code\",\r\n\t\"created_by\":\"vasim\",\r\n\t\"modified_by\":\"vasim\",\r\n\t\"token\":\"123\",\r\n\t\"device\":\"android\"\r\n}",
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $res = json_decode($response);

//*********************end add tax challan**************************************//                
        if ($res->success == TRUE) {
            $taxItemQueeRes = $this->home_m->getTaxItemList($_SESSION['unregistered']);
            if ($taxItemQueeRes) {
                foreach ($taxItemQueeRes as $row) {

//                    print_r($row);die;

                    $challan_item_id = $row['tax_item_queue_id'];
                    $tax_type_name = $row['tax_type_name'];
                    $tax_commodity_name = $row['tax_commodity_name'];
                    $tax_vehicle_number = $row['tax_vehicle_number'];
                    $tax_item_weight = $row['tax_item_weight'];
                    $tax_item_weight_units = $row['tax_item_weight_units'];
                    $tax_item_quantity = $row['tax_item_quantity'];
                    $tax_item_quantity_units = $row['tax_item_quantity_units'];
                    $tax_item_source_location = $row['tax_item_source_location'];
                    $tax_item_destination_location = $row['tax_item_destination_location'];
                    $tax_item_distanceinkm = $row['tax_item_distanceinkm'];
                    $tax_item_tax_amount = $row['tax_item_tax_amount'];
                    $tax_item_status = $row['tax_item_status'];
                    $tax_challan_id = $challan_id;
                    $tax_commodity_id = $row['tax_commodity_id'];
                    $tax_type_code = $row['tax_type_id'];

                    $curl = curl_init();
                    $url = ADD_TAX_CHALLAN_ITEM;
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "$url",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS => "{\t\"challan_item_id\":\"$challan_item_id\",\r\n\t\"type_name\":\"$tax_type_name\",\r\n\t\"commodity_name\":\"$tax_commodity_name\",\r\n\t\"vehicle_number\":\"$tax_vehicle_number\",\r\n\t\"item_weight\":\"$tax_item_weight\",\r\n\t\"item_weight_units\":\"$tax_item_weight_units\",\r\n\t\"item_quantity\":\"$tax_item_quantity\",\r\n\t\"item_quantity_units\":\"$tax_item_quantity_units\",\r\n\t\"item_source_location\":\"$tax_item_source_location\",\r\n\t\"item_destination_location\":\"$tax_item_destination_location\",\r\n\t\"item_distanceinkm\":\"$tax_item_distanceinkm\",\r\n\t\"item_tax_amount\":\"$tax_item_tax_amount\",\r\n\t\"item_status\":\"$tax_item_status\",\r\n\t\"challan_id\":\"$tax_challan_id\",\r\n\t\"commodity_id\":\"$tax_commodity_id\",\r\n\t\"type_code\":\"$tax_type_code\",\r\n\t\"created_by\":\"SYSTEM\",\r\n\t\"modified_by\":\"SYSTEM\",\r\n\t\"token\":\"123\",\r\n\t\"device\":\"android\"\r\n}",
                    ));
                    $response1 = curl_exec($curl);
                    $err = curl_error($curl);
                    curl_close($curl);
                    $res1 = json_decode($response1);
                    if ($err) {
                        echo "cURL Error #:" . $err;
                    }
                }
                
                if(isset($_SESSION['dealerDetails']['tax_dealer_id'])){
                    $DeptRefNo=$_SESSION['dealerDetails']['tax_dealer_code'];                    
                }else{
                    $DeptRefNo=111111;
                }                
                $curl = curl_init();
                $urlStr = "challan_id=" . $challan_id . "&depositorname=" . $depositors_name . "&amount=" . $challan_amount . "&PeriodFrom=" .$challan_from_dt. "&PeriodTo=" .$challan_to_dt. "&head=" .$mainHead. "&ddo=" .$ddo. "&DeptRefNo=" .$DeptRefNo. "&token=123&device=web";
                $url = urlencode($urlStr);
                $url = PAYMENT_POST_API_URL . '?' . $url;               
                
                echo $url;die;
                
                curl_setopt_array($curl, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                ));
                $response2 = curl_exec($curl);
//                print_r($response2);die;
                $err = curl_error($curl);
                curl_close($curl);
                $res2 = json_decode($response2);
                if ($err) {
                    echo "cURL Error #:" . $err;
                }
            }
            $result['result'] = 'success';
            $_SESSION['encryptedString'] = $res2->Result;
        } else {
            $result['result'] = 'failed';
        }
        echo json_encode($result);
        die;
    }

    public function makepayment() {
        $this->data['TITLE'] = TITLE_FRONT_MAKE_EPAYMENT;
        loadviewOnlyPage('front/', 'makepayment.php', $this->data);
    }
    public function updateTreasuryPayment($challan_id) {
        $encdata=$_POST['encdata'];        
        $url=BASE_URL_API."api/v1/transactionlist/return-hpetax-payment/".$challan_id;        
        $curl = curl_init();        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "$url",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\t\"encdata\":\"$encdata\",\r\n\t\"token\":\"123\",\r\n\t\"device\":\"android\"\r\n}",
        ));
        $response2 = curl_exec($curl);                  
        $err = curl_error($curl);
        curl_close($curl);
        $res2 = json_decode($response2);
        if ($err) {
            echo "cURL Error #:" . $err;
        }
        redirect(FRONT_VIEW_CHALLAN.$res2->Result);        
    }
    
    public function viewChallan($chalanId) {
        $this->data['TITLE'] = TITLE_FRONT_VIEW_CHALLAN;
        loadviewFront('front/', 'viewchallan.php', $this->data);
    }

    public function signupform() {
        $this->data['TITLE'] = TITLE_FRONT_SIGNUP_FORM;
        loadviewFront('front/', 'signupform.php', $this->data);
    }

    public function registration() {
        unset($_POST['submit']);
        $date = $_POST['tax_dealer_tin_expiry'];
        $_POST['tax_dealer_tin_expiry'] = dateFormatterMysql("$date");
        $existRecord = $this->home_m->getExistRecordByColumn($_POST['tax_dealer_tin'], 'tax_dealer_tin', 'tax_dealer');
        $existMobile = $this->home_m->getExistRecordByColumn($_POST['tax_dealer_mobile'], 'tax_dealer_mobile', 'tax_dealer');
        $existEmail = $this->home_m->getExistRecordByColumn($_POST['tax_dealer_email'], 'tax_dealer_email', 'tax_dealer');
        if ($existRecord) {
            $_SESSION['data'] = $_POST;
            $_SESSION['existrecord'] = 1;
            redirect(FRONT_SIGN_UP_LINK);
        }
        if ($existMobile) {
            $_SESSION['data'] = $_POST;
            $_SESSION['existmobile'] = 1;
            redirect(FRONT_SIGN_UP_LINK);
        }
        if ($existEmail) {
            $_SESSION['data'] = $_POST;
            $_SESSION['existemail'] = 1;
            redirect(FRONT_SIGN_UP_LINK);
        }
        $result = $this->home_m->registerationInsert($_POST);
        if ($result['res'] == 1 || !empty($result['id'])) {
            $_SESSION['adddata'] = 1;
            redirect(BASE_URL);
        } else {
            $_SESSION['data'] = $_POST;
            $_SESSION['Error'] = 1;
            redirect(FRONT_SIGN_UP_LINK);
        }
    }

    public function epaymentVerify() {
        $this->data['TITLE'] = TITLE_FRONT_VERIFY_E_PAYMENT;
        loadviewFront('front/', 'epaymentverify.php', $this->data);
    }

}

?>