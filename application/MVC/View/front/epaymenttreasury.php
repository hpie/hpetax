
<style>
    select, option {
        width: 250px;
    }
/*    select{
        width:50%;
    }*/
    input{
        width:50%;
    }
    textArea{
        width:50%;
    }
    option {
        overflow: hidden;
        white-sapce: no-wrap;
        text-overflow: ellipsis;
    }
    .datepicker  {
    background: #fff !important;
</style>
<div class="col-md-9 col-sm-12  col-12 ">
    <div class="middle-area box-shadow">
        <h1 class="heading" style="text-align: center;">e-Payments</h1>        
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
                <center><h4 class="sm-heading">Challan Form</h4></center>                  
                <table class="table" border="1">
                    <tr>                        
                        <td>Tax Type</td>
                        <td><input type="text"  required="required" readonly=""></td>
                        <td>Name Of Person*</td>
                        <td><input type="text"  required="required"></td>                        
                    </tr>  
                    <tr>                        
                        <td>Mobile No.*</td>
                        <td><input type="text" readonly="" value="+91" style="width:30px;">&nbsp;<input type="text"  required="required" ></td>
                        <td>Email Id</td>
                        <td><input type="email"  required="required"></td>                        
                    </tr> 
                    <tr>                        
                        <td>Address*</td>
                        <td><textarea rows="3" cols="50"></textarea></td>
                        <td>Location Name*</td>
                        <td>
                            <select class="" required="">                                            
                                <option class="" value="0" selected="">Select</option> 
                                <option class="" value="Shimla" selected="">Shimla</option> 
                                <option class="" value="Solan" selected="">Solan</option>
                                <option class="" value="Baddi" selected="">Baddi</option>
                                <option class="" value="Sirmour" selected="">Sirmour</option> 
                            </select>                            
                        </td>                        
                    </tr>
                    <tr>                        
                        <td><br></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr> 
                    <tr>                        
                        <td>Dealer Type *</td>
                        <td><select class="" required="">                                            
                                <option class="" value="0" selected="">Select</option> 
                                <option class="" value="Shimla" selected="">Daily</option> 
                            </select></td>
                        <td></td>
                        <td></td>                        
                    </tr> 
                    <tr class="input-daterange">
                        <!--<div class="input-daterange input-group" id="datepicker">-->                                                                                                                                
                        <td>Tax period From</td>                                               
                        <td><input type="text" name="start" /></td>
                        <td>Tax period To</td>
                        <td><input type="text" name="end" /></td>  
                        <!--</div>-->    
                    </tr>
                </table>               
            </div>
            <br>
            <br>
            <div class="col-md-12 col-sm-12 col-12">                
                <center><h4 class="sm-heading">Purpose for Challan *</h4></center>                  
                <table class="table" border="1">
                    <tr>
                        <th style="width:5%">&nbsp;</th>
                        <th style="width:45%">Purpose</th>
                        <th style="width:25%">Code</th>
                        <th style="width:25%">Amount(Rs.)</th>
                    </tr>              
                </table>               
            </div>  
            <br>
            <br>
            <div class="col-md-12">
                <style>
                    button{
                        width:50px !important;
                        background-color:#264a62 !important;
                        color:#fff !important;
                    }
                </style>
                <center><button id="add">Confirm</button>&nbsp;&nbsp;<button id="clear">Clear</button></center>
            </div>                                                                                    
        </div>
    </div>
</div>

