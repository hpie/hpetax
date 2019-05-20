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
<script src="<?php echo BASE_URL ?>assets/pnotify/dist/pnotifyadmin.js"></script>    
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
        if (<?php if (isset($_SESSION['Error'])) { echo $_SESSION['Error']; } ?> == 1) {
            var d = new PNotify({
                title: 'Please try again you are not change any data',
                type: 'error',
                styling: 'bootstrap3'
            });
            <?php echo $_SESSION['Error'] = 0; ?>;
        }
        
        if (<?php if (isset($_SESSION['existrecord1'])) { echo $_SESSION['existrecord1']; } ?> == 1) {
            var d = new PNotify({
                title: 'This Name is allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
            <?php echo $_SESSION['existrecord1'] = 0; ?>;
        }
        
        if (<?php if (isset($_SESSION['existrecord'])) { echo $_SESSION['existrecord']; } ?> == 1) {
            var d = new PNotify({
                title: 'This ID is allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
            <?php echo $_SESSION['existrecord'] = 0; ?>;
        }
        
        if (<?php if (isset($_SESSION['adddata'])) { echo $_SESSION['adddata']; } ?> == 1) {
            var d = new PNotify({
                title: 'Record added successful',
                type: 'success',
                styling: 'bootstrap3'
            });
            <?php echo $_SESSION['adddata'] = 0; ?>;
        }
         if (<?php if (isset($_SESSION['dataupdate'])) { echo $_SESSION['dataupdate']; } ?> == 1) {
            var d = new PNotify({
                title: 'Record updated successful',
                type: 'success',
                styling: 'bootstrap3'
            });
            <?php echo $_SESSION['dataupdate'] = 0; ?>;
        }      
        
        if (<?php if (isset($_SESSION['tax_transaction_head_exisit'])) { echo $_SESSION['tax_transaction_head_exisit']; } ?> == 1) {
            var d = new PNotify({
                title: 'This transaction head allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
            <?php echo $_SESSION['tax_transaction_head_exisit'] = 0; ?>;
        }   
          if (<?php if (isset($_SESSION['tax_transaction_dept_exisit'])) { echo $_SESSION['tax_transaction_dept_exisit']; } ?> == 1) {
            var d = new PNotify({
                title: 'This transaction dept allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
            <?php echo $_SESSION['tax_transaction_dept_exisit'] = 0; ?>;
        }   
        if (<?php if (isset($_SESSION['tax_transaction_ddo_exisit'])) { echo $_SESSION['tax_transaction_ddo_exisit']; } ?> == 1) {
            var d = new PNotify({
                title: 'This transaction ddo allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
            <?php echo $_SESSION['tax_transaction_ddo_exisit'] = 0; ?>;
        }  
         if (<?php if (isset($_SESSION['tax_type_name_exist'])) { echo $_SESSION['tax_type_name_exist']; } ?> == 1) {
            var d = new PNotify({
                title: 'This tax type name allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
            <?php echo $_SESSION['tax_type_name_exist'] = 0; ?>;
        }
           if (<?php if (isset($_SESSION['tax_commodity_name'])) { echo $_SESSION['tax_commodity_name']; } ?> == 1) {
            var d = new PNotify({
                title: 'This tax commodity name allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
            <?php echo $_SESSION['tax_commodity_name'] = 0; ?>;
        }
    });
</script>
<script>
    $(document).ready(function () {     
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
       
        $('.single_cal1').daterangepicker({
            singleDatePicker: true,
            singleClasses: "picker_1",
            maxDate: new Date(),
            locale: {
                format: 'YYYY-MM-DD'
            }
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
    });
</script>
<?php
    if(isset($_SESSION['data'])){
        unset($_SESSION['data']);
    }
?>
</body>
</html>