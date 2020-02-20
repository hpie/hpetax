<!-- footer content -->
<footer>
    <div class="pull-right">
        <h4>Designed by <a href="http://hpie.in" target="_blank">H.P.I.E</a></h4>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
<!--<script src="<?php echo BASE_URL; ?>/assets/front/js/jquery.dataTables.min.js" type="text/javascript"></script>-->
<script type="text/javascript" language="javascript" src="<?php echo BASE_URL; ?>/assets/front/js/dataTables.responsive.min.js"></script>
<!--Slider--> 
<!-- ECharts -->
<script src="<?php echo BASE_URL ?>assets/echarts/dist/echarts.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/echarts/map/js/world.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?php echo BASE_URL ?>assets/build/js/custom.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/moment/moment.min.js"></script>
<!--<script src="<?php echo BASE_URL; ?>assets/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>-->
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {                
        $('input[type=text]').keypress(function (e) {                 
            var keyCode = e.keyCode || e.which;            
            var charCode = (e.which) ? e.which : e.keyCode;            
            if (charCode == 60 || charCode == 96 || charCode == 126 || charCode == 33 || charCode == 35 || charCode == 36 || charCode == 37 || charCode == 94 || charCode == 96 || charCode == 38 || charCode == 42 || charCode == 40 || charCode == 41 || charCode == 61 || charCode == 43 || charCode == 123 || charCode == 125 || charCode == 91 || charCode == 93 || charCode == 124 || charCode == 92 || charCode == 58 || charCode == 59 || charCode == 34 || charCode == 39 || charCode == 44 || charCode == 63 || charCode == 47 || charCode == 62)
            {                
                alert('Not allowed this character');
                return false;
            }                
            return true;
        });
        $('textarea').keypress(function (e) {                 
            var keyCode = e.keyCode || e.which;            
            var charCode = (e.which) ? e.which : e.keyCode;            
            if (charCode == 60 || charCode == 96 || charCode == 126 || charCode == 33 || charCode == 35 || charCode == 36 || charCode == 37 || charCode == 94 || charCode == 96 || charCode == 38 || charCode == 42 || charCode == 40 || charCode == 41 || charCode == 61 || charCode == 43 || charCode == 123 || charCode == 125 || charCode == 91 || charCode == 93 || charCode == 124 || charCode == 92 || charCode == 58 || charCode == 59 || charCode == 34 || charCode == 39 || charCode == 44 || charCode == 63 || charCode == 47 || charCode == 62)
            {                
                alert('Not allowed this character');
                return false;
            }                
            return true;
        });
    });
</script>   
<script>

//    $(function () {
//        $('input[name="datefilter"]').daterangepicker({
//            autoUpdateInput: false,
//            locale: {
//                cancelLabel: 'Clear'
//            }
//        });
//        $('input[name="datefilter"]').on('apply.daterangepicker', function (ev, picker) {
//            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' To ' + picker.endDate.format('MM/DD/YYYY'));
//        });
//        $('input[name="datefilter"]').on('cancel.daterangepicker', function (ev, picker) {
//            $(this).val('');
//        });
//
//    });


    $(document).ready(function () {
//        $('#dp4').datepicker({
//            format: 'yyyy',
//            viewMode: 'years', 
//            minViewMode: 'years'         
//        });        
        $('#dp4').datepicker({
            format: 'yyyy',
            viewMode: 'years',
            minViewMode: 'years',
            autoclose: true
        });
        $('#dp5').datepicker({
            dateFormat: 'MM yy',
            format: 'mm-yyyy',
            viewMode: 'months',
            minViewMode: 'months',
            autoclose: true
        });

        if (<?php
if (isset($_SESSION['Error'])) {
    echo $_SESSION['Error'];
}
?> == 1) {
            var d = new PNotify({
                title: 'Please try again you are not change any data',
                type: 'error',
                styling: 'bootstrap3'
            });
<?php echo $_SESSION['Error'] = 0; ?>;
        }

        if (<?php
if (isset($_SESSION['existrecord1'])) {
    echo $_SESSION['existrecord1'];
}
?> == 1) {
            var d = new PNotify({
                title: 'This Name is allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
<?php echo $_SESSION['existrecord1'] = 0; ?>;
        }

        if (<?php
if (isset($_SESSION['existrecord'])) {
    echo $_SESSION['existrecord'];
}
?> == 1) {
            var d = new PNotify({
                title: 'This ID is allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
<?php echo $_SESSION['existrecord'] = 0; ?>;
        }

        if (<?php
if (isset($_SESSION['adddata'])) {
    echo $_SESSION['adddata'];
}
?> == 1) {
            var d = new PNotify({
                title: 'Record added successful',
                type: 'success',
                styling: 'bootstrap3'
            });
<?php echo $_SESSION['adddata'] = 0; ?>;
        }
        if (<?php
if (isset($_SESSION['dataupdate'])) {
    echo $_SESSION['dataupdate'];
}
?> == 1) {
            var d = new PNotify({
                title: 'Record updated successful',
                type: 'success',
                styling: 'bootstrap3'
            });
<?php echo $_SESSION['dataupdate'] = 0; ?>;
        }

        if (<?php
if (isset($_SESSION['tax_transaction_head_exisit'])) {
    echo $_SESSION['tax_transaction_head_exisit'];
}
?> == 1) {
            var d = new PNotify({
                title: 'This transaction head allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
<?php echo $_SESSION['tax_transaction_head_exisit'] = 0; ?>;
        }
        if (<?php
if (isset($_SESSION['tax_transaction_dept_exisit'])) {
    echo $_SESSION['tax_transaction_dept_exisit'];
}
?> == 1) {
            var d = new PNotify({
                title: 'This transaction dept allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
<?php echo $_SESSION['tax_transaction_dept_exisit'] = 0; ?>;
        }
        if (<?php
if (isset($_SESSION['tax_transaction_ddo_exisit'])) {
    echo $_SESSION['tax_transaction_ddo_exisit'];
}
?> == 1) {
            var d = new PNotify({
                title: 'This transaction ddo allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
<?php echo $_SESSION['tax_transaction_ddo_exisit'] = 0; ?>;
        }
        if (<?php
if (isset($_SESSION['tax_type_name_exist'])) {
    echo $_SESSION['tax_type_name_exist'];
}
?> == 1) {
            var d = new PNotify({
                title: 'This tax type name allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
<?php echo $_SESSION['tax_type_name_exist'] = 0; ?>;
        }
        if (<?php
if (isset($_SESSION['tax_commodity_name'])) {
    echo $_SESSION['tax_commodity_name'];
}
?> == 1) {
            var d = new PNotify({
                title: 'This tax commodity name allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
<?php echo $_SESSION['tax_commodity_name'] = 0; ?>;
        }
        if (<?php
if (isset($_SESSION['empMobileExist'])) {
    echo $_SESSION['empMobileExist'];
}
?> == 1) {
            var d = new PNotify({
                title: 'Mobile number is allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
<?php echo $_SESSION['empMobileExist'] = 0; ?>;
        }
        if (<?php
if (isset($_SESSION['empEmailExist'])) {
    echo $_SESSION['empEmailExist'];
}
?> == 1) {
            var d = new PNotify({
                title: 'Email is allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
<?php echo $_SESSION['empEmailExist'] = 0; ?>;
        }
        if (<?php
if (isset($_SESSION['empCodeExist'])) {
    echo $_SESSION['empCodeExist'];
}
?> == 1) {
            var d = new PNotify({
                title: 'Employee code is allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
<?php echo $_SESSION['empCodeExist'] = 0; ?>;
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
//            placeholder: "Select from to date",
            singleClasses: "picker_1",
            maxDate: new Date(),
            locale: {
                format: 'YYYY-MM-DD'
            }
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        $('.single_cal1').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' To ' + picker.endDate.format('YYYY-MM-DD'));
        });
        $('.single_cal1').val('');
    });
</script>
<?php if ($TITLE === TITLE_TAX_DEALER_LIST) { ?>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                columnDefs: [{
                        className: 'control',
                        orderable: false,
                        targets: 0
                    }],
                "processing": true,
                "serverSide": true,
                "paginationType": "full_numbers",
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "ajax": {
                    'type': 'POST',
                    'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/dealerList.php' ?>",
                },
                "columns": [
                    {"data": "index"},
                    {"data": "tax_dealer_id"},
                    {"data": "tax_dealer_name"},
                    {"data": "tax_dealer_code"},
                    {"data": "tax_dealer_tin"},
                    {"data": "tax_dealer_tin_expiry"},
                    {"data": "tax_dealer_mobile"},
                    {"data": "tax_delaer_status"}

                ]
            });
            $(document).on('click', '.btn_approve_reject', function () {
                var self = $(this);
                var status = self.attr('data-status');
                var user_status = 'ACTIVE';
                if (status == 1)
                    user_status = 'INACTIVE';
                if (!confirm('Are you sure want to ' + user_status.toLocaleLowerCase() + ' dealer?'))
                    return;
                self.attr('disabled', 'disabled');
                var data = {
                    'tax_dealer_id': self.data('id'),
                    'tax_delaer_status': user_status
                };
                $.ajax({
                    type: "POST",
                    url: "<?php echo ADMIN_DEALER_APPROVE_LINK ?>",
                    data: data,
                    success: function (res) {
                        var res = $.parseJSON(res);
                        if (res.suceess) {
                            var title = 'Click to deactivate dealer';
                            var class_ = 'btn_approve_reject btn btn-success btn-xs';
                            var text = 'Active';
                            var isactive = 1;

                            if (status == 1) {
                                title = 'Click to active dealer';
                                class_ = 'btn_approve_reject btn btn-danger btn-xs';
                                text = 'Inactive';
                                isactive = 0;

                                new PNotify({
                                    title: 'Dealer InActived Successfully',
                                    type: 'success',
                                    styling: 'bootstrap3'
                                });

                            } else {
                                new PNotify({
                                    title: 'Dealer Actived Successfully',
                                    type: 'success',
                                    styling: 'bootstrap3'
                                });
                            }
                            self.removeClass().addClass(class_);
                            self.attr({
                                'data-status': isactive,
                                'title': title
                            });
                            self.removeAttr('disabled');
                            self.html(text);
                        }
                    }
                });
            });
        });
    </script>
<?php } ?>

<?php if ($TITLE === TITLE_TAX_REPORTS_LIST) { ?>
    <script>
        $(document).ready(function () {
            fill_datatable();
            function fill_datatable(year = '', month = '', taxtype = '', searchFromToDate = '')
            {
                var status = $('#status').val();
                $('#example').DataTable({
                    responsive: {
                        details: {
                            type: 'column',
                            target: 'tr'
                        }
                    },
                    columnDefs: [{
                            className: 'control',
                            orderable: false,
                            targets: 0
                        }],
                    "processing": true,
                    "serverSide": true,
                    "paginationType": "full_numbers",
                    "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                    "ajax": {
                        'type': 'POST',
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/reportsList.php' ?>",
                        'data': {
                            year: year,
                            month: month,
                            taxtype: taxtype,
                            searchFromToDate: searchFromToDate,
                            status: status
                        }
                    },
                    "columns": [
                        {"data": "index"},
                        {"data": "tax_transaction_dept"},
                        {"data": "tax_AppRefNo"},
                        {"data": "tax_transaction_dt"},
                        {"data": "tax_payment_dt"},
                        {"data": "tax_payment_bank"},
                        {"data": "tax_payment_amount"},
                        {"data": "tax_transaction_status"},
                        {"data": "tax_challan_brn"},
                        {"data": "tax_challan_himgrn"},
                        {"data": "tax_challan_id"},
                        {"data": "tax_type_id"}
                    ]
                });
            }
            $('#searchYear').click(function () {
                var year = $('#dp4').val();
                if (year != '')
                {
                    $('#example').DataTable().destroy();
                    fill_datatable(year, '');
                } else
                {
                    alert('Select Year');
                    $('#example').DataTable().destroy();
                    fill_datatable();
                }
            });
            $('#searchMonth').click(function () {
                var month = $('#dp5').val();
                if (month != '')
                {
                    $('#example').DataTable().destroy();
                    fill_datatable('', month);
                } else
                {
                    alert('Select Month');
                    $('#example').DataTable().destroy();
                    fill_datatable();
                }
            });
            $('#searchTaxType').click(function () {
                var taxtype = $('#selectTaxType').children("option:selected").val();
                if (taxtype != '')
                {
                    $('#example').DataTable().destroy();
                    fill_datatable('', '', taxtype);
                } else
                {
                    alert('Select Tax Type');
                    $('#example').DataTable().destroy();
                    fill_datatable();
                }
            });
            $('#searchFromToDate').click(function () {
                var searchFromToDate = $('.single_cal1').val();
                if (searchFromToDate != '')
                {
                    $('#example').DataTable().destroy();
                    fill_datatable('', '', '', searchFromToDate);
                } else
                {
                    alert('Select Proper Date');
                    $('#example').DataTable().destroy();
                    fill_datatable();
                }
            });


            $(document).on('click', '.btn_approve_reject', function () {
                var self = $(this);
                var status = self.attr('data-status');
                var user_status = 'ACTIVE';
                if (status == 1)
                    user_status = 'INACTIVE';
                if (!confirm('Are you sure want to ' + user_status.toLocaleLowerCase() + ' employee?'))
                    return;
                self.attr('disabled', 'disabled');
                var data = {
                    'tax_employee_id': self.data('id'),
                    'tax_employee_status': user_status
                };
                $.ajax({
                    type: "POST",
                    url: "<?php echo ADMIN_EMPLOYEE_APPROVE_LINK ?>",
                    data: data,
                    success: function (res) {
                        var res = $.parseJSON(res);
                        if (res.suceess) {
                            var title = 'Click to deactivate employee';
                            var class_ = 'btn_approve_reject btn btn-success btn-xs';
                            var text = 'Active';
                            var isactive = 1;

                            if (status == 1) {
                                title = 'Click to active employee';
                                class_ = 'btn_approve_reject btn btn-danger btn-xs';
                                text = 'Inactive';
                                isactive = 0;
                                new PNotify({
                                    title: 'Employee InActived Successfully',
                                    type: 'success',
                                    styling: 'bootstrap3'
                                });

                            } else {
                                new PNotify({
                                    title: 'Employee Actived Successfully',
                                    type: 'success',
                                    styling: 'bootstrap3'
                                });
                            }
                            self.removeClass().addClass(class_);
                            self.attr({
                                'data-status': isactive,
                                'title': title
                            });
                            self.removeAttr('disabled');
                            self.html(text);
                        }
                    }
                });
            });
        });
    </script>
<?php } ?>    

<?php if ($TITLE === TITLE_TAX_EMPLOYEE_LIST) { ?>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                columnDefs: [{
                        className: 'control',
                        orderable: false,
                        targets: 0
                    }],
                "processing": true,
                "serverSide": true,
                "paginationType": "full_numbers",
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "ajax": {
                    'type': 'POST',
                    'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/empList.php' ?>",
                },
                "columns": [
                    {"data": "index"},
                    {"data": "tax_employee_code"},
                    {"data": "tax_employee_name"},
                    {"data": "tax_employee_email"},
                    {"data": "tax_employee_mobile"},
                    {"data": "tax_employee_status"},
                    {"data": "edit"}

                ]
            });
            $(document).on('click', '.btn_approve_reject', function () {
                var self = $(this);
                var status = self.attr('data-status');
                var user_status = 'ACTIVE';
                if (status == 1)
                    user_status = 'INACTIVE';
                if (!confirm('Are you sure want to ' + user_status.toLocaleLowerCase() + ' employee?'))
                    return;
                self.attr('disabled', 'disabled');
                var data = {
                    'tax_employee_id': self.data('id'),
                    'tax_employee_status': user_status
                };
                $.ajax({
                    type: "POST",
                    url: "<?php echo ADMIN_EMPLOYEE_APPROVE_LINK ?>",
                    data: data,
                    success: function (res) {
                        var res = $.parseJSON(res);
                        if (res.suceess) {
                            var title = 'Click to deactivate employee';
                            var class_ = 'btn_approve_reject btn btn-success btn-xs';
                            var text = 'Active';
                            var isactive = 1;

                            if (status == 1) {
                                title = 'Click to active employee';
                                class_ = 'btn_approve_reject btn btn-danger btn-xs';
                                text = 'Inactive';
                                isactive = 0;
                                new PNotify({
                                    title: 'Employee InActived Successfully',
                                    type: 'success',
                                    styling: 'bootstrap3'
                                });

                            } else {
                                new PNotify({
                                    title: 'Employee Actived Successfully',
                                    type: 'success',
                                    styling: 'bootstrap3'
                                });
                            }
                            self.removeClass().addClass(class_);
                            self.attr({
                                'data-status': isactive,
                                'title': title
                            });
                            self.removeAttr('disabled');
                            self.html(text);
                        }
                    }
                });
            });
        });
    </script>
<?php } ?>
<?php if ($TITLE === TITLE_TAX_DEALER_LIST_PENDING) { ?>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                columnDefs: [{
                        className: 'control',
                        orderable: false,
                        targets: 0
                    }],
                "processing": true,
                "serverSide": true,
                "paginationType": "full_numbers",
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "ajax": {
                    'type': 'POST',
                    'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/dealerListPending.php' ?>",
                },
                "columns": [
                    {"data": "index"},
                    {"data": "tax_dealer_id"},
                    {"data": "tax_dealer_name"},
                    {"data": "tax_dealer_code"},
                    {"data": "tax_dealer_tin"},
                    {"data": "tax_dealer_tin_expiry"},
                    {"data": "tax_dealer_mobile"},
                    {"data": "creditional"}
                ]
            });
            $(document).on('click', '.btn_approve_reject', function () {
                var self = $(this);
                var status = self.attr('data-status');
                var user_status = 'ACTIVE';
                if (status == 1)
                    user_status = 'INACTIVE';
                if (!confirm('Are you sure want to ' + user_status.toLocaleLowerCase() + ' dealer?'))
                    return;
                self.attr('disabled', 'disabled');
                var data = {
                    'tax_dealer_id': self.data('id'),
                    'tax_delaer_status': user_status
                };
                $.ajax({
                    type: "POST",
                    url: "<?php echo ADMIN_DEALER_APPROVE_LINK ?>",
                    data: data,
                    success: function (res) {
                        var res = $.parseJSON(res);
                        if (res.suceess) {
                            var title = 'Click to deactivate student';
                            var class_ = 'btn_approve_reject btn btn-success btn-xs';
                            var text = 'Active';
                            var isactive = 1;

                            if (status == 1) {
                                title = 'Click to active student';
                                class_ = 'btn_approve_reject btn btn-danger btn-xs';
                                text = 'Inactive';
                                isactive = 0;

                                new PNotify({
                                    title: 'Dealer InActived Successfully',
                                    type: 'success',
                                    styling: 'bootstrap3'
                                });

                            } else {
                                new PNotify({
                                    title: 'Dealer Actived Successfully',
                                    type: 'success',
                                    styling: 'bootstrap3'
                                });
                            }
                            self.removeClass().addClass(class_);
                            self.attr({
                                'data-status': isactive,
                                'title': title
                            });
                            self.removeAttr('disabled');
                            self.html(text);
                        }
                    }
                });
            });
        });
    </script>
<?php } ?>

<?php
if ($TITLE == 'Tax Transaction Reports') {
    include_once(APP_INCLUDE_V . "js/reportsjs.php");
}
?>
<?php
if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
}
?>
</body>
</html>