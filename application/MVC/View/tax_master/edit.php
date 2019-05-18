<!-- page content -->
<div class="right_col">
    <div class="">      
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Tax Master</h2>                    
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" method="post" name="edittaxmaster" action="<?php echo ADMIN_TAX_MASTER_EDIT_LINK.$result['tax_master_id']; ?>">                                                                                                                                                                                                                                                        
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_master_id">ID<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" value="<?php echo $result['tax_master_id']; ?>" name="tax_master_id"  placeholder="Enter tax master id" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_transaction_head">Transaction Head<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?php echo $result['tax_transaction_head']; ?>" name="tax_transaction_head"  placeholder="Enter transaction head" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_transaction_dept">Transaction Department<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?php echo $result['tax_transaction_dept']; ?>" name="tax_transaction_dept"  placeholder="Enter transaction department" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_transaction_ddo">Transaction DDO<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?php echo $result['tax_transaction_ddo']; ?>" name="tax_transaction_ddo"  placeholder="Enter transaction DDO" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                                                   
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_type_status">Status
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="tax_type_status" required="">                                            
                                        <option class="" value="" selected="" disabled=""i>Select Status</option>                                           
                                        <option class="" value="ACTIVE" <?php echo set_selected('ACTIVE', $result['tax_master_status']) ?>>True</option>   
                                        <option class="" value="INACTIVE" <?php echo set_selected('INACTIVE', $result['tax_master_status']) ?>>False</option>                                           
                                    </select>
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