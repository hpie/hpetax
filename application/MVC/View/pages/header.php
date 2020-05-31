<?php
if(isset($_SESSION['user_id'])){
    if (auto_logout("user_time")) {
        session_unset();
        session_destroy();    
        redirect(LOGIN);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <!--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">-->
    <!--<meta http-equiv="Content-Security-Policy" content="object-src 'self'; script-src 'nonce-S51U26wMQz' https://www.gstatic.com; "> -->
    <!--<meta http-equiv="Content-Security-Policy" content="script-src 'strict-dynamic' 'nonce-S51U26wMQz' 'unsafe-inline' http: https: https://www.gstatic.com https://csp.withgoogle.com https://www.google.com; object-src 'none'; base-uri 'none'; require-trusted-types-for 'script'; ">-->
    <meta http-equiv="Content-Security-Policy" content="script-src 'strict-dynamic' 'nonce-S51U26wMQz' 'unsafe-inline' http: https: https://www.gstatic.com https://csp.withgoogle.com https://www.google.com; object-src 'none'; base-uri 'none';">

      <title><?php echo $TITLE ?></title>
    <!-- Bootstrap -->
    <link href="<?php echo BASE_URL; ?>assets/bootstrap/dist/css/bootstrap.min.css?v=1.0" rel="stylesheet" type="text/css">
    <!-- Font Awesome -->
    <link href="<?php echo BASE_URL; ?>assets/font-awesome/css/font-awesome.min.css?v=1.0" rel="stylesheet" type="text/css">
    

     <!--<link href="<?php echo BASE_URL; ?>assets/datepicker1/css/datepicker.css" rel="stylesheet">--> 
    <!-- NProgress -->
    <link href="<?php echo BASE_URL; ?>assets/nprogress/nprogress.css?v=1.0" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_URL; ?>assets/bootstrap-daterangepicker/daterangepicker.css?v=1.0" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_URL; ?>assets/icheck/green.css?v=1.0" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_URL; ?>assets/editor/prettify.css?v=1.0" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_URL; ?>assets/datatables.net-bs/css/dataTables.bootstrap.min.css?v=1.0" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_URL; ?>assets/datatables.net-buttons-bs/css/buttons.bootstrap.min.css?v=1.0" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_URL; ?>assets/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css?v=1.0" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_URL; ?>assets/datatables.net-responsive-bs/css/responsive.bootstrap.min.css?v=1.0" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_URL; ?>assets/datatables.net-scroller-bs/css/scroller.bootstrap.min.css?v=1.0" rel="stylesheet" type="text/css">
    
    <!--<link href="<?php echo BASE_URL; ?>/assets/front/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>-->
    <link href="<?php echo BASE_URL; ?>/assets/front/css/dataTables.responsive.css?v=1.0" rel="stylesheet" type="text/css">
       <!-- PNotify -->             
    <link href="<?php echo BASE_URL; ?>assets/pnotify/dist/pnotifiadmin.css?v=1.0" rel="stylesheet" type="text/css">
    <!-- Custom Theme Style -->
    <link href="<?php echo BASE_URL; ?>assets/build/css/custom.min.css?v=1.0" rel="stylesheet" type="text/css">
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-paw"></i> <span><?php echo APPNAME ?></span></a>
            </div>

            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                  <a href="javascript::void(0)"> <img src="<?php echo IMG_URL ?>original/default.png" height="60px" alt="..." class="img-circle profile_img"></a>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <a href="javascript::void(0)"> <h2><?php echo get_AdminName('first_name') .' '. get_AdminName('last_name'); ?></h2></a>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />