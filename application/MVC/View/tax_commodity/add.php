<!-- page content -->
<div class="right_col">
    <div class="">      
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Tax Commodity</h2>                    
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" method="post" name="addtaxcommodity" action="<?php echo ADMIN_TAX_COMMODITY_INSERT_LINK; ?>">                                                                                                                                          
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_commodity_id">ID<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" <?php if(isset($_SESSION['data'])){ echo 'value="'.$_SESSION['data']['tax_commodity_id'].'"';} ?> name="tax_commodity_id"  placeholder="Enter tax commodity id" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div> 
                            <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_type_id">Tax Type
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="tax_type_id" required="">                                              
                                            <option class="" value="" selected="" disabled=""i>Select Tax Type</option>       
                                            <?php if($result){
                                                foreach ($result as $row){
                                                 
                                                    ?>
                                            <option class="" value="<?php echo $row['tax_type_id']; ?>" <?php if(isset($_SESSION['data'])){ echo set_selected($row['tax_type_id'], $_SESSION['data']['tax_type_id']);} ?>><?php echo $row['tax_type_name']; ?></option>   
                                            <?php
                                                }
                                            } ?>                                           
                                        </select>
                                    </div>
                            </div>                                      
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_commodity_name">Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" <?php if(isset($_SESSION['data'])){ echo 'value="'.$_SESSION['data']['tax_commodity_name'].'"';} ?> name="tax_commodity_name"  placeholder="Enter tax type name" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>   
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_commodity_rate">Rate<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" <?php if(isset($_SESSION['data'])){ echo 'value="'.$_SESSION['data']['tax_commodity_rate'].'"';} ?> name="tax_commodity_rate"  placeholder="Enter tax commodity rate" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_commodity_rate_unit">Rate Unit
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" <?php if(isset($_SESSION['data'])){ echo 'value="'.$_SESSION['data']['tax_commodity_rate_unit'].'"';} ?> name="tax_commodity_rate_unit"  placeholder="Enter tax commodity rate unit (optional)" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_commodity_unit_measure">Unit Measure<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" <?php if(isset($_SESSION['data'])){ echo 'value="'.$_SESSION['data']['tax_commodity_unit_measure'].'"';} ?> name="tax_commodity_unit_measure"  placeholder="Enter tax commodity rate unit" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_commodity_taxcalculation">Tax Calculation<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" <?php if(isset($_SESSION['data'])){ echo 'value="'.$_SESSION['data']['tax_commodity_taxcalculation'].'"';} ?> name="tax_commodity_taxcalculation"  placeholder="Enter tax commodity rate unit" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>                            
                            <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_commodity_isdistancedependent">Distance Dependent
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="tax_commodity_isdistancedependent" required="">                                            
                                            <option class="" value="" selected="" disabled=""i>Select Status</option>                                           
                                            <option class="" value="YES" <?php if(isset($_SESSION['data'])){ echo set_selected('YES', $_SESSION['data']['tax_commodity_isdistancedependent']);} ?>>YES</option>   
                                            <option class="" value="NO" <?php if(isset($_SESSION['data'])){ echo set_selected('NO', $_SESSION['data']['tax_commodity_isdistancedependent']);} ?>>NO</option>                                           
                                        </select>
                                    </div>
                            </div>                                      
                            <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_commodity_status">Status
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="tax_commodity_status" required="">                                            
                                            <option class="" value="" selected="" disabled=""i>Select Status</option>                                           
                                            <option class="" value="ACTIVE" <?php if(isset($_SESSION['data'])){ echo set_selected('ACTIVE', $_SESSION['data']['tax_commodity_status']);} ?>>ACTIVE</option>   
                                            <option class="" value="INACTIVE" <?php if(isset($_SESSION['data'])){ echo set_selected('INACTIVE', $_SESSION['data']['tax_commodity_status']);} ?>>INACTIVE</option>                                           
                                        </select>
                                    </div>
                            </div> 
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_commodity_description">Description<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea class="field" placeholder="Tax commodity description" name="tax_commodity_description" required=""><?php if(isset($_SESSION['data'])){ echo $_SESSION['data']['tax_commodity_description'];} ?></textarea>
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