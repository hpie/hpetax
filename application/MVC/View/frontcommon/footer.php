</div>
</div>
</section>
<footer>
    <div class="wapper">
        <div>
            <img src="<?php echo ASSETS_FRONT; ?>img/tata.png" alt="tata consultancy services" title="tata consultancy services">
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
            <p> This site is designed to view in 1024 X 768 resolution and IE 7.0 and above. Site is
                designed,developed and managed by TCS. ©2010-2011
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
if ($TITLE == TITLE_FRONT_VERIFY_E_PAYMENT) {
    include_once(APP_INCLUDE_V . "frontcommon/epaymentverifyjs.php");
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
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

</body>
</html>