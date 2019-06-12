<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php echo $TITLE; ?></title>
        <!--<title>Welcome to hptax.gov.in</title>-->
        <link rel="stylesheet" href="<?php echo ASSETS_FRONT; ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo ASSETS_FRONT; ?>css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400i,700" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo ASSETS_FRONT; ?>css/font-awesome.css">
        <link rel="stylesheet" href="<?php echo ASSETS_FRONT; ?>css/main.css">
        <script src="<?php echo ASSETS_FRONT; ?>js/jquery.min.js"></script>
        <script src="<?php echo ASSETS_FRONT; ?>js/bootstrap.min.js"></script>       
    </head>
    <body>
        <div class="">
            <header>
                <div class="top_header">
                    <a href="<?php echo BASE_URL; ?>">
                        <img src="<?php echo ASSETS_FRONT; ?>img/header-logo.png" alt="logo" title="hptax.gov.in">
                    </a>
                </div>
                <div class="header-change">
                    <div class="wapper">
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <div class="input-group">
                                    <input ref="name" id="search" type="text" class="form-control" aria-label="search by name">
                                    <button type="button" class="btn btn-primary" title="search">
                                        Search
                                    </button>
                                </div>
                            </div>
                            <ul class="float-right ml-auto side-link">
                                <a href="#" title="Hindi">Hindi</a>
                                <a href="#" title="FAq"><i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                </a>
                                <a href="#" title="BookMark" onclick="alert('Press CTRL-D or CTRL-T (Opera) to bookmark');"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a>
                                <a href="#" title="Sitemap"><i class="fa fa-sitemap" aria-hidden="true"></i>
                                </a>
                                <a href="#" title="Print" onclick="window.print()"><i class="fa fa-print" aria-hidden="true"></i>
                                </a>
                                <a href="#" title="Rss"><i class="fa fa-rss" aria-hidden="true"></i>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class=" nav-main">
                    <div class="wapper">
                        <nav class="navbar-expand-lg navbar navbar  navbar-dark default-color">
                            <div class="navbar-header">
                                <div class="menu_btn_group">
                                    <button type="button" class="navbar-toggle collapsed" id="side-menu-btn"
                                            data-toggle="slide-collapse" data-target="#slide-navbar-collapse"
                                            aria-expanded="false">
                                        <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i>
                                    </button>

                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i>
                                        </span>
                                    </button>
                                </div>
                                <div class="nav-bar collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown"><a href="#" class="nav-link"
                                                                         data-toggle="dropdowm">Organization</a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item"><a href="introduction.html" class="nav-link">Introduction</a></li>
                                                <li class="nav-item"><a href="#" class="nav-link">Organisational Chart</a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link">Revenue Data</a></li>
                                                <li class="nav-item"><a href="#" class="nav-link">ETD Contacts</a></li>

                                                <li class="nav-item dropdown-submenu"><a href="#" class="nav-link"
                                                                                         data-toggle="dropdowm">Media</a>
                                                    <ul class="dropdown-menu">
                                                        <li class="nav-item"><a href="#" class="nav-link">Advertisement</a>
                                                        </li>
                                                        <li class="nav-item"><a href="#" class="nav-link">Tenders</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown"><a href="#" class="nav-link"
                                                                         data-toggle="dropdowm">GST</a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item dropdown-submenu"><a href="#" class="nav-link"
                                                                                         data-toggle="dropdowm">Act</a>
                                                    <ul class="dropdown-menu">
                                                        <li class="nav-item"><a href="#" class="nav-link">HPGST ACT</a></li>
                                                        <li class="nav-item"><a href="#" class="nav-link">IGST</a></li>
                                                        <li class="nav-item"><a href="#" class="nav-link">CGST</a></li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link">Rules</a></li>
                                                <li class="nav-item dropdown-submenu"><a href="#" class="nav-link"
                                                                                         data-toggle="dropdowm">GST eWay Bill</a>
                                                    <ul class="dropdown-menu">
                                                        <li class="nav-item"><a href="#" class="nav-link">Notifications</a>
                                                        </li>
                                                        <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
                                                        <li class="nav-item"><a href="#" class="nav-link">Website for e-Way
                                                                Bill <br>Generation</a></li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item dropdown-submenu"><a href="#" class="nav-link"
                                                                                         data-toggle="dropdowm">Notifications</a>
                                                    <ul class="dropdown-menu">
                                                        <li class="nav-item"><a href="#" class="nav-link">
                                                                HPGST</a></li>
                                                        <li class="nav-item"><a href="#" class="nav-link">HPGST(Rate)</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item dropdown-submenu"><a href="#" class="nav-link"
                                                                                         data-toggle="dropdowm">Circulars/Orders</a>
                                                    <ul class="dropdown-menu">
                                                        <li class="nav-item"><a href="#" class="nav-link">HPGST
                                                                Circilars</a></li>
                                                        <li class="nav-item"><a href="#" class="nav-link">HPGST Orders</a>
                                                        </li>
                                                        <li class="nav-item"><a href="#" class="nav-link">Removal of
                                                                Difficulty Orders</a></li>
                                                        <li class="nav-item"><a href="#" class="nav-link">Mechanism</a></li>
                                                        <li class="nav-item"><a href="#" class="nav-link">Checklist</a></li>
                                                        <li class="nav-item"><a href="#" class="nav-link">Authority &
                                                                Appellate</a></li>
                                                        <li class="nav-item"><a href="#" class="nav-link">Authority for
                                                                Advance<br> Ruling</a></li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item dropdown-submenu"><a href="#" class="nav-link"
                                                                                         data-toggle="dropdowm">Advance Ruling</a>
                                                    <ul class="dropdown-menu">
                                                        <li class="nav-item"><a href="#" class="nav-link"></a></li>
                                                        <li class="nav-item"><a href="#" class="nav-link"></a></li>
                                                        <li class="nav-item"><a href="#" class="nav-link"></a></li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item dropdown-submenu"><a href="#" class="nav-link"
                                                                                         data-toggle="dropdowm">Miscellaneous</a>
                                                    <ul class="dropdown-menu">
                                                        <li class="nav-item"><a href="#" class="nav-link">Advertisement</a>
                                                        </li>
                                                        <li class="nav-item"><a href="#" class="nav-link">Tenders</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item"><a href="#" class="nav-link">Excise</a></li>
                                        <li class="nav-item"><a href="#" class="nav-link">Vat & Allied Acts</a></li>
                                        <li class="nav-item"><a href="#" class="nav-link">Notifications & Circulars</a></li>
                                        <li class="nav-item"><a href="#" class="nav-link">RTI</a></li>
                                        <li class="nav-item"><a href="#" class="nav-link">Tax Rates</a></li>
                                        <li class="nav-item"><a href="#" class="nav-link">Help</a></li>
                                        <li class="nav-item"><a href="#" class="nav-link">Quick Links</a></li>
                                    </ul>
                                </div>
                            </div> 
                        </nav>
                    </div>
                </div>
            </header>
            <section class="main">
                <?php if ($TITLE == TITLE_FRONT_EPAYMENT_UNREGISTER) {
                    ?>
                    <div class="">
                        <?php
                    } else {
                        ?>
                        <div class="wapper">
                            <?php
                        }
                        ?>    
                        <div class="row mob-v-c-order">
                            <div class="col-md-3 col-sm-12 col-12 ">
                                <div class="right-side-area box-shadow">
                                    <h4> Sign In (Registered Users)</h4>
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="email">Login Id:</label>
                                            <input type="email" class="form-control" id="login_id">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Password:</label>
                                            <input type="password" class="form-control" id="pwd">
                                        </div>
                                        <div class="form-group form-check">
                                            <div class="g-recaptcha">Recaptcha</div>
                                        </div>
                                        <div class="forgot-pass">
                                            <a href="#">New User? SignUp</a> &nbsp;
                                            <a href="#">Forgot Password</a>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary  btn-block">Login</button>
                                        </div>
                                    </form>
                                    <div class="list collapse navbar-collapse" id="slide-navbar-collapse">
                                        <ul id="accordion" class="accordion">
                                            <li>
                                                <div class="link"><i class="fa fa-database"></i>e-Services<i
                                                        class="fa fa-chevron-down"></i></div>
                                                <ul class="submenu">
                                                    <li><a href="#">View / Verify e-Payment</a></li>
                                                    <li><a href="<?php echo FRONT_EPAYMENT_UNREGISTERE; ?>">e-Payment (Unregistered)</a></li>
                                                    <li><a href="#">e-Registration</a></li>
                                                    <li><a href="#">e-Payment</a></li>
                                                    <li><a href="#">e-Returns</a></li>
                                                    <li><a href="#">Removal of Excisable Intoxicants</a></li>
                                                    <li><a href="#">e-Declaration (VAT-XXVI-A)</a></li>
                                                    <li><a href="#">e-Declaration (VAT-XXVI)</a></li>
                                                    <li><a href="#">e-CST Forms Request</a></li>
                                                    <li><a href="#">e-CST Forms Cancellation</a></li>
                                                    <li><a href="#">Validate e-CST Forms</a></li>
                                                    <li><a href="#">Validate Signed PDF</a></li>
                                                    <li><a href="#">e-Track Status</a></li>
                                                    <li><a href="#">e-Communication</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="link"><i class="fa fa-code"></i> Dealer Listing<i
                                                        class="fa fa-chevron-down"></i></div>
                                                <ul class="submenu">
                                                    <li><a href="#">Dealer Search</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="link"><i class="fa fa-mobile"></i>Referral Websites<i
                                                        class="fa fa-chevron-down"></i></div>
                                                <ul class="submenu">
                                                    <li><a href="#">Govt. of Himachal Pradesh</a></li>
                                                    <li><a href="#">Finance Department</a></li>
                                                    <li><a href="#">Budget-India</a></li>
                                                    <li><a href="#">Budget of Himachal Pradesh</a></li>
                                                    <li><a href="#">VAT Related Sites</a></li>
                                                    <li><a href="#">TINXSYS</a></li>
                                                    <li><a href="#">GST Website</a></li>
                                                    <li><a href="#">e-Samadhan</a></li>
                                                    <li><a href="#">e-Salary</a></li>
                                                    <li><a href="#">PMIS</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="menu-overlay"></div>
                            </div>            