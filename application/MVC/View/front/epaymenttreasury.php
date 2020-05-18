
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
        <h1 class="heading" style="text-align: center;">e-Payments</h1>        
        <br>      
        <div class="row section-row">
            <div class="col-md-12 col-sm-12 col-12">                
                <center><h4 class="sm-heading">Challan Form</h4></center>  
                <input type="hidden" id="tax_dealer_id" value="<?php if(isset($_SESSION['dealerDetails']['tax_dealer_id'])){ echo $_SESSION['dealerDetails']['tax_dealer_id']; } else{ echo 0; } ?>">                
                <table class="table" border="1">
                    <tr>                        
                        <td>Tax Type</td>
                        <td><input type="text" id="type_code"  required="required" readonly="" value="<?php echo $result['tax_type_id']; ?>">
                            <input type="hidden" id="tax_type_head"  required="required" readonly="" value="<?php echo $result['tax_type_head']; ?>">
                            <input type="hidden" id="tax_commodity_head"  required="required" readonly="" value="<?php echo $comodityHead['tax_commodity_subhead'];?>">
                        </td> 
                        <td>Receipt For*</td>
                        <td>
                            <select class="" required="" id="receipt">                                            
                                <option class="" value="0" selected="" disabled="">Select</option> 
                                <?php
                                if(isset($headReceipt) && !empty($headReceipt)){
                                 foreach ($headReceipt as $row){
                                     ?>
                                    <option class="" value="<?php echo $row['tax_receipt_head']; ?>"><?php echo $row['tax_revenue_receipt_name']; ?></option>
                                <?php
                                    }
                                 }
                                ?>                                 
                            </select>                            
                        </td>
                    </tr>
                    <tr>                        
                        <td>Name Of Person*</td>
                        <td><input type="text" id="name" value=""  required="required"></td>
                        <td></td>
                        <td></td>                       
                    </tr>
                    <tr>                        
                        <td>Mobile No.*</td>
                        <td><input type="text" readonly="" value="+91" style="width:30px;">&nbsp;
                            <input class="mobileno" type="text" id="mobileno" required="required" maxlength="10" minlength="10" value="<?php if(isset($dealerDetails)){ echo $dealerDetails['tax_dealer_mobile']; } ?>"></td>
                        <td>Email Id</td>
                        <td><input type="email" id="email" value="<?php if(isset($dealerDetails)){ echo $dealerDetails['tax_dealer_email']; } ?>"  required="required"></td>                        
                    </tr> 
                    <tr>                        
                        <td>Address*</td>
                        <td><textarea rows="3" cols="50" id="address"></textarea></td>
                        <td>Location Name*</td>
                        <td>
                            <select class="" required="" id="location">                                            
                                <option class="" value="0" selected="" disabled="">Select</option> 
                                <?php
                                 foreach ($locationDDO as $row){
                                     ?>
                                     <option class="" value="<?php echo $row['tax_location_ddo_code']; ?>"><?php echo $row['tax_location_ddo_location']; ?> - <?php echo $row['tax_location_ddo_code']; ?></option>
                                <?php
                                 }
                                ?>                                 
                            </select>                            
                        </td>                        
                    </tr>
                    <tr>                        
                        <td>City</td>
                        <td><input type="text" id="city" value=""  required="required"></td>
                        <td>PIN</td>
                        <td><input class="mobileno" type="text" id="pin" required="required" maxlength="6" minlength="6"></td></td>
                    </tr>
                     <tr>                        
                        <td><br></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr> 
                    <tr>                        
                        <td>Dealer Type *</td>
                        <td><select class="" required="" id="day">                                            
                                <option class="" value="0" selected="" disabled="">Select</option> 
                                <option class="" value="daily">Daily</option> 
                                 <!--<option class="" value="weekly" selected="">weekly</option>--> 
                            </select>
                        </td>
                        <td></td>
                        <td></td>                        
                    </tr> 
                    <tr class="input-daterange">
                        <!--<div class="input-daterange input-group" id="datepicker">-->                                                                                                                                
                        <td>Tax period From</td>                                               
                        <td><input type="text" id="startdate" name="start" value="<?php echo date('d/m/Y'); ?>"/></td>
                        <td>Tax period To</td>
                        <td><input type="text" id="enddate" name="end" value="<?php echo date('d/m/Y'); ?>"/></td>  
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
                    <tr>
                        <td>
                    <center> <input type="checkbox" value="1" id="reciptscheck"></center>                        
                    </td>
                    <td>RECEIPTS FROM <?php echo $result['tax_type_name']; ?></td>
                    <td id="receiptCode"></td>
                    <td><input type="text" id="total" value="<?php echo round($total); ?>"></td>
                    </tr>
                </table>
                <p>Sum of amount in all head should be <b id="sumofamount"></b> as per tax calculation.</p>
                <p>Total Amount(Rs.) &nbsp;<input type="text" id="finaltotal" style="width:150px;" readonly=""></p>
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
                <center><button id="confirm">Confirm</button>&nbsp;&nbsp;<button id="back" class="location">Back</button> &nbsp;&nbsp;<button id="submit" class="location">Submit</button>&nbsp;&nbsp;<button id="cancel">Cancel</button></center>
            </div>                                                                                    
        </div>
    </div>
</div>

