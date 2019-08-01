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
        <div class="modal fade" id="details-remarks">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header bg-success mb-0">
                        <h4 class="modal-title  text-white">Details / Remarks</h4>
                        <button type="button" class="close text-white"
                                data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <table class="table table-responsive">
                            <tr>
                                <td>Subject</td>
                                <td>MRP Order dated 03-04-2019-IMFS for the Year 2019-20</td>
                            </tr>
                            <tr>
                                <td> Detail</td>
                                <td>MRP Order dated 03-04-2019-IMFS for the Year 2019-20</td>
                            </tr>
                            <tr>
                                <td>Publish Date</td>
                                <td>03/04/2019</td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="#">
                                        <i class="fa fa-download color-white" aria-hidden="true"></i> &nbsp;Download (English Version)
                                    </a> </td>
                            </tr>
                        </table>
                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>       
        <div class="row section-row">
            <div class="col-md-12 col-sm-12 col-12">                
                <center><h4 class="sm-heading">New User SignUp</h4></center>                  
                <table class="table" border="1" id="tabledata">
                    <tr>                        
                        <td>Tax Type *  :</td>
                        <td>
                            <select class="" required="">                                            
                                <option class="" value="0" selected="">Select</option>                                           
                                <?php
                                if (!empty($result)) {
                                    foreach ($result as $row) {
                                        ?>
                                        <option class="" value="<?php echo $row['tax_type_id']; ?>"><?php echo $row['tax_type_name']; ?></option>                                       
                                        <?php
                                    }
                                }
                                ?>                                    
                            </select>
                        </td>                        
                    </tr>   
                    <tr>                        
                        <td>TIN / License No.  *</td>
                        <td><input type="text" maxlength="11" minlength="11" required="required"></td>                       
                    </tr>
                    <tr>                                                                                                                                                      
                        <td>Date of Validity ( dd/mm/yyyy ) *  :</td>                                               
                        <td><input type="text" id="validitydate" value="<?php echo date('d/m/Y'); ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span></td>                                               
                    </tr>
                </table>
            </div>         
            <div class="col-md-12">
                <style>
                    button{
                        width:50px !important;
                        background-color:#264a62 !important;
                        color:#fff !important;
                    }
                </style>
                <center><button>Add</button>&nbsp;&nbsp;<a href="<?php echo BASE_URL; ?>"><button>Back</button></a></center>                
            </div>          
        </div>       
    </div>
</div>

