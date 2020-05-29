
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
        <h1 class="heading" style="text-align: center;">Dealer List</h1>        
        <br>      
        <!-- The Modal -->                
<!-- page content -->        
        <div class="row">            
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">                                       
                    <div class="x_content">                    					
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Index</th> 
                                    <th>Name</th> 
                                    <th>Code</th> 
                                    <th>TIN</th> 
                                    <th>PAN No.</th> 
                                    <th>Aadhar No.</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Status</th>
                                    <th>Lastlogin</th>                                    
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Index</th> 
                                    <th>Name</th> 
                                    <th>Code</th> 
                                    <th>TIN</th> 
                                    <th>PAN No.</th> 
                                    <th>Aadhar No.</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Status</th>
                                    <th>Lastlogin</th>
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

