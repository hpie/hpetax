
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
                        <td><input type="text" id="tax_transaction_no"  required="required"></td>
                        <td></td>                      
                        <td></td>                      
                    </tr>  
                    <tr>                        
                        <td>Status</td>
                        <td>
                            <select class="" required="" id="status">                                            
                                <option class="" value="0" selected="" disabled="">Select</option> 
                                <option class="" value="Success">Success</option> 
                                <option class="" value="Failed">Failed</option>
                                <option class="" value="Awaiting Confirmation">Awaiting Confirmation</option>
                                <option class="" value="Pending">Pending</option> 
                            </select>                            
                        </td>
                        <td></td>
                        <td></td>                        
                    </tr>                                                              
                    <tr class="input-daterange">
                        <!--<div class="input-daterange input-group" id="datepicker">-->                                                                                                                                
                        <td>From Date</td>                                               
                        <td><input type="text" id="startdate" name="start" value="<?php echo date('d/m/Y'); ?>"/></td>
                        <td>To Date</td>
                        <td><input type="text" id="enddate" name="end" value="<?php echo date('d/m/Y'); ?>"/></td>  
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
    </div>
</div>

