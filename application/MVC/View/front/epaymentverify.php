
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
    }
    .location{
        display: none;
    }
    #example_length label{
        float: left;
        padding: 10px;
    }
    #example_filter label{
        float: right;
        padding: 10px;
    }
    .pagination{
        float: right;
    }
    .paginate_button {
        margin: 4px;        
    }
    table.dataTable thead .sorting:after{
        opacity: 0;
    }
</style>
<div class="col-md-9 col-sm-12  col-12 ">
    <div class="middle-area box-shadow">
        <h1 class="heading" style="text-align: center;">View / Verify e-Payment</h1>        
        <br>      
        <!-- The Modal -->
        
        <div class="row section-row">
            <div class="col-md-12 col-sm-12 col-12">                
                <center><h4 class="sm-heading">View e-Payment</h4></center>                  
                <table class="table" border="1">
                    <tr>                        
                        <td>Transaction No.</td>
                        <td><input type="text" id="tax_transaction_no" maxlength="20"></td>
                        <td>Vehicle No</td>                      
                        <td><input type="email" id="email"></td>                     
                    </tr>  
                    <tr>                        
                        <td>Status</td>
                        <td>
                            <select class="" id="status">                                            
                                <option class="" value="0" selected="" disabled="">Select</option> 
                                <option class="" value="SUCCESS">Success</option> 
                                <option class="" value="FAILURE">Failed</option>
                                <option class="" value="AWAITING CONFIRMATION">Awaiting Confirmation</option>
                                <option class="" value="PENDING">Pending</option> 
                            </select>                            
                        </td>
                        <td>Mobile No</td>                      
                        <td><input type="text" id="mobileNo" class="mobileno"></td>                      
                    </tr>                                                              
                    <tr class="input-daterange">
                        <!--<div class="input-daterange input-group" id="datepicker">-->                                                                                                                                
                        <td>From Date</td>                                               
                        <td><input type="text" id="startdate" name="start"/></td>
                        <td>To Date</td>
                        <td><input type="text" id="enddate" name="end"/></td>  
                        <!--</div>-->    
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
                </style><center><button id="search">Search</button>&nbsp;&nbsp;<button id="back">Back</button></center>
            </div>                                                                                    
        </div>       
<!-- page content -->        
        <div class="row">            
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">                                       
                    <div class="x_content">                    					
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Index</th> 
                                    <th>Department</th> 
                                    <th>App RefNo</th> 
                                    <th>Transaction Date</th> 
                                    <th>Payment Date</th> 
                                    <th>Bank</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>BRN</th>
                                    <th>Himgrn</th>
                                    <th>Challan Id</th>
                                    <th>TaxType Id</th>
                                    <th>Download</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Index</th> 
                                    <th>Department</th> 
                                    <th>App RefNo</th> 
                                    <th>Transaction Date</th> 
                                    <th>Payment Date</th> 
                                    <th>Bank</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>BRN</th>
                                    <th>Himgrn</th>
                                    <th>Challan Id</th> 
                                    <th>TaxType Id</th>
                                    <th>Download</th>
                                    <th>View</th>
                                </tr>
                            </tfoot>
                        </table>					
                    </div>
                </div>
            </div>
        </div>          
<!-- /page content -->


        
    </div>
</div>

