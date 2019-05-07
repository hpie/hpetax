<!-- footer content -->
<footer>
    <div class="pull-right">
        <h4>Designe by <a href="http://www.codexives.com">Codexives.com</a></h4>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>
<div id="ApprovedstatusModal" class="modal main_popup fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close press_no" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> 
                <h4 class="modal-title" id="myModalLabel" style="">Confirmation!</h4>
            </div>
            <div class="modal-body">
                <p style="">Are you sure you want to <strong id="modelboxstatus" style="color: #0c97fe;">Approved?</strong></p>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #0c97fe;"> <button type="button" class="btn btn-default press_no" data-dismiss="modal">No</button> <button type="button" class="btn btn-primary press_yes" data-id="0" data-value="none">Yes</button> </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="<?php echo BASE_URL ?>assets/jquery/dist/jquery.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/icheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo BASE_URL ?>assets/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo BASE_URL ?>assets/nprogress/nprogress.js"></script>
<!-- DateJS -->
<script src="<?php echo BASE_URL ?>assets/moment/min/moment.min.js"></script>
<!-- PNotify -->
<script src="<?php echo BASE_URL ?>assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo BASE_URL ?>assets/pnotify/dist/pnotifyAdmin.js"></script>    
<!-- bootstrap-wysiwyg -->
<script src="<?php echo BASE_URL ?>assets/editor/jquery.hotkeys.js"></script>
<script src="<?php echo BASE_URL ?>assets/editor/prettify.js"></script>
<!-- Datatables -->
<script src="<?php echo BASE_URL ?>assets/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<!--Slider--> 
<!-- Custom Theme Scripts -->
<script src="<?php echo BASE_URL ?>assets/build/js/custom.min.js"></script>
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
<script>
    $(document).ready(function () {  
        $("#user_mobileNo").focusout(function () {
           $(this).css('border','1px solid #ccc');
        });
        $("#user_adharNo").focusout(function () {
           $(this).css('border','1px solid #ccc');
        });
        $("#user_panNo").focusout(function () {
           $(this).css('border','1px solid #ccc');
        });
         
        
        
        $('#sameAs').change(function() {
            if($(this).is(":checked")) {           
                $('#user_permanentAddress').val($('#user_address').val());
                $('#user_permanentCity').val($('#user_city').val());
                $('#user_permanentPin').val($('#user_pin').val());
                $('#user_parmenentState').val($('#user_state').val());
            }
            else{
                $('#user_permanentAddress').val('');
                $('#user_permanentCity').val('');
                $('#user_permanentPin').val('');
                $('#user_parmenentState').val('');
            }
        }); 

        $(".myTable").DataTable({
            dom: "Bfrtip",
            buttons: [
                  {
                    extend: "copy",
                    className: "btn-sm"
                  },
                  {
                    extend: "csv",
                    className: "btn-sm"
                  },
                  {
                    extend: "excel",
                    className: "btn-sm"
                  },
                  {
                    extend: "pdfHtml5",
                    className: "btn-sm"
                  },
                  {
                    extend: "print",
                    className: "btn-sm"
                  },
            ],
            "ordering": false,
            "pageLength": 20,
            "orderable": false,
            "bLengthChange": false,
            "paging": true,
            "info": false,
            "bFilter": true,
            "bSort": false,
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return 'Details for ' + data[0] + ' ' + data[1];
                        }
                    }),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            }
        });
        
        
         $("#refUser_id_input").on('focusout', function (e) {                   
            var $input = $(this),
            val = $input.val();
            list = $input.attr('list'),
            match = $('#' + list + ' option').filter(function () {
            return ($(this).val().toUpperCase() === val.toUpperCase());
            });                                                       
            if (match.length > 0) {
                $input.css("border", "solid 1px #e3e7ea");                                                
            } else {
                $input.val('');
                $input.css("border", "solid 1px red");
            }                                                                                
        });   
        
        
//        $("table").delegate(".Change_status", "click", function () {
//            var id = $(this).data('id');
//            var table = $(this).data('value');
//            var status = $(this).data('status');
//            var _all = $("#ApprovedstatusModal");
//            $(".press_yes").attr('data-id', id);
//            $(".press_yes").attr('data-value', table);
//            $(".press_yes").attr('data-status', status);
//            if (status == '1') {
//                $('#modelboxstatus').html("inActive ?");
//            }
//            if (status == '0') {
//                $('#modelboxstatus').html("Active ?");
//            }
//            _all.removeAttr("style");
//            _all.css("display", "block");
//            return false;
//        });
//        $(document).on('click', '.press_no', function (e) {
//            e.preventDefault();
//            var _all = $("#ApprovedstatusModal");
//            $(".press_yes").attr('data-id', 0);
//            _all.removeAttr("style");
//            _all.css("display", "none");
//            return false;
//        });
//        $(document).on('click', '.press_yes', function (e) {
//            var _all = $("#ApprovedstatusModal");
//            _all.removeAttr("style");
//            _all.css("display", "none");
//            var id = $(this).data('id');
//            var table = $(this).data('value');
//            var status = $(this).data('status');
//            if (table == "customer" || table == "installation" || table == "technician" || table == "amc")
//            {
//                //  alert(status)
//                if (status == '0') {
//                    status = 1;
//                } else {
//                    status = 0;
//                }
//                var urlreq = '<?php //BASE_URL; ?>' + 'status';
//                $.ajax({type: "POST",
//                    dataType: "json",
//                    data: {id: id, status: status, table: table},
//                    url: urlreq,
//                    success: function (_returnData) {
//                        if (_returnData.success == "success")
//                            setTimeout(function () {
//                                location.reload();
//                            }, 1000);
//                    }
//                });
//            } else {
//            }
//            return true;
//        });
        
      
        
//        $("#user_mobileNo").keyup(function () {
//            var mobile = $(this).val();
//            if (mobile.length == 10) {
//                var urlReq = '<?php //echo EXIST_MOBILE_CHECK_LINK; ?>';
//                $.ajax({type: "POST",
//                    dataType: "json",
//                    url: urlReq,
//                    data: {mobile: mobile},
//                    success: function (_returnData) {
//                        if (_returnData.success == 'success')
//                            setTimeout(function () {
//                                $('#customer_contact').val('');
//                                new PNotify({
//                                    title: 'mobile is allready exist',
//                                    type: 'error',
//                                    styling: 'bootstrap3'
//                                });
//                            }, 500);
//                    }
//                });
//            }
//        });
<?php // if (isset($result['customer_id'])) {
    ?>
//            $("#customer_contact1").keyup(function () {
//                var cid =<?php //echo $result['customer_id']; ?>;
//                var mobile = $(this).val();
//                if (mobile.length == 10) {
//                    var urlReq = '<?php //echo EXIST_MOBILE_CHECK_LINK2; ?>';
//                    $.ajax({type: "POST",
//                        dataType: "json",
//                        url: urlReq,
//                        data: {mobile: mobile, cid: cid},
//                        success: function (_returnData) {
//                            if (_returnData.success == 'success')
//                                setTimeout(function () {
//                                    $('#customer_contact1').val('');
//                                    new PNotify({
//                                        title: 'mobile is allready exist',
//                                        type: 'error',
//                                        styling: 'bootstrap3'
//                                    });
//                                }, 500);
//                        }
//                    });
//                }
//            });
<?php //}
?>


//        $(document).on('click', '.deleteData', function (e) {
//            var id = $(this).data('id');
//            var table = $(this).data('value');
//            var urlreq = '';
//            // alert(urlreq)
//            $.ajax({type: "POST",
//                dataType: "json",
//                data: {id: id, table: table},
//                url: urlreq,
//                success: function (_returnData) {
//                    if (_returnData.success == "success")
//                        setTimeout(function () {
//                            location.reload();
//                        }, 1000);
//                }
//            });
//
//            return true;
//        });


        if ('<?php
if (isset($_SESSION['allAdvisorCollectionNotEnough'])) {
    echo $_SESSION['allAdvisorCollectionNotEnough'];
}
?>' == 1) {
            var d = new PNotify({
                title: 'all Advisor collection is less than 50,000. This agent is not eligible forG.M Position.',
                type: 'error',
                styling: 'bootstrap3'
            });
            '<?php echo $_SESSION['allAdvisorCollectionNotEnough'] = 0; ?>';
        }

        if ('<?php
if (isset($_SESSION['notenoughadvisor'])) {
    echo $_SESSION['notenoughadvisor'];
}
?>' == 1) {
            var d = new PNotify({
                title: 'Have under less then 5 agent. Not eligible for GM Position',
                type: 'error',
                styling: 'bootstrap3'
            });
            '<?php echo $_SESSION['notenoughadvisor'] = 0; ?>';
        }


        if ('<?php
if (isset($_SESSION['collectionnotvalid'])) {
    echo $_SESSION['collectionnotvalid'];
}
?>' == 1) {
            var d = new PNotify({
                title: 'This agent monthly collection is less than 10,000. Not enough for GM Position',
                type: 'error',
                styling: 'bootstrap3'
            });
            '<?php echo $_SESSION['collectionnotvalid'] = 0; ?>';
        }


        if ('<?php
if (isset($_SESSION['notvalid'])) {
    echo $_SESSION['notvalid'];
}
?>' == 1) {
            var d = new PNotify({
                title: 'Please Enter valid collection amount Or Check this account is valid Or not',
                type: 'error',
                styling: 'bootstrap3'
            });
            '<?php echo $_SESSION['notvalid'] = 0; ?>';
        }

        if ('<?php
if (isset($_SESSION['existAgent'])) {
    echo $_SESSION['existAgent'];
}
?>' == 1) {
            var d = new PNotify({
                title: 'This user is allready agent',
                type: 'error',
                styling: 'bootstrap3'
            });
            '<?php echo $_SESSION['existAgent'] = 0; ?>';
        }


        if ('<?php
if (isset($_SESSION['existaccount'])) {
    echo $_SESSION['existaccount'];
}
?>' == 1) {
            var d = new PNotify({
                title: 'This account allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
            '<?php echo $_SESSION['existaccount'] = 0; ?>';
        }

        if ('<?php
if (isset($_SESSION['existmobile'])) {
    echo $_SESSION['existmobile'];
}
?>' == 1) {
            var d = new PNotify({
                title: 'Mobile no is allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
            '<?php echo $_SESSION['existmobile'] = 0; ?>';
        }
                if ('<?php
if (isset($_SESSION['existAdhar'])) {
    echo $_SESSION['existAdhar'];
}
?>' == 1) {
            var d = new PNotify({
                title: 'Adhar no is allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
            '<?php echo $_SESSION['existAdhar'] = 0; ?>';
        }
                if ('<?php
if (isset($_SESSION['existpan'])) {
    echo $_SESSION['existpan'];
}
?>' == 1) {
            var d = new PNotify({
                title: 'PAN No is allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
            '<?php echo $_SESSION['existpan'] = 0; ?>';
        }

        if ('<?php
if (isset($_SESSION['existdata'])) {
    echo $_SESSION['existdata'];
}
?>' == 1) {
            var d = new PNotify({
                title: 'Mobile no is allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
            '<?php echo $_SESSION['existdata'] = 0; ?>';
        }


        if ('<?php
if (isset($_SESSION['adddata'])) {
    echo $_SESSION['adddata'];
}
?>' == 1) {
            var d = new PNotify({
                title: 'Record added successfully',
                type: 'success',
                styling: 'bootstrap3'
            });
            '<?php echo $_SESSION['adddata'] = 0; ?>';
        }
        if ('<?php
if (isset($_SESSION['dataupdate'])) {
    echo $_SESSION['dataupdate'];
}
?>' == 1) {
            var d = new PNotify({
                title: 'Data update successfully',
                type: 'success',
                styling: 'bootstrap3'
            });
            '<?php echo $_SESSION['dataupdate'] = 0; ?>';
        }
    });
</script>
<script>
    $(document).ready(function () {
//        $("input[name='refCustomer_id']").on('focusout', function (e) {
//            var $input = $(this),
//                    val = $input.val();
//            list = $input.attr('list'),
//                    match = $('#' + list + ' option').filter(function () {
//                return ($(this).val().toUpperCase() === val.toUpperCase());
//            });
//            var dateArr = $('#appointment_date').val();
//            if (match.length > 0) {
//                $input.css("border", "solid 1px #e3e7ea");
//                if (dateArr !== '') {
//                    $('#appoint1').css("visibility", "visible");
//                }
//            } else {
//                $input.val('');
//                $input.css("border", "solid 1px red");
//            }
//        });
//        $('#dp4').datepicker({
//            format: 'yyyy-mm-dd',
//            autoclose: true,
//            startDate: '-1d'
//        });    
//            $("#datepicker" ).datepicker(
//                {
//                    maxDate:new Date()           
//                }
//            );         
//        $('#dp5').datepicker({
//            format: 'yyyy-mm-dd',
//            autoclose: true,
//            startDate: '-1d'
//        });
//        $('#dp6').datepicker({
//            format: 'yyyy-mm-dd',
//            autoclose: true,
//            startDate: '0d'
//        });        
//        $('#myDatepicker2').datetimepicker({
//            format: 'YYYY-MM-DD'
//        });        
//        $('#datatable-responsive').DataTable();

       $('.single_cal1').daterangepicker({                            
            singleDatePicker: true,
            singleClasses: "picker_1",
            maxDate:new Date(),            
            locale: {
                        format: 'YYYY-MM-DD'
                    }
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
    });
</script>
<?php
   if(isset($_SESSION['existmobile'])){
        unset($_SESSION['existmobile']);
    }
    if(isset($_SESSION['existAdhar'])){
        unset($_SESSION['existAdhar']);
    }
    if(isset($_SESSION['existpan'])){
        unset($_SESSION['existpan']);
    }
?>
</body>
</html>