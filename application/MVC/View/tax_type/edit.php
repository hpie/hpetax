<!-- page content -->
<div class="right_col">
    <div class="">      
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Tax Type</h2>                    
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        <form class="form-horizontal form-label-left" method="post" name="addtaxtype" action="<?php echo ADMIN_TAX_TYPE_EDIT_LINK.$result['tax_type_id']; ?>">                                                                                                                                                                     
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_type_name">Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?php echo $result['tax_type_name']; ?>" name="tax_type_name"  placeholder="Enter tax type name" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div> 
                            
                                          
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_type_status">Status
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="tax_type_status" required="">                                            
                                        <option class="" value="" selected="" disabled=""i>Select Status</option>                                           
                                        <option class="" value="ACTIVE" <?php echo set_selected('ACTIVE', $result['tax_type_status']) ?>>ACTIVE</option>   
                                        <option class="" value="INACTIVE" <?php echo set_selected('INACTIVE', $result['tax_type_status']) ?>>INACTIVE</option>                                           
                                    </select>
                                </div>
                            </div>                                                                                       
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_type_description">Description<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea class="field" placeholder="Tax type description" name="tax_type_description" required=""><?php echo $result['tax_type_name']; ?></textarea>
                                </div>
                            </div>
                            <div class="ln_solid" style="visibility: hidden"></div>
                            <div class="form-group">
                                <div class="col-md-8 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>                       
    </div>
</div>