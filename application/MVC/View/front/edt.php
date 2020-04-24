<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/front/css/dataTables.responsive.css">
<link href="<?php echo BASE_URL; ?>/assets/front/css/jquery1.dataTables.min.css" rel="stylesheet" type="text/css"/>
<!--<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/front/css/jquery.dataTables.css">-->
<style>
    
    .responsive {
  width: 100%;
  border-collapse: collapse;
}
.responsive tr:nth-of-type(odd) {
  background: #eee;
}
.responsive th {
  border: solid 1px #fff;
  font-weight: bold;
  background: #264a62;
  color: white;
}
.responsive th, .responsive td {
  text-align: left;
  padding: 6px;
}
.responsive td {
  border: solid 1px #fff;
  background: #e0e4e5 !important;
}
@media only screen and (max-width: 640px) {
  .frame {
    padding: 20px;
  }
  .responsive, .responsive thead, .responsive tbody, .responsive th, .responsive td, .responsive tr {
    display: block;
  }
  .responsive {
    border-top: 1px solid #fff;
    border-left: 1px solid #fff;
    border-right: 1px solid #fff;
  }
  .responsive thead tr {
    position: absolute;
    top: -9999px;
    left: -9999px;
  }
  .responsive td {  
    border: solid 1px #fff;
    position: relative;
    padding-left: 50%;
  }
  .responsive td:nth-of-type(4) {   
    border: solid 1px #fff;
  }
  .responsive tr {
    border-bottom: 1px solid #fff;
  }
  .responsive td:before {
      border: solid 1px #fff;
    position: absolute;
    top: 6px;
    left: 6px;
    width: 45%;
    padding-right: 10px;
    white-space: nowrap;
    font-weight: bold;
  }
  .responsive td:nth-of-type(1):before {
    content: "NDC";
  }
  .responsive td:nth-of-type(2):before {
    content: "DESCRIPTION";
  }
  .responsive td:nth-of-type(3):before {
    content: "ABC";
  }
  .responsive td:nth-of-type(4):before {
    content: "CARDINAL";
  }
}
    
    /*    select{
            width:50%;
        }*/    
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
        <h1 class="heading" style="text-align: center;">EDT</h1>        
        <br>      
        <!-- The Modal -->
        
        <div class="row section-row">
            <div class="col-md-12 col-sm-12 col-12">                
                <center><h4 class="sm-heading">Consigner</h4></center>                  
                <table class="table" border="1">
                    <tr>                        
                        <td>GST No.</td>
                        <td><input type="text"  required="required" id="consigner_gst"></td>
                        <td>Firm Name</td>                      
                        <td><input type="text"  required="required" id="consigner_firm_name"></td>
                        <td>Firm Address</td>
                        <td><textarea id="consigner_firm_address"></textarea></td>
                    </tr>
                    <tr>                        
                        <td>Invoice No.</td>
                        <td><input type="text"  required="required" id="invoice_no"></td>
                        <td>Invoice Date</td>                      
                        <td><input type="text" id="invoice_date"/></td>  
                        <td>Invoice Amount</td>
                        <td><input type="text"  required="required" id="invoice_amount"></td>
                    </tr>
                    <tr>                        
                        <td>Goods Detail</td>
                        <td><input type="text"  required="required"></td>
                        <td>Vehicle No.</td>
                        <td><input type="text"  required="required" id="vehicle_number"></td>
                        <td>Transaction Type</td>
                        <td><input type="text"  required="required" id="transaction_type"></td>                                              
                    </tr>
                    <tr>                        
                        <td colspan="6">&nbsp;</td>                                                                                         
                    </tr>
                    <tr>                        
                        <td colspan="6"><center><h4 class="sm-heading">Consignee</h4></center></td>                                                                                         
                    </tr>
                    <tr>                        
                        <td>GST No of Consignee</td>
                        <td><input type="text"  required="required" id="consignee_gst"></td>
                        <td>Firm Name</td>
                        <td><input type="text"  required="required" id="consignee_firm_name"></td>
                        <td>Bill to(Address)</td>
                        <td><textarea id="consignee_bill_to"></textarea></td>                                              
                    </tr>
                    <tr>                                                
                        <td>Ship to(Address)</td>
                        <td><textarea id="consignee_ship_to"></textarea></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
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
                <center><button id="searchYear">Search</button></center>
            </div>                                                                                    
        </div>                     
    </div>
</div>
<div class="col-md-12 col-sm-12  col-12 ">
    <div class="middle-area box-shadow">
<div class="row section-row">
        <div class="col-md-12 col-sm-12 col-12">
        <table id="example" class="responsive" style="width:100%">
                            <thead>
                                <tr> 
                                    <th>Index</th> 
                                    <th>ID</th> 
                                    <th>Invoice no</th> 
                                    <th>Invoice Date</th> 
                                    <th>Amount</th> 
                                    <th>Vehicle number</th>
                                    <th>Transaction Type</th>
                                    <th>Consigner GST</th>
                                    <th>Consigner Firm Name</th>
                                    <th>Consigner Firm Address</th>
                                    <th>Consignee Gst</th>
                                    <th>Consignee Firm Name</th>                                    
                                    <th>Consignee Bill To</th>
                                    <th>Consignee Ship To</th>
                                    <th>Inspected Date</th>
                                    <th>Employee Code</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>  
                                    <th>Index</th> 
                                    <th>ID</th> 
                                    <th>Invoice no</th> 
                                    <th>Invoice Date</th> 
                                    <th>Amount</th> 
                                    <th>Vehicle number</th>
                                    <th>Transaction Type</th>
                                    <th>Consigner GST</th>
                                    <th>Consigner Firm Name</th>
                                    <th>Consigner Firm Address</th>
                                    <th>Consignee Gst</th>
                                    <th>Consignee Firm Name</th>                                    
                                     <th>Consignee Bill To</th>
                                    <th>Consignee Ship To</th>
                                    <th>Inspected Date</th>
                                    <th>Employee Code</th>
                                </tr>
                            </tfoot>
                        </table>
            </div>
        </div> 
    </div>
        </div> 
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>assets/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>assets/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>assets/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>assets/datatables.net-bs/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>assets/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>assets/datatables.net-buttons-bs/js/buttons.bootstrap.min.js" type="text/javascript"></script>
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>assets/datatables.net-buttons/js/buttons.flash.min.js" type="text/javascript"></script>
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>assets/datatables.net-buttons/js/buttons.html5.min.js" type="text/javascript"></script>
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>assets/datatables.net-buttons/js/buttons.print.min.js" type="text/javascript"></script>
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>assets/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>assets/datatables.net-keytable/js/dataTables.keyTable.min.js" type="text/javascript"></script>
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>assets/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>assets/datatables.net-responsive-bs/js/responsive.bootstrap.js" type="text/javascript"></script>
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>assets/datatables.net-scroller/js/dataTables.scroller.min.js" type="text/javascript"></script>
<script nonce='S51U26wMQz' type="text/javascript" language="javascript" src="<?php echo BASE_URL; ?>/assets/front/js/dataTables.responsive.min.js"></script>
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {              
            function fill_datatable()
            {    
                var consigner_gst = $('#consigner_gst').val();
                var consigner_firm_name = $('#consigner_firm_name').val();
                var consigner_firm_address = $('#consigner_firm_address').val();
                var invoice_no = $('#invoice_no').val();
                var invoice_date = $('#invoice_date').val();
                var invoice_amount = $('#invoice_amount').val();
                var vehicle_number = $('#vehicle_number').val();
                var transaction_type = $('#transaction_type').val();
                var consignee_gst = $('#consignee_gst').val();
                var consignee_firm_name = $('#consignee_firm_name').val();
                var consignee_bill_to = $('#consignee_bill_to').val();
                var consignee_ship_to = $('#consignee_ship_to').val();               
                $('#example').DataTable({
                    responsive: {
                        details: {
                            type: 'column',
                            target: 'tr'
                        }
                    },
                    columnDefs: [{
                            className: 'control',
                            orderable: false,
                            targets: 0
                        }],
                    "processing": true,
                    "serverSide": true,
                    "paginationType": "full_numbers",
                    "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                    "ajax": {
                        'type': 'POST',
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/edtList.php' ?>",
                        'data': {   
                            consigner_gst:consigner_gst,
                            consigner_firm_name:consigner_firm_name,
                            consigner_firm_address:consigner_firm_address,
                            invoice_no:invoice_no,
                            invoice_date:invoice_date,
                            invoice_amount:invoice_amount,
                            vehicle_number:vehicle_number,
                            transaction_type:transaction_type,
                            consignee_gst:consignee_gst,
                            consignee_firm_name:consignee_firm_name,
                            consignee_bill_to:consignee_bill_to,
                            consignee_ship_to:consignee_ship_to
                        }
                    },
                    "columns": [    
                        {"data": "index"},
                        {"data": "tax_edt_invoice_id"},
                        {"data": "invoice_no"},
                        {"data": "invoice_date"},
                        {"data": "invoice_amount"},
                        {"data": "vehicle_number"},
                        {"data": "transaction_type"},
                        {"data": "consigner_gst"},
                        {"data": "consigner_firm_name"},
                        {"data": "consigner_firm_address"},
                        {"data": "consignee_gst"},
                        {"data": "consignee_firm_name"},
                        {"data": "consignee_bill_to"},
                        {"data": "consignee_ship_to"},                        
                        {"data": "inspected_date"},
                        {"data": "tax_employee_code"}
                    ]
                });
            }
            $('#searchYear').click(function () {                                                
                $('#example').DataTable().destroy();
                fill_datatable();                
            });                               
        });
    </script>
