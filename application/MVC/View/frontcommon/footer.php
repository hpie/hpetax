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
<script src="<?php echo ASSETS_FRONT; ?>js/main.js"></script>
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
<?php 
    if($TITLE==TITLE_FRONT_EPAYMENT_UNREGISTER){       
        include_once(APP_INCLUDE_V . "frontcommon/epaymentjs.php");   
    }
    if($TITLE==TITLE_FRONT_EPAYMENT_TREASURY){       
        include_once(APP_INCLUDE_V . "frontcommon/epaymenttreasuryjs.php");   
    } 
    if($TITLE==TITLE_FRONT_SIGNUP_FORM){       
        include_once(APP_INCLUDE_V . "frontcommon/signupjs.php");   
    }
     if($TITLE==TITLE_FRONT_VERIFY_E_PAYMENT){       
        include_once(APP_INCLUDE_V . "frontcommon/epaymentverifyjs.php");   
    }
?>
</body>
</html>