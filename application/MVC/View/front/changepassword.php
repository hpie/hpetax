<div class="col-md-9 col-sm-12  col-12 ">
    <div class="middle-area box-shadow">
        <h1 class="heading" style="text-align: center;">Change Password</h1>        
        <br>      
        <!-- The Modal -->        
        <div class="row section-row">
            <div class="col-md-12 col-sm-12 col-12">                
                <center><h4 class="sm-heading">Change Password</h4></center>                 
            </div>
            <form method="post" id="frm_change_password" class="form-horizontal border p-2" action="<?php echo FRONT_CHANE_PASSWORD_DEALER_LINK; ?>">
                <h2 class="second-heading">Change password</h2>
                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-sm-4 col-xs-12" for="current_password">Current Password:</label>
                        <div class="col-sm-8 col-xs-12">
                            <input type="text" class="form-control" name="current_password" id="current_password" placeholder="Enter Current Password">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-sm-4 col-xs-12" for="new_password">New Password:</label>
                        <div class="col-sm-8 col-xs-12">
                            <input type="password" minlength="8" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-sm-4 col-xs-12" for="confirm_password">Confirm Password: </label>
                        <div class="col-sm-8 col-xs-12">
                            <input type="password" minlength="8" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="m-auto text-center">
                        <button type="submit" class="btn primary_btn">Update</button>
                    </div>
                </div>
            </form>
        </div>   
    </div>
</div>

