<!-- page content -->
<div class="right_col">
    <div class="">      
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Employee</h2>                    
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" method="post" name="addemployee" action="<?php echo ADMIN_TAX_EMPLOYEE_INSERT_LINK; ?>">                                                                                                                                          
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_employee_name">Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" <?php if(isset($_SESSION['data'])){ echo 'value="'.$_SESSION['data']['tax_employee_name'].'"';} ?> name="tax_employee_name"  placeholder="Enter employee name" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_employee_code">Employee Code<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" <?php if(isset($_SESSION['data'])){ echo 'value="'.$_SESSION['data']['tax_employee_code'].'"';} ?> name="tax_employee_code"  placeholder="Enter employee code" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_employee_password">Password<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" minlength="8" <?php if(isset($_SESSION['data'])){ echo 'value="'.$_SESSION['data']['tax_employee_password'].'"';} ?> name="tax_employee_password"  placeholder="Enter password" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_employee_mobile">Mobile No.<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" minlength="10" maxlength="10" <?php if(isset($_SESSION['data'])){ echo 'value="'.$_SESSION['data']['tax_employee_mobile'].'"';} ?> name="tax_employee_mobile"  placeholder="Enter employee mobile number" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_employee_email">Email<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" <?php if(isset($_SESSION['data'])){ echo 'value="'.$_SESSION['data']['tax_employee_email'].'"';} ?> name="tax_employee_email"  placeholder="Enter email" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_employee_security_q">Security Question<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="tax_employee_security_q" required="">                                            
                                            <option class="" value="" selected="" disabled=""i>Select Security Question</option>                                           
                                            <option class="" value="Born place" <?php if(isset($_SESSION['data'])){ echo set_selected('Born place', $_SESSION['data']['tax_employee_security_q']);} ?>>Born place</option>   
                                            <option class="" value="First pet name" <?php if(isset($_SESSION['data'])){ echo set_selected('First pet name', $_SESSION['data']['tax_employee_security_q']);} ?>>First pet name</option>                                           
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_employee_security_a">Security Answer<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" <?php if(isset($_SESSION['data'])){ echo 'value="'.$_SESSION['data']['tax_employee_security_a'].'"';} ?> name="tax_employee_security_a"  placeholder="Enter security answer" required="required" class="form-control col-md-7 col-xs-12">
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