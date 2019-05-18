<!-- page content -->
<div class="right_col">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tax Master List</h3>
            </div>              
        </div>
        <div class="clearfix"></div>
        <div class="row">            
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">                        
                        <a href="<?php echo ADMIN_TAX_MASTER_ADD_FORM_LINK; ?>"><button type="button" data-toggle="tooltip" title="Add New" class="btn btn-info btn-sm" style="float: right"><i class="fa fa-plus"> New Tax Master</i></button></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">                    					
                        <table id="" class="myTable table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Transaction Head</th>                                    
                                    <th>Transaction Department</th>   
                                    <th>Transaction DDO</th>
                                    <th>Status</th>
                                    <th>Action</th>                       
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($result)) {
                                    foreach ($result as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['tax_master_id'];?></td>
                                            <td><?php echo $row['tax_transaction_head']; ?></td>                                            
                                            <td><?php echo $row['tax_transaction_dept'] ?></td>
                                            <td><?php echo $row['tax_transaction_ddo'] ?></td>                                                                    
                                            <td><?php echo $row['tax_master_status'] ?></td>                                                                    
                                            <td>                                                                                                                                                                               
                                               <a href="<?php echo ADMIN_TAX_MASTER_EDIT_FORM_LINK . $row['tax_master_id']; ?>" type="button" data-toggle="tooltip" title="Edit" class="btn btn-warning btn-xs">&nbsp;Edit&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>                                                
                                            </td>
                                        </tr>   
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>						
                    </div>
                </div>
            </div>
        </div>      
    </div>
</div>
<!-- /page content -->