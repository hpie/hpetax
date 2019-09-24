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

        $('#confirm').on('click', function () {
            var alertstr = [];
            var returnval = 0;
            var name = $("#name").val();
            var mobileno = $("#mobileno").val();
            var address = $("#address").val();
            var location = $('#location').children("option:selected").val();
            if (name === '' || name === 0) {
                alertstr.push("Name of person is required");
                returnval = 1;
            }
            if (mobileno === '' || mobileno === 0) {
                alertstr.push("Mobile Number is required");
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
                $('#address').attr('disabled', true);
                $('#day').attr('disabled', true);
                $('#email').attr('disabled', true);
                $('#startdate').attr('disabled', true);
                $('#enddate').attr('disabled', true);
                $('#reciptscheck').attr('disabled', true);
                $('#total').attr('disabled', true);
            }
        });
        $('#back').on('click', function () {
                $('#confirm').removeClass("location");
                $('#confirm').attr("disabled", false);
                $('#submit').addClass("location"); 
                $('#back').addClass("location");                                
                $('#name').attr('disabled', false);
                $('#mobileno').attr('disabled', false);
                $('#address').attr('disabled', false);
                $('#day').attr('disabled', false);
                $('#email').attr('disabled', false);
                $('#startdate').attr('disabled', false);
                $('#enddate').attr('disabled', false);
                $('#reciptscheck').attr('disabled', false);
                $('#total').attr('disabled', false);
        });
        $('#submit').on('click', function () {            
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {id: 1},
                url: '<?php echo BASE_URL; ?>addChalan',
                success: function (_returnData) {
                    if (_returnData.result == "success") {
                        alert('success');
                    }
                }
            });
        });
    });
</script>