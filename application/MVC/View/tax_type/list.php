<!-- page content -->
<div class="right_col">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tax Type List</h3>
            </div>              
        </div>
        <div class="clearfix"></div>
        <div class="row">            
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">                        
                        <a href="<?php echo ADMIN_TAX_TYPE_ADD_FORM_LINK; ?>"><button type="button" data-toggle="tooltip" title="Add New" class="btn btn-info btn-sm" style="float: right"><i class="fa fa-plus"> New Tax Type</i></button></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">                    					
                        <table id="" class="myTable table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>                                    
                                    <th>Description</th>   
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
                                            <td><?php echo $row['tax_type_id'];?></td>
                                            <td><?php echo $row['tax_type_name']; ?></td>                                            
                                            <td><?php echo $row['tax_type_description'] ?></td>
                                            <td><?php echo $row['tax_type_status'] ?></td>                                                                    
                                            <td>                                                                                                                                                                               
                                                <a href="<?php echo ADMIN_TAX_TYPE_EDIT_FORM_LINK . $row['tax_type_id']; ?>" type="button" data-toggle="tooltip" title="Edit" class="btn btn-warning btn-xs">&nbsp;Edit&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>                                                
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