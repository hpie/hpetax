<div class="col-md-9 col-sm-12  col-12 ">
    <div class="middle-area box-shadow">
        <h1 class="heading" style="text-align: center;">Employee Login</h1>        
        <br>      
        <!-- The Modal -->
       
        <div class="row section-row">
            <form method="post" action="<?php echo FRONT_LOGIN_EMPLOYEE_LINK; ?>" class="col-md-12 col-sm-12 col-12">
            <div>                
                <center><h4 class="sm-heading">Employee Login</h4></center>                                  
                <table class="table" border="1" id="tabledata">
                    <tr>                        
                        <td width='30%'>Username</td>
                        <td width='70%'><input type="text" name="code" required="required"></td>                       
                    </tr>
                    <tr>                        
                        <td width='30%'>Password</td>
                        <td width='70%'><input type="password" name="password" required="required"></td>                       
                    </tr>                  
                </table>
            </div>         
            <div>
                <style>
                    button{
                        width:50px !important;
                        background-color:#264a62 !important;
                        color:#fff !important;
                    }
                </style>
                <center><button type="submit" name="submit">Login</button></center>                
            </div> 
            </form>
        </div>       
    </div>
</div>

