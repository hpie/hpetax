<!-- page content -->
<div class="right_col">
    <div class="">      
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Tax Type</h2>                    
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        <form class="form-horizontal form-label-left" method="post" name="edittaxcommodity" action="<?php echo ADMIN_TAX_COMMODITY_EDIT_LINK . $result['tax_commodity_id']; ?>">                                                                                                                                                                                                                                                        
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_commodity_id">ID<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" value="<?php echo $result['tax_commodity_id']; ?>"  name="tax_commodity_id"  placeholder="Enter tax commodity id" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>                           
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_commodity_name">Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?php echo $result['tax_commodity_name']; ?>" name="tax_commodity_name"  placeholder="Enter tax type name" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>                               
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_commodity_rate">Rate<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?php echo $result['tax_commodity_rate']; ?>" name="tax_commodity_rate"  placeholder="Enter tax commodity rate" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_commodity_rate_unit">Rate Unit<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?php echo $result['tax_commodity_rate_unit']; ?>" name="tax_commodity_rate_unit"  placeholder="Enter tax commodity rate unit" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_commodity_unit_measure">Unit Measure<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?php echo $result['tax_commodity_unit_measure']; ?>" name="tax_commodity_unit_measure"  placeholder="Enter tax commodity rate unit" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_commodity_taxcalculation">Tax Calculation<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?php echo $result['tax_commodity_taxcalculation']; ?>" name="tax_commodity_taxcalculation"  placeholder="Enter tax commodity rate unit" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_commodity_isdistancedependent">Distance Dependent
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="tax_commodity_isdistancedependent" required="">                                            
                                        <option class="" value="" selected="" disabled=""i>Select Status</option>                                           
                                        <option class="" value="YES" <?php echo set_selected('YES', $result['tax_commodity_isdistancedependent']) ?>>YES</option>   
                                        <option class="" value="NO" <?php echo set_selected('NO', $result['tax_commodity_isdistancedependent']) ?>>NO</option>                                           
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_commodity_status">Status
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="tax_commodity_status" required="">                                            
                                        <option class="" value="" selected="" disabled=""i>Select Status</option>                                           
                                        <option class="" value="ACTIVE" <?php echo set_selected('ACTIVE', $result['tax_commodity_status']) ?>>True</option>   
                                        <option class="" value="INACTIVE" <?php echo set_selected('INACTIVE', $result['tax_commodity_status']) ?>>False</option>                                           
                                    </select>
                                </div>
                            </div>                           
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_commodity_description">Description<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea class="field" placeholder="Tax commodity description" name="tax_commodity_description" required=""><?php echo $result['tax_commodity_description']; ?></textarea>
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