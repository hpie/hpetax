
<style>
    select, option {
        width: 250px;
    }

    option {
        overflow: hidden;
        white-sapce: no-wrap;
        text-overflow: ellipsis;
    } 
    .hovercs:hover {
        color: red;
    }
    td, th{
        border: 1px solid #dddddd !important;   
        padding: 8px !important;
    }
    #map {
        height: 100%;
        width: 100%;
    }
    .location{
        display: none;
    }
</style>
<?php
//DEFINE our cipher
//define('AES_256_CBC', 'aes-256-cbc');
//$encryption_key = openssl_random_pseudo_bytes(32);
//$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(AES_256_CBC));
//$data = "EchTxnId=A13J100007|BankCIN=IK00989808|Bank=SBP|Status=0|StatusCd=Transaction Failure|AppRefNo=136|Amount=100|PrintChallan=PaidChallan|DeptRefNo=20135";
//$str='';
//$s = md5($data, true);
//for ($i=0; $i < strlen($s); $i++){
//    $str.=ord($s[$i]) . ' ';
//}
//$data.="|checkSum=".sha1($str);
//$encrypted = openssl_encrypt($data, AES_256_CBC, $encryption_key, 0, $iv);
//$encrypted1 = $encrypted . ':' . base64_encode($iv);
//$parts = explode(':', $encrypted1);
//$decrypted = openssl_decrypt($parts[0], AES_256_CBC, $encryption_key, 0, base64_decode($parts[1]));
//echo $encrypted;

//$b=str_split($str);
//$length=strlen($str*2);
//foreach ($b as $row){
//    
//}
//$ByteHash=explode(" ", $str);
//print_r($ByteHash);die;
//$hex = count($ByteHash);

//$hexarray=array();
//foreach ($ByteHash as $row){
//    $row.="{0:x2}";
//    array_push($hexarray, $row);
//}
//print_r($hexarray);die;
//$hex=implode($ByteHash, '%2');
//function hexToStr($hex){
//    $string='';
//    for ($i=0; $i < strlen($hex)-1; $i+=2){
//        $string .= chr(hexdec($hex[$i].$hex[$i+1]));
//    }
//    return $string;
//}
//echo hexToStr($hex);die;
//$hex= count($ByteHash)*2;
//$chars = array_map("chr", $ByteHash);
//$bin = join($chars);
//$hex = bin2hex($bin);
//echo $hex;die;
//print_r($bytes);die;


//function encrypt_e($input, $ky){
////	$ky   = html_entity_decode($ky);
//	$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(AES_256_CBC));
//	$data = openssl_encrypt ( $input , "AES_256_CBC" , $ky, 0, $iv );
//	return $data;
//}
//function decrypt_e($crypt, $ky){
//	$ky   = html_entity_decode($ky);
//	$iv = "@@@@&&&&####$$$$";
//	$data = openssl_decrypt ( $crypt , "AES_256_CBC" , $ky, 0, $iv );
//	return $data;
//}
//function getChecksumFromString($str, $key) {	
//	$salt = generateSalt_e(4);
//	$finalString = $str . "|" . $salt;
//	$hash = hash("sha256", $finalString);
//	$hashString = $hash . $salt;
//	$checksum = encrypt_e($hashString, $key);
//	return $checksum;
//}
//function generateSalt_e($length) {
//	$random = "";
//	srand((double) microtime() * 1000000);
//	$data = "AbcDE123IJKLMN67QRSTUVWXYZ";
//	$data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
//	$data .= "0FGH45OP89";
//	for ($i = 0; $i < $length; $i++) {
//		$random .= substr($data, (rand() % (strlen($data))), 1);
//	}
//	return $random;
//}
//echo $encdata;die;
//

//**************new latest*******************//
//$data = "DeptID=228|DeptRefNo=20135|TotalAmount=200|TenderBy=Mohan lal |AppRefNo=135|Head1=0230-00-104-01|Amount1=200|Ddo=BLP00-538|PeriodFrom=01-01-2013|PeriodTo=01-04-2013";
//$str='';
//$s = md5($data, true);
//for ($i=0; $i < strlen($s); $i++){
//    $str.=ord($s[$i]) . ' ';
//}
//$data.="|checkSum=".sha1($str);
//$encrypted = encryptAPIData($data);




//$aes=new AES();
//$aes->data=$data;
//$encrypted=$aes->encrypt();
//**************new latest end*******************//

?>
<!--<form action='https://himkosh.hp.nic.in/echallan/WebPages/wrfApplicationRequest.aspx' id='aspnetForm' method='POST'>
    <input type=hidden name="encdata" value="//<?php echo $encrypted; ?>"/>
    <input type=hidden name="merchant_code" value='HIMKOSH114'/>    
</form>
<script type='text/javascript'>
    document.getElementById('aspnetForm').submit();
</script> -->

<div class="col-md-9 col-sm-12  col-12 ">
    <div class="middle-area box-shadow">
        <h1 class="heading" style="text-align: center;">e-Payment <?php if(!isset($_SESSION['dealerDetails']['tax_dealer_id'])){ ?>(Unregistered)<?php } ?></h1>        
        <br>      
        <!-- The Modal -->
        <div class="modal fade" id="details-remarks">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header bg-success mb-0">
                        <h4 class="modal-title  text-white">Details / Remarks</h4>
                        <button type="button" class="close text-white"
                                data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <table class="table table-responsive">
                            <tr>
                                <td>Subject</td>
                                <td>MRP Order dated 03-04-2019-IMFS for the Year 2019-20</td>
                            </tr>
                            <tr>
                                <td> Detail</td>
                                <td>MRP Order dated 03-04-2019-IMFS for the Year 2019-20</td>
                            </tr>
                            <tr>
                                <td>Publish Date</td>
                                <td>03/04/2019</td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="#">
                                        <i class="fa fa-download color-white" aria-hidden="true"></i> &nbsp;Download (English Version)
                                    </a> </td>
                            </tr>
                        </table>
                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>       
        <div class="row section-row">
            <div class="col-md-12 col-sm-12 col-12">                
                <center><h4 class="sm-heading">e-Payment (Unregistered)</h4></center>   

                <input type="hidden" id="hiderate">
                <input type="hidden" id="modifyIdInput">                
                <table class="table" border="1" id="tabledata">
                    <tr>
                        <td>&nbsp;</td>
                        <td>Tax Type*</td>
                        <td>
                            <select class="" required="" id="taxType">                                            
                                <option class="" value="0" selected="">Select</option>                                           
                                <?php
                                if (!empty($result)) {
                                    foreach ($result as $row) {
                                        ?>
                                        <option class="" value="<?php echo $row['tax_type_id']; ?>"><?php echo $row['tax_type_name']; ?></option>                                       
                                        <?php
                                    }
                                }
                                ?>                                    
                            </select>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>   
                    <tr id="commoditytr">
                        <td>&nbsp;</td>
                        <td>Commodity / Description*</td>
                        <td>
                            <select class="" required="" id="commodity">                                            
                                <option class="" value="0" selected="">Select</option>                                                                                                                   
                            </select>
                        </td>
                        <td>&nbsp;</td>
                        <td>Vehicle Number*</td>
                        <td><input type="text" id="vehicleno" required="required" <?php if (isset($_SESSION['vehicleno_session'])) {
                                    echo 'value="' . $_SESSION['vehicleno_session'] . '"';
                                } ?>></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr> 
                    <tr class="location" id="locationtr">
                        <td>&nbsp;</td>
                        <td>Source Location*</td>
                        <td><input id="sourcelocation" class="clearalltext" type="text" placeholder="Source Location" required="required"></td>
                        <td>&nbsp;</td>
                        <td>Destination Location*</td>
                        <td><input id="destinationlocation" class="clearalltext" type="text" placeholder="Destination Location" required="required"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12 location" id="mapdisplay" style="height: 300px;">                           
                <div id="map"></div> 
            </div>
            <br>
            <br>
            <div class="col-md-12" id="addbuttondiv">
                <style>
                    button{
                        width:50px !important;
                        background-color:#264a62 !important;
                        color:#fff !important;
                    }
                </style>
                <center><button id="add">Add</button>&nbsp;&nbsp;<button id="clearAdd">Clear</button></center>                
            </div>
            <div class="col-md-12" id="modifybuttondiv" style="display: none">
                <style>
                    button{
                        width:50px !important;
                        background-color:#264a62 !important;
                        color:#fff !important;
                    }
                </style>                
                <center><button id="update">Modify</button>&nbsp;&nbsp;<button id="clearModify">Clear</button></center>
            </div>

        </div>

        <br>
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">          
                <style>
                    tr th{
                        padding: 10px;
                    }
                </style>
                <table style="width:100%" border="1">
                    <thead class="sm-heading">
                        <tr class="ajaxtr">
                            <!--<th>Sr. No</th>-->
                            <th class="custometh">Delete</th>
                            <th class="custometh">Modify</th>
                            <th class="custometh">Tax Type</th>
                            <th class="custometh">Commodity / Description</th>
                            <th class="custometh">Vehicle Number</th>
                            <th class="custometh">Weight</th>
                            <th class="custometh">Unit</th>
                            <th class="custometh quantity">Quantity</th>
                            <th class="custometh">Source Location</th>
                            <th class="custometh">Destination Location</th>
                            <th class="custometh">Distance (in Km) within HP</th>
                            <th class="custometh">Total Tax (in Rs.)</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">                
                    </tbody>
                </table>
            </div>            
            <div class="col-md-12" style="background-color:#264a62;color:#fff;margin-top: 150px;">               
                <center>Total: <input id="total" type="text" readonly=""></center>                
            </div>

            <div class="col-md-12">
                <br>
                <center><button id="confirm">Confirm</button>&nbsp;&nbsp;<button id="back" onclick="window.history.back();">Back</button></center>
            </div>
        </div>
    </div>
</div>

