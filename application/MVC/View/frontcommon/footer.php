</div>
</div>
</section>
<footer>
    <div class="wapper">
        <div>
            <img width="50%" height="50%" src="<?php echo ASSETS_FRONT; ?>img/hpie-logo.png" alt="H.P.I.E" title="HPIE">
        </div>
        <div>
            <h4>Thank You for Visiting </h4>
            <ul>
                <li><a target="_blank" href="https://hptax.gov.in/HPPortal/pages/documents/HP-ETD-Terms&Conditions.pdf">Terms of use </a></li>
                <li><a  target="_blank" href="https://hptax.gov.in/HPPortal/pages/documents/HP-ETD-Portal-Disclaimer.pdf">Disclaimer</a></li>
                <li><a href="#">Feedback</a></li>
                <li><a href="#">SiteMap</a></li>
                <li><a href="#">Bookmark this Website</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Contact Us </a></li>
            </ul>
            <p> This site is designed to view in and IE 9.0 and above. Site is
                designed,developed and managed by <a href="http://hpie.in" target="_blank">H.P.I.E</a> ©2020
            </p>
        </div>
    </div>
</footer>
</div>
<script src="<?php echo BASE_URL ?>assets/pnotify/dist/pnotifyadmin.js"></script>   
<script src="<?php echo ASSETS_FRONT; ?>js/main.js"></script>
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    $(document).ready(function () {
        if (<?php
if (isset($_SESSION['valid']) && isset($_SESSION['valid'])) {
    echo $_SESSION['valid'];
}
?> == 1) {
            var d = new PNotify({
                title: 'Login Successfully',
                type: 'success',
                styling: 'bootstrap3',
            });
<?php echo $_SESSION['valid'] = 0; ?>;
        }
   if (<?php
if (isset($_SESSION['invalid']) && isset($_SESSION['valid'])) {
    echo $_SESSION['invalid'];
}
?> == 1) {
            var d = new PNotify({
                title: 'Wrong credentials',
                type: 'error',
                styling: 'bootstrap3'
            });
<?php echo $_SESSION['invalid'] = 0; ?>;
        } 
 
   if (<?php
if (isset($_SESSION['existemail']) && isset($_SESSION['valid'])) {
    echo $_SESSION['existemail'];
}
?> == 1) {
            var d = new PNotify({
                title: 'Email Allready Exist',
                type: 'error',
                styling: 'bootstrap3',
            });
<?php echo $_SESSION['existemail'] = 0; ?>;
        }  
 
        if (<?php
if (isset($_SESSION['existmobile']) && isset($_SESSION['valid'])) {
    echo $_SESSION['existmobile'];
}
?> == 1) {
            var d = new PNotify({
                title: 'Mobile number Allready Exist',
                type: 'error',
                styling: 'bootstrap3',
            });
<?php echo $_SESSION['existmobile'] = 0; ?>;
        }   
 
 
        if (<?php
if (isset($_SESSION['existrecord']) && isset($_SESSION['valid'])) {
    echo $_SESSION['existrecord'];
}
?> == 1) {
            var d = new PNotify({
                title: 'TIN Allready Exist',
                type: 'error',
                styling: 'bootstrap3',
            });
<?php echo $_SESSION['existrecord'] = 0; ?>;
        }  
 

        if (<?php
if (isset($_SESSION['updatedata']) && isset($_SESSION['valid'])) {
    echo $_SESSION['updatedata'];
}
?> == 1) {
            var d = new PNotify({
                title: 'Password updated successfully',
                type: 'success',
                styling: 'bootstrap3',
            });
<?php echo $_SESSION['updatedata'] = 0; ?>;
        } 
 
 
        if (<?php
if (isset($_SESSION['adddata']) && isset($_SESSION['valid'])) {
    echo $_SESSION['adddata'];
}
?> == 1) {
            var d = new PNotify({
                title: 'Registration Successfully. You will receive email',
                type: 'success',
                styling: 'bootstrap3',
            });
<?php echo $_SESSION['adddata'] = 0; ?>;
        }        
    });
</script>
<?php
if ($TITLE == TITLE_FRONT_EPAYMENT_UNREGISTER) {
    include_once(APP_INCLUDE_V . "frontcommon/epaymentjs.php");
}
if ($TITLE == TITLE_FRONT_EPAYMENT_TREASURY) {
    include_once(APP_INCLUDE_V . "frontcommon/epaymenttreasuryjs.php");
}
if ($TITLE == TITLE_FRONT_SIGNUP_FORM) {
    include_once(APP_INCLUDE_V . "frontcommon/signupjs.php");
}
if ($TITLE == TITLE_FRONT_VERIFY_E_PAYMENT || $TITLE == TITLE_TAX_EMPLOYEE_EDT) {
    include_once(APP_INCLUDE_V . "frontcommon/epaymentverifyjs.php");
}
?>
<script src="<?php echo ASSETS_FRONT; ?>js/bootstrapValidator.min.js"></script>
<?php if ($TITLE === TITLE_FRONT_VERIFY_E_PAYMENT) { ?>
<script src="<?php echo BASE_URL ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
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
<script type="text/javascript" language="javascript" src="<?php echo BASE_URL; ?>/assets/front/js/dataTables.responsive.min.js"></script>
<?php } ?>
<script>
        $(document).ready(function () {         
            $('#frm_change_password').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    new_password: {
                        validators: {
                            stringLength: {
                                min: 6,
                            },
                            identical: {
                                field: 'rmsa_user_confirm_password',
                                message: 'The password and its confirm are not the same'
                            },
                            notEmpty: {
                                message: 'Please supply your new password'
                            }
                        }
                    },
                    confirm_password: {
                        validators: {
                            stringLength: {
                                min: 6,
                            },
                            identical: {
                                field: 'rmsa_user_new_password',
                                message: 'The password and its confirm are not the same'
                            },
                            notEmpty: {
                                message: 'Please supply your confirm password'
                            }
                        }
                    }
                }
            }).on('success.form.bv', function (e) {
                $('#success_message').slideDown({opacity: "show"}, "slow") // Do something ...
                $('#frm_change_password').data('bootstrapValidator').resetForm();

                // Prevent form submission
                e.preventDefault();

                // Get the form instance
                var $form = $(e.target);

                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                // Use Ajax to submit form data
                $.post($form.attr('action'), $form.serialize(), function (result) {
                    if(result['success']=="success"){                        
                            location.href = "<?php echo BASE_URL; ?>";                                           
                    }
                    if(result['success']=="fail"){                    
                        var d = new PNotify({
                            title: 'Old Password not match',
                            type: 'error',
                            styling: 'bootstrap3',
                        });                          
                    }
                }, 'json');
            });
        });
    </script>    
    <?php if ($TITLE === TITLE_FRONT_VERIFY_E_PAYMENT) { ?>
    <script>
        $(document).ready(function () {  
//            fill_datatable();
            function fill_datatable(from = '',to = '',status='',transactionNo='',mobileNo='',email='')
            {                
                var delear=<?php if(isset($_SESSION['dealerDetails']['tax_dealer_id'])){echo $_SESSION['dealerDetails']['tax_dealer_id'];}else{echo 0;} ?>                
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
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/verifyepayment.php' ?>",
                        'data': {
                            from:from,
                            to:to,                            
                            transactionNo:transactionNo,
                            status:status,
                            mobileNo:mobileNo,
                            email:email,
                            delear:delear
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
            $('#search').click(function () {
                var from = $('#startdate').val();                
                var to = $('#enddate').val();                
                var status=$("#status option:selected").val();              
                var transactionno = $('#tax_transaction_no').val(); 
                var email = $('#email').val(); 
                var mobileNo = $('#mobileNo').val(); 
                $('#example').DataTable().destroy();                    
                fill_datatable(from,to,status,transactionno,mobileNo,email);
            });           
        });
    </script>
<?php } ?>    
</body>
</html>