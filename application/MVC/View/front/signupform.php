<style>
    select, option {
        width: 150px;
    }
    .datepicker  {
        background: #fff !important;
    }
    /*    option {
            overflow: hidden;
            white-sapce: no-wrap;
            text-overflow: ellipsis;
        }*/
</style>
<div class="col-md-9 col-sm-12  col-12 ">
    <div class="middle-area box-shadow">
        <h1 class="heading" style="text-align: center;">New User SignUp</h1>        
        <br>      
        <!-- The Modal -->

        <div class="row section-row">
            <form method="post" action="<?php echo FRONT_SIGN_UP_INSERT_LINK; ?>" class="col-md-12 col-sm-12 col-12">
                <div>                
                    <center><h4 class="sm-heading">New User SignUp</h4></center>                                  
                    <table class="table" border="1" id="tabledata">
                        <tr>                        
                            <td width='30%'>Full Name</td>
                            <td width='70%'><input type="text" name="tax_dealer_name" required="required"></td>                       
                        </tr>
                        <tr>                        
                            <td width='30%'>Email</td>
                            <td width='70%'><input type="email" name="tax_dealer_email" required="required"></td>                       
                        </tr>
                        <tr>                        
                            <td width='30%'>Mobile No</td>
                            <td width='70%'><input class="mobileno" type="text" name="tax_dealer_mobile" required="required" maxlength="10" minlength="10"></td>                       
                        </tr>
                        <tr>                        
                            <td width='30%'>Tax Type *  :</td>
                            <td width='70%'>
                                <select class="" required="">                                            
                                    <option class="" value="0" selected="" disabled="">Select</option>
                                    <option class="" value="Excies">Excies</option> 
                                </select>
                            </td>                        
                        </tr>   
                        <tr>                        
                            <td width='30%'>TIN / License No.  *</td>
                            <td width='70%'><input type="text" name="tax_dealer_tin" maxlength="15" minlength="11" required="required"></td>                       
                        </tr>
                        <tr>                                                                                                                                                      
                            <td width='30%'>Date of Validity ( dd/mm/yyyy ) *  :</td>                                               
                            <td width='70%'><input type="text" name="tax_dealer_tin_expiry" id="validitydate" value="<?php echo date('d/m/Y'); ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span></td>                                               
                        </tr>                   
                    </table>
                </div>
<!--            <div class="form-group">
                <div class="row">
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <script>function enableLogin() { document.getElementById("btnLogin").disabled = false; }</script>
                    <label class="control-label col-sm-4 col-xs-12" for="ptsp"></label>
                    <div class="col-sm-8 col-xs-12">
                        <div class="g-recaptcha" style="" data-sitekey="6LdnvCQUAAAAAGmHBukXVzjs5NupVLlaIHJdpFWo" data-callback="enableLogin"></div>
                    </div>
                </div>
            </div>-->
                <div>
                    <style>
                        button{
                            width:50px !important;
                            background-color:#264a62 !important;
                            color:#fff !important;
                        }
                    </style>
                    <center><button type="submit" id="btnLogin">Submit</button>&nbsp;&nbsp;<a href="<?php echo BASE_URL; ?>"><button>Back</button></a></center>                
                </div> 
            </form>
        </div>       
    </div>
</div>

