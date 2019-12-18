<?php

//tax_master, tax_type, tax_commodity
class app_c extends Controllers {

    public $app_m;

    public function __construct() {
        parent::__construct();
        $this->app_m = $this->loadModel('app_m');
    }

    public function invoke() {
        $this->data['TITLE'] = TITLE_FRONT_COMMON;
        loadviewFront('front/', 'home.php', $this->data);
    }


    public function app_payment($challan_id) {
        $this->data['TITLE'] = "Tax Payment";
        
        $this->data['challan_data'] = $challan_data = $this->app_m->getTaxChallan($challan_id);
        
        //======================================================================
        
        $curl = curl_init();
        //$urlStr = "challan_id=" . $challan_data['tax_challan_id'] . "&depositorname=" . $challan_data['tax_depositors_name'] . "&amount=" . $challan_data['tax_challan_amount'] . "&token=123&device=web";
        
        //$urlStr = "challan_id=" . $challan_data['tax_challan_id'] . "&depositorname=" . $challan_data['tax_depositors_name'] . "&amount=1&token=123&device=android";

		//challan_id=47523133741315992606&depositorname=central bank of india&amount=5&PeriodFrom=2019-12-04&PeriodTo=2019-12-04&head=0042-00-104-02&ddo=BLP00-509&DeptRefNo=111111&token=123&device=web

		//echo "========>>>>>>>> <pre>"; print_r($challan_data);

        $main_head = $this->app_m->getMainHead($challan_id, $challan_data['receipt']);
		$ddo = strtoupper($challan_data['ddo']);
		//echo "========>>>>>>>> <pre>" . $ddo . " ||| "; print_r($main_head); exit;

        //$urlStr = "challan_id=" . $challan_data['tax_challan_id'] . "&depositorname=" . $challan_data['tax_depositors_name'] . "&amount=1&token=123&device=web&is_test=1";
// $challan_data['tax_challan_from_dt'] $challan_data['tax_challan_to_dt']
		//$urlStr = "challan_id=" . $challan_data['tax_challan_id'] . "&depositorname=" . $challan_data['tax_depositors_name'] . "&amount=1&PeriodFrom=".$challan_data['tax_challan_from_dt']."&PeriodTo=".$challan_data['tax_challan_to_dt']."&head=0042-00-104-02&ddo=BLP00-509&DeptRefNo=111111&token=123&device=android&is_test=1";

		$urlStr = "challan_id=" . $challan_data['tax_challan_id'] . "&depositorname=" . $challan_data['tax_depositors_name'] . "&amount=1&PeriodFrom=".$challan_data['tax_challan_from_dt']."&PeriodTo=".$challan_data['tax_challan_to_dt']."&head=".$main_head."&ddo=".$ddo."&DeptRefNo=111111&token=123&device=android&is_test=1";

		//echo $urlStr; exit;
        
        $url = urlencode($urlStr);
        //$url = PAYMENT_POST_API_URL . '?' . $url;
        //$url = BASE_URL_API.'api/v1/transactionlist/hpetax-payment' . '?' . $url;
        
        $url = BASE_URL_API.'api2/v1/transactionlist/hpetax-payment' . '?' . $url;

		//$url = 'https://hpie.in/hpetax/api/v1/transactionlist/hpetax-payment' . '?' . $url;

		
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
        
        //echo "======<pre>"; print_r($response2); exit;
        $err = curl_error($curl);
        curl_close($curl);
        $res2 = json_decode($response2);
        if ($err) {
        echo "cURL Error #:" . $err;
        }
        
        
        $this->data['encryptedString'] = $res2->Result;
        
        //======================================================================
        
        //echo "====>>>>>>> <pre>"; print_r($this->data); exit;
        
        loadviewFront('app/', 'app_payment.php', $this->data);
    }
    
    public function updateTreasuryPayment($challan_id) {
        $encdata=$_POST['encdata'];        
        $url=BASE_URL_API."api2/v1/transactionlist/return-hpetax-payment2/".$challan_id;  
        
        //echo "=======>>>>>>. <pre>"; print_r($_POST); exit;
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
       // print_r($res2);die;
        
        
        $this->data['TITLE'] = "Return Page";
        loadviewOnlyPage('app/', 'return_page.php', $this->data);
    }

}

?>