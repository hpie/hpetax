
<style>
    select, option {
        width: 250px;
    }

    option {
        overflow: hidden;
        white-sapce: no-wrap;
        text-overflow: ellipsis;
    } 
    .hovercs:hover {
        color: red;
    }
    td, th{
        border: 1px solid #dddddd !important;   
        padding: 8px !important;
    }
    #map {
        height: 100%;
        width: 100%;
    }
    .location{
        display: none;
    }
</style>
<div class="col-md-9 col-sm-12  col-12 ">
    <div class="middle-area box-shadow">
        <h1 class="heading" style="text-align: center;">e-Payment (Unregistered)</h1>        
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
                <center><h4 class="sm-heading">e-Payment (Unregistered)</h4></center>   

                <input type="hidden" id="hiderate">

                <table class="table" border="1" id="tabledata">
                    <tr>
                        <td>&nbsp;</td>
                        <td>Tax Type*</td>
                        <td>
                            <select class="" required="" id="taxType">                                            
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
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>   
                    <tr id="commoditytr">
                        <td>&nbsp;</td>
                        <td>Commodity / Description*</td>
                        <td>
                            <select class="" required="" id="commodity">                                            
                                <option class="" value="0" selected="">Select</option>                                                                                                                   
                            </select>
                        </td>
                        <td>&nbsp;</td>
                        <td>Vehicle Number*</td>
                        <td><input type="text" id="vehicleno" required="required"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr> 
                    <tr class="location" id="locationtr">
                        <td>&nbsp;</td>
                        <td>Source Location*</td>
                        <td><input id="sourcelocation" class="clearalltext" type="text" placeholder="Source Location" required="required"></td>
                        <td>&nbsp;</td>
                        <td>Destination Location*</td>
                        <td><input id="destinationlocation" class="clearalltext" type="text" placeholder="Destination Location" required="required"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12 location" id="mapdisplay" style="height: 300px;">                           
                <div id="map"></div> 
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
                <center><button id="add">Add</button>&nbsp;&nbsp;<button id="clear">Clear</button></center>
            </div>                                                                                    

        </div>

        <br>
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">          
                <style>
                    tr th{
                        padding: 10px;
                    }
                </style>
                <table style="width:100%" border="1">
                    <thead class="sm-heading">
                        <tr class="ajaxtr">
                            <!--<th>Sr. No</th>-->
                            <th class="custometh">Delete</th>
                            <th class="custometh">Modify</th>
                            <th class="custometh">Tax Type</th>
                            <th class="custometh">Commodity / Description</th>
                            <th class="custometh">Vehicle Number</th>
                            <th class="custometh">Weight</th>
                            <th class="custometh">Unit</th>
                            <th class="custometh quantity">Quantity</th>
                            <th class="custometh">Source Location</th>
                            <th class="custometh">Destination Location</th>
                            <th class="custometh">Distance (in Km) within HP</th>
                            <th class="custometh">Total Tax (in Rs.)</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">                
                    </tbody>
                </table>
            </div>            
            <div class="col-md-12" style="background-color:#264a62;color:#fff;margin-top: 150px;">               
                <center>Total: <input id="total" type="text" readonly=""></center>                
            </div>
            
            <div class="col-md-12">
                <br>
            <center><button id="add">Confirm</button>&nbsp;&nbsp;<button id="back" onclick="window.history.back();">Back</button></center>
            </div>
        </div>
    </div>
</div>

