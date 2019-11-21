<!-- page content -->
<div class="right_col">
    <div class="">      
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Tax Dealer Password</h2>                    
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        <form class="form-horizontal form-label-left" method="post" name="edittaxdealercredential" action="<?php echo ADMIN_TAX_DEALER_CREDENTIAL_EDIT_LINK . $result['tax_dealer_id']; ?>">                                                                                                                                                                                                                                                                                                            
                            <input type="hidden" name="tax_dealer_email" value="<?php echo $result['tax_dealer_email']; ?>">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_dealer_code">Dealer Code<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?php if(isset($_SESSION['data']['tax_dealer_code'])){ echo $_SESSION['data']['tax_dealer_code']; } ?>" name="tax_dealer_code"  placeholder="Enter tax dealer code" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>                                                  
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_dealer_password">Password<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?php if(isset($_SESSION['data']['tax_dealer_password'])){echo $_SESSION['data']['tax_dealer_password'];} ?>" name="tax_dealer_password"  placeholder="Enter tax dealer password" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="ln_solid" style="visibility: hidden"></div>
                            <div class="form-group">
                                <div class="col-md-8 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>                       
    </div>
</div>