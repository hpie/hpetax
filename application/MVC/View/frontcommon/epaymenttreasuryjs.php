<!--<script src="<?php echo ASSETS_FRONT; ?>datetime/js/bootstrap-datetimepicker.min.js"></script>-->
<script src="<?php echo ASSETS_FRONT; ?>datetime/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function () {
        $('.input-daterange').datepicker({
            todayBtn: "linked",
            clearBtn: true,
            autoclose: true,
            todayHighlight: true,
            format: "dd/mm/yyyy"
        });
        $('#receipt').on('change', function () {            
            var receiptHead = $('#receipt').children("option:selected").val();
            var tax_type_head = $("#tax_type_head").val();
            var tax_commodity_head = $("#tax_commodity_head").val();
            $("#receiptCode").text(tax_type_head+'-'+tax_commodity_head+'-'+receiptHead);            
        });
        $('#confirm').on('click', function () {        
            if (confirm('Are you sure you want confirm?')) {
            var alertstr = [];
            var returnval = 0;
            var name = $("#name").val();
            var city = $("#city").val();
            var pin = $("#pin").val();
            var mobileno = $("#mobileno").val();
            var address = $("#address").val();
            var location = $('#location').children("option:selected").val();
            var receiptHead = $('#receipt').children("option:selected").val();
            var day = $('#day').children("option:selected").val();            
            if (name === '' || name === 0) {
                alertstr.push("Name of person is required");
                returnval = 1;
            }
            if (mobileno === '' || mobileno === 0) {
                alertstr.push("Mobile Number is required");
                returnval = 1;
            }
            if (city === '' || city === 0) {
                alertstr.push("City is required");
                returnval = 1;
            }
             if (pin === '' || pin === 0) {
                alertstr.push("PIN Number is required");
                returnval = 1;
            }
            if (address === '' || address === 0) {
                alertstr.push("Address is required");
                returnval = 1;
            }
            if (location == 0) {
                alertstr.push("Please select Location Name from the dropdown only.");
                returnval = 1;
            }            
            if (receiptHead == 0) {
                alertstr.push("Please select Receipt from the dropdown only.");
                returnval = 1;
            }
            if (day == 0) {
                alertstr.push("Please select Dealer Type from the dropdown only.");
                returnval = 1;
            }            
            if (returnval == 1) {
                var text = "";
                var i;
                for (i = 0; i < alertstr.length; i++) {
                    text += (i + 1) + "." + alertstr[i] + "\n";
                }
                alert(text);
                return false;
            } else {
                $("#sumofamount").text($("#total").val());
                $("#finaltotal").val($("#total").val());
                $(this).addClass("location");
                $(this).attr("disabled", true);
                $('#submit').removeClass("location"); 
                $('#back').removeClass("location");                                
                $('#name').attr('disabled', true);
                $('#mobileno').attr('disabled', true);
                $('#city').attr('disabled', true);
                $('#pin').attr('disabled', true);
                $('#address').attr('disabled', true);
                $('#day').attr('disabled', true);
                $('#receipt').attr('disabled', true);
                $('#location').attr('disabled', true);
                $('#email').attr('disabled', true);
                $('#startdate').attr('disabled', true);
                $('#enddate').attr('disabled', true);
                $('#reciptscheck').attr('disabled', true);
                $('#total').attr('disabled', true);
            }
        }
        });
        $('#back').on('click', function () {
            if (confirm('Are you sure you want to edit?')) {
                $('#confirm').removeClass("location");
                $('#confirm').attr("disabled", false);
                $('#submit').addClass("location"); 
                $('#back').addClass("location");                                
                $('#name').attr('disabled', false);
                $('#mobileno').attr('disabled', false);
                $('#city').attr('disabled', false);
                $('#pin').attr('disabled', false);
                $('#address').attr('disabled', false);
                $('#day').attr('disabled', false);
                $('#receipt').attr('disabled', false);
                $('#location').attr('disabled', false);
                $('#email').attr('disabled', false);
                $('#startdate').attr('disabled', false);
                $('#enddate').attr('disabled', false);
                $('#reciptscheck').attr('disabled', false);
                $('#total').attr('disabled', false);                
            }
        });
        $('#submit').on('click', function () {
            if (confirm('Are you sure you want to pay?')) { 
            
            var tax_type_head=$("#tax_type_head").val();
            var tax_commodity_head=$("#tax_commodity_head").val();
            var challan_receipt_head = $('#receipt').children("option:selected").val();
            var challan_ddo = $('#location').children("option:selected").val();
            
            var challan_location = $('#location').children("option:selected").text();           
            var challan_title="dummy"; 
            var challan_purpose="dummy";
            var tax_dealer_id=$("#tax_dealer_id").val(); 
            var depositors_name=$("#name").val();          
            var depositors_phone=$("#mobileno").val();
            var depositors_email=$("#email").val();
            var depositors_city=$("#city").val();          
            var depositors_zip=$("#pin").val();
            var depositors_address=$("#address").val();                  
            var challan_duration=$("#day").val();            
            var challan_from_dt=$("#startdate").val();
            var challan_to_dt=$("#enddate").val();                                 
            var challan_amount=$("#finaltotal").val();
            var transaction_no=0;
            var transaction_status="PENDING";
            var challan_status="ACTIVE";
            var type_code=$("#type_code").val();            
            var token='123';
            var device="android";            
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {depositors_email:depositors_email,tax_type_head:tax_type_head,tax_commodity_head:tax_commodity_head,challan_receipt_head:challan_receipt_head,challan_ddo:challan_ddo,challan_title:challan_title,tax_dealer_id:tax_dealer_id,depositors_name:depositors_name,depositors_phone:depositors_phone,depositors_city:depositors_city,depositors_zip:depositors_zip,depositors_address:depositors_address,challan_location:challan_location,challan_duration:challan_duration,challan_from_dt:challan_from_dt,challan_to_dt:challan_to_dt,challan_purpose:challan_purpose,challan_amount:challan_amount,transaction_no:transaction_no,transaction_status:transaction_status,challan_status:challan_status,type_code:type_code,token:token,device:device},
                url: '<?php echo FRONT_ADD_CHALLAN_LINK; ?>',
                success: function (_returnData) {
                    if (_returnData.result == "success") {
                        window.location = "<?php echo TITLE_FRONT_MAKE_EPAYMENT; ?>";
                    } else {
                        alert('Please complete the add tax process');
                    }
                }
            });
            }
        });
    });
</script>