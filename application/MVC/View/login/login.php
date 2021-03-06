<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo APPNAME; ?></title>
        <!-- Bootstrap -->
        <script src="<?php echo BASE_URL; ?>assets/jquery/dist/jquery.min.js" type="text/javascript" nonce='S51U26wMQz'></script>
        <link href="<?php echo BASE_URL; ?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- Font Awesome -->
        <link href="<?php echo BASE_URL; ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- NProgress -->
        <link href="<?php echo BASE_URL; ?>assets/nprogress/nprogress.css" rel="stylesheet" type="text/css">
        <!-- Animate.css -->
        <!--<link href="<?php echo BASE_URL; ?>assets/animate.css/animate.min.css" rel="stylesheet">-->

        <!-- Custom Theme Style -->
        <link href="<?php echo BASE_URL; ?>assets/build/css/custom.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/jqueryui/jquery-ui.css" type="text/css">
        <script src="<?php echo BASE_URL; ?>assets/jquery/dist/jquery.js" type="text/javascript" nonce='S51U26wMQz'></script>
        <script src="<?php echo BASE_URL; ?>assets/jqueryui/jquery-ui.js" type="text/javascript" nonce='S51U26wMQz'></script>
        
        <script type="text/javascript" nonce='S51U26wMQz'>
            $(document).ready(function () {               
                var valid =<?php if($_SESSION['valid']==1){echo $_SESSION['valid'];} else{ echo '0';} ?>;
                if (valid)
                {
                    if (valid == 1)`                        `
                    {
                        $("#validdiv1").effect("shake");                        
                    }
                }
            });
        </script>
    </head>
    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>
            <div class="login_wrapper"  style="padding-top: 200px;" id="validdiv1">
                <div class="animate form login_form">
                    <section class="login_content">
                        
                        <?php if($count==false){
                            ?>
                        <form method="post">              
                          <!--<center><div id="validdiv">Invalid Username And Password</div></center>-->
                            <h1>Login Form</h1>
                            <div>
                                <input type="text" class="form-control" placeholder="Username" required="" name="email"/>
                            </div>
                            <div>
                                <input type="password" class="form-control" placeholder="Password" required="" name="password"/>
                            </div>
                            <div>
                                <input type="submit" class="btn btn-default submit col-xs-12 btn-info" value="Log in" name="login"/>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">                                             
                                <?php if(isset($_SESSION['valid'])){ if($_SESSION['valid']==1){
                                    ?>
                                <center><div id="validdiv" style="color:red;padding-top: 30px;">Invalid Username And Password</div></center>
                                <br />
                                <?php
                                }} ?>                                                                
                                <div>
                                    <h1><i class="fa fa-modx">&nbsp;</i><?php echo APPNAME ?></h1>
                                    <p>©<?php echo date("Y"); ?> All Rights Reserved <?php echo APPNAME ?>.</p>
                                </div>
                            </div>
                        </form>
                        <?php
                        }
                        else{
                            ?>
                        <center><div id="validdiv" style="color:red;padding-top: 30px;"><h3>Your are allowed 3 attempts in 10 minutes</h3></div>
                            <br><br>
                        <div>
                                    <h1><i class="fa fa-modx">&nbsp;</i><?php echo APPNAME ?></h1>
                                    <p>©<?php echo date("Y"); ?> All Rights Reserved <?php echo APPNAME ?>.</p>
                                </div>
                        </center>
                        <?php
                        }
                        ?>                                                
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>
