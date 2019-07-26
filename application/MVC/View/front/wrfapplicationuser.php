<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head><title>
        </title>
<!--        <script type="text/javascript">
            function ConfirmOn() {
            if (confirm("Are you sure to submit and make Payment.") == true)
                    return true;
            else
                    return false;
            }
            function ConfirmCan() {
            if (confirm("Are you sure to Cancel Challan.You will be Redirected back to Departmental Portal.") == true)
                    return true;
            else
                    return false;
            }
        </script>
        <script type="text/javascript">

            function preventMultipleSubmissions() {
            $('#ContentPlaceHolder1_btnSubmit').prop('disabled', true);
            $('#ContentPlaceHolder1_btnSubmit').val('Submitting.. Plz Wait..');
            }

            window.onbeforeunload = preventMultipleSubmissions;
            function open_and_move1(givenUrl) {
            var width = 350;
            var height = 200;
            var left = (screen.width - width) / 2;
            var top = (screen.height - height) / 2;
            var params = 'width=' + width + ', height=' + height;
            params += ', top=' + top + ', left=' + left;
            params += ', directories=no';
            params += ', location=no';
            params += ', menubar=no';
            params += ', resizable=Yes';
            params += ', scrollbars=Yes';
            params += ', status=no';
            params += ', toolbar=no';
            newwin = window.open(givenUrl, 'windowname5', params);
            if (window.focus) { newwin.focus() }
            return false;
            }
            function open_and_move2(givenUrl) {
            var width = 750;
            var height = 550;
            var left = (screen.width - width) / 2;
            var top = (screen.height - height) / 2;
            var params = 'width=' + width + ', height=' + height;
            params += ', top=' + top + ', left=' + left;
            params += ', directories=no';
            params += ', location=no';
            params += ', menubar=no';
            params += ', resizable=Yes';
            params += ', scrollbars=Yes';
            params += ', status=no';
            params += ', toolbar=no';
            newwin = window.open(givenUrl, 'windowname5', params);
            if (window.focus) { newwin.focus() }
            return false;
            }
        </script>-->
        <style>
            .blink{


                padding: 2px;	

                line-height: 20px;
            }
            .span{
                font-size: 25px;
                font-family: cursive;
                color: white;
                animation: blink 1s linear infinite;
            }
            @keyframes blink{
                0%{opacity: 0;}
                50%{opacity: .5;}
                100%{opacity: 1;}
            }


            .validerr {font-family:Cambria;font-size:12px;color:#ff4444; text-decoration:solid;}
            .lblTXT {font-family:Cambria;font-size:13px;color:#000; text-decoration:solid;}
            .lblTXT1 {font-family:Cambria;font-size:13px;color:#000; text-decoration:solid;}
            .aspNetDisabled {
                margin-left:10px;}
            .zui-table1 {

                border: solid 1px #DDEFEF;
                border-collapse: collapse;
                border-spacing: 0;
                background-color:#fff;
                width:100%;
                font-weight :normal;

                margin-top :0px
            }
            .zui-table1 th {
                background-color:#999;
                border: solid 1px #999;
                color: #fff;
                padding: 3px 5px;

                text-shadow: 1px 1px 1px #000;
            }
            .zui-table1 tbody td {
                border: solid 1px #DDEEEE;   
                padding:3px 5px;     
                color: #000;font-size:12px;
                font-family:Cambria;  

            }
            .zui-table2 {

                border: solid 1px #DDEFEF;
                border-collapse: collapse;
                border-spacing: 0;
                background-color:#fff;
                width:100%;
                font-weight :normal;
                padding:2px;

                font-size:13px;
                margin-top :0px
            }
            .zui-table2 th {
                background-color:#30AE8D;
                border: solid 1px #30AE8D;
                color: #fff;
                padding: 3px 5px;

                text-shadow: 1px 1px 1px #000;
            }
            .zui-table2 tbody td {
                border: solid 1px #DDEEEE;   
                padding:2px 5px;     
                color: #000;
                font-family:cambria ;  

            }
            .form-group {
                font-family:Cambria;margin-left:10px;margin-top:5px;font-size:13px;font-weight:300;color:#333;margin-bottom:8px !important;padding:0px;}
            .control-label {
                float:left;width:22%;font-weight:600;font-size:12px;font-family:Cambria;}
            .form-control {
                float:left;margin-left:0px;font-size:12px;}
            .lbl {
                width:25%}
            .control-label1 {
                float:left; font-family:Cambria;font-weight:600;font-size:15px;padding:20px 10px}
            .control-label2 {
                float:left; font-family:Cambria;font-weight:600;font-size:12px; }
            .form-control {
                display: block;
                width: 100%;
                height: 30px !important;
                padding: 3px 12px !important;
                font-size: 12px !important;
                line-height: 1.42857143;
                color: #555;
                background-color: #fff;
                background-image: none;
                border:1px solid #c9c9c9 !important;
                border-radius: 2px !important;
                -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
                box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
                -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
                -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
                transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
                margin-bottom:5px;
                font-family:Cambria;
            }
            blockquote.default2 {
                border-color: #D96A4D !important;
                padding-top: 5px !important;
                padding-bottom: 5px !important;
            }
            .star {color:red;font-size:12px;}
            .error { font-family:Cambria;margin-left:10px;margin-top:5px;font-size:12px;font-weight:300;
            }
            .card {
                position: relative;
                margin: 0.5rem 0 1rem 0;

                transition: box-shadow .25s;
                border-radius: 2px;
                box-shadow: 5px 5px 5px 5px #888888;
            }
            table caption {font-family:Cambria;margin-left:10px;margin-top:5px;font-size:13px;font-weight:bold;color:#D96A4D;}

        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" /><link rel="icon" href="../Masters/img/favicon.ico" type="image/png" />
        <!-- Include Bootstrap CSS -->
        <link href="<?php echo ASSETS_FRONT; ?>css/bootstrap.min.css" rel="stylesheet" />
        <!-- Include Font Awesome CSS -->
        <link rel="stylesheet" href="<?php echo ASSETS_FRONT; ?>css/font-awesome.css" />
        <link href="<?php echo ASSETS_FRONT; ?>css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_FRONT; ?>css/settings.css" media="screen" />
        <link href="<?php echo ASSETS_FRONT; ?>css/liMarquee.css" rel="stylesheet" type="text/css" />
        <style>

            .twpromo-top1 {
                background: #89c639;
                background: -moz-linear-gradient(-45deg, #89c639 0%, #33af84 50%, #24abb7 100%);
                background: -webkit-linear-gradient(-45deg, #89c639 0%,#33af84 50%,#24abb7 100%);
                background: linear-gradient(135deg, #89c639 0%,#33af84 50%,#24abb7 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#89c639', endColorstr='#24abb7',GradientType=1 );
                position: relative;
                padding: 12px;
                transition: all 0.2s;
                box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.3);
                position: fixed;
                top: 0;
                right: 0;
                left: 0;
                z-index: 999999;

            }
            .row {
                margin-right: 0px;
                margin-left: 0px;
            }
            .active {color:#fff;background:#CD3234;font-family:Cambria;font-size:14px;}
            .level1 {
                color:#fff;font-family:Cambria;font-size:14px; }
            .has-popup {
                border-right:0px solid #fff;margin:0px 0px}
            .nav > li > a {

                position: relative;
                display: block;
                padding: 0px 25px;
                border-right: 2px solid #fff;
                margin: 8px auto;

            }
            a.popout:hover {
                padding: 8px 25px;
                margin:0 auto;
                margin-left:-2px;
            }
            .dropdown-menu > li > a:hover {
                color: #fff;
                text-decoration: none;
                background-color: #3CB17C;

            }
            .dropdown-menu > li > a:hover > i.fa-check-square-o {
                color: #fff;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <form method="post" action="#" onsubmit="" id="form1" autocomplete="off">
<!--            <div class="aspNetHidden">
                <input type="hidden" name="__LASTFOCUS" id="__LASTFOCUS" value="" />
                <input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
                <input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
                <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="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" />
            </div>-->

<!--            <script type="text/javascript">
            //<![CDATA[
                var theForm = document.forms['form1'];
                if (!theForm) {
                theForm = document.form1;
                }
                function __doPostBack(eventTarget, eventArgument) {
                if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
                theForm.__EVENTTARGET.value = eventTarget;
                theForm.__EVENTARGUMENT.value = eventArgument;
                theForm.submit();
                }
                }
            //]]>
            </script>      
            <script type="text/javascript">
            //<![CDATA[
                function WebForm_OnSubmit() {
                if (typeof (ValidatorOnSubmit) == "function" && ValidatorOnSubmit() == false) return false;
                return true;
                }
            //]]>
            </script>-->

<!--            <div class="aspNetHidden">
                <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="D51B0AC1" />
                <input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="i91WZzrnvFmWKAoU13+gSDQBcEYTNJXfkKLa/60PgVwgyyNGY60pNVa6cnk/mnRwjiuGWaom/D/i6rN9OqJll/Dk+xqbVxFMoDH3sdcctWJQVYzHlPEusNTWpdJNwXzwuvP91+M91lxWGMNLITL5Dnb8qKPGbf/HpOgvCcEjjMHKJc57ugrCg9UZgiiFqZKjFL/Ves5J9Zr8+yA9z6/hEcxvwyJUVFGvo+rRJeUpolHY1cAjyonRZxTv0KUhEbYiBM9OHZGXawU/4ngqQSkV5eZEGBKXtioe+buBvIzR6Tqrvoqtd6e2uB2dgCr9GYVcMMeWIGQIexmYJGu6Um/rP3OGrFyZHPDQVMD9Luf3Vnw28G0J4bXOpJbLbJUcyeDsa7ifDKF2iqzWzdIzOfOyXofE+kA+JWb1YQiexQ9u3HmY5rsHnR0AQ7jyybBrwGWpRJZxrCKum1/C0aGowiJO1OdxjHnz0p39AfnG3YZMs3E5wca69nS4G46jD2dVw6mZMvdoIVHfuGy49glRoGK0YA==" />
            </div>-->
            <section id="topbar" class="twpromo-top1">
                <div class="container">
                    <div class="container-fluid">
                        <div class="row" >
                            <div class="wrapper row0">
                                <div id="Div1" class="hoc clear"> 



                                    <div class="fl_right">

                                        <ul class="nospace">

                                            <li><a href="default.aspx" id="home"><i class="fa fa-lg fa-home"></i></a></li>

                                            <li>Welcome, You are Login as : <span id="userId">Guest</span></li>

                                            <li><span class="logintxt">     
                                                </span> </li>  
                                            <li><span class="logintxt">      
                                                </span> </li>

                                            <li > </li>

                                        </ul> 
                                        <div class ="clearfix" ></div>                       
                                    </div>
                                    <div class="clear"></div>
                                </div>

                            </div>
                        </div>
                    </div></div>

                <div class="clearfix"></div>
            </section>
            <header class="header" style="margin-top:40px;background-color:#f6fff6;">
                <div class="container" >
                    <div class="container-fluid" >
                        <div class="header-top" >
                            <div class="col-md-1 col-sm-2 hidden-xs logo">
                                <a href="default.aspx" id="home1"><img src="<?php echo ASSETS_FRONT; ?>img/logo_red.png" alt=""  /></a>						
                            </div>
                            <div class="col-md-6 col-sm-8 col-xs-12 contact-info" style="margin:0;">						 							
                                <ul style="vertical-align:center-left;margin-top:10px;">
                                    <li style="color:#0A68EC;font-size:17px;font-weight:bold;font-family:cambria;">IFMIS - Government Receipts Accounting System </li>
                                    <li style="color:#CD3234;font-size:13px;font-weight:bold;font-family:cambria;">Treasuries, Accounts and Lotteries, Finance Department, GoHP</li>
                                </ul>					 					
                            </div><div class="col-md-1"></div>					 
                            <div class="col-md-5 logo">
                                <a href="Default.aspx"><img src="<?php echo ASSETS_FRONT; ?>img/green2.png" alt="" style="height:70px;float:right;" /> <img src="<?php echo ASSETS_FRONT; ?>img/logoech.png" alt="" style="height:70px;float:right;" /></a>						
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget1">
                    <div class="container">
                        <div class="row" style="margin: 0; padding: 0;">
                            <div class="navbar-left" style="margin: 0; padding: 0;">
                                <a href="#Menu1_SkipLink" style="position:absolute;left:-10000px;top:auto;width:1px;height:1px;overflow:hidden;">Skip Navigation Links</a><div class="nav" id="Menu1" style="margin: 0; padding: 0 0px 0 0px; color: #fff;">
                                    <ul class="level1 nav">
                                        <li><a class="level1" href="#" onclick="__doPostBack( & #39; ctl00$Menu1 & #39; , & #39; 000 & #39; )"><i class="fa fa-th" aria-hidden="true"></i> Pay Your Challan through Cyber Treasury, Govt of HP</a></li>
                                    </ul>
                                </div><a id="Menu1_SkipLink"></a>

                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div>
                <div class="slider-container" style="margin:0;padding:0;">
                    <div class="slider" >  
                        <section id="services"> 
                            <div class="container" >   

                                <div class="card" >
<!--                                    <script type="text/javascript">
                           //<![CDATA[
                                        Sys.WebForms.PageRequestManager._initialize('ctl00$ContentPlaceHolder1$ScriptManager1', 'form1', ['tctl00$ContentPlaceHolder1$UpdatePanel5', 'ContentPlaceHolder1_UpdatePanel5', 'tctl00$ContentPlaceHolder1$UpdatePanel2', 'ContentPlaceHolder1_UpdatePanel2'], [], [], 90, 'ctl00');
                           //]]>
                                    </script>-->

                                    <blockquote class="default1" style ="margin-top:10px;font-family:cambria;font-size:14px;background:#fcf2f2;text-align:center;padding-top:7px;padding-bottom:7px;">eChallan -: Challan Payment Gateway</blockquote>
                                    <hr style="background-color:#D96A4D;padding:1px;margin: 0px 0px 0px 0px;"/>
                                    <div class ="row" style="margin-top:10px;">
                                        <div class="col-md-1" ></div>
                                        <div class="col-md-10" >
                                            <div class="form-group">

                                                <span id="ContentPlaceHolder1_lbldepthead" style="color:#D96A4D;font-weight:bold;font-size:16px;text-align:center;text-transform:uppercase; text-decoration:underline  ">Excise and Taxation </span>
                                                <span style="color:#40B279;font-weight:bold;font-size:16px;text-align:center;text-transform:uppercase;"> : Online Payment Facility Through Cyber Treasury, GoHP </span> 
                                                <div class="blink"><span class="span" style="color:#EF6C22;font-weight:bold;font-size:11px;text-align:left;text-transform:uppercase;padding:5px; font-weight:bold;"> Note: If Your Bank account is debited , then donot make double payment within 24 hours.</span></div>


                                            </div>
                                            <div class="clearfix" ></div>

                                            <div class="form-group">
                                                <label class="control-label">DEPT : </label>
                                                <span id="ContentPlaceHolder1_lblDept" class="lblTXT1">114-Excise and Taxation</span>
                                            </div>
                                            <div class="clearfix" ></div>
                                            <div class="form-group">
                                                <label class="control-label">DDO : </label>
                                                <span id="ContentPlaceHolder1_lblDdo" class="lblTXT1">114-SML00-509</span> 
                                                <span id="ContentPlaceHolder1_lblDDODesc" class="lblTXT1">DEPUTY COMMISSIONER STATE TAXES AND EXCISE</span>
                                            </div>
                                            <div class="clearfix" ></div>
                                            <div class="form-group">
                                                <label class="control-label">DEPT REF. NO. : </label>
                                                <span id="ContentPlaceHolder1_lblRegNo" class="lblTXT1">11111111111</span> 
                                            </div>
                                            <div class="clearfix" ></div>
                                            <div class="form-group">
                                                <label class="control-label">TENDER BY : </label>
                                                <span id="ContentPlaceHolder1_lblTenderBy" class="lblTXT1">vasim</span>
                                            </div>
                                            <div class="clearfix" ></div>
                                            <div class="form-group">
                                                <label class="control-label">PERIOD FROM : </label>
                                                <span id="ContentPlaceHolder1_lblPeriodFrom" style="font-weight:bold;">25-07-2019</span>
                                                &nbsp;&nbsp;&nbsp;&nbsp;To&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span id="ContentPlaceHolder1_lblPeriodTo" style="font-weight:bold;">25-07-2019</span>
                                            </div>
                                            <div class="clearfix" ></div>

                                            <div class="form-group">
                                                <label class="control-label">SERVICES : </label>
                                                <div>
                                                    <table class="zui-table1" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GrdDynamic" style="width:75%;border-collapse:collapse;">
                                                        <tr align="center" valign="top" style="color:Black;background-color:BlanchedAlmond;font-weight:bold;">
                                                            <th align="left" scope="col">ID</th><th align="left" scope="col">Payment of (Service)</th><th align="left" scope="col">Head</th><th align="left" scope="col">Amount Rs.</th>
                                                        </tr><tr style="color:Black;background-color:White;">
                                                            <td>
                                                                <span id="ContentPlaceHolder1_GrdDynamic_lblId_0">1</span>
                                                            </td><td>
                                                                <span id="ContentPlaceHolder1_GrdDynamic_lblSService_0">RECEIPTS FROM ADDITIONAL GOODS TAX</span>
                                                            </td><td>
                                                                <span id="ContentPlaceHolder1_GrdDynamic_lblSHead_0">0042-00-104-02</span>
                                                            </td><td>
                                                                <span id="ContentPlaceHolder1_GrdDynamic_lblSAmount_0">3</span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="clearfix" ></div>

                                            <div class="form-group">
                                                <label class="control-label">AMOUNT (&#x20B9;) : </label>
                                                <span id="ContentPlaceHolder1_lblAmount" class="lblTXT1">3</span>
                                                <span id="ContentPlaceHolder1_lblAWords" class="lblTXT1">( Rupees  Three )</span>
                                            </div>
                                            <div class="clearfix" ></div>

                                            <div class="form-group">
                                                <label class="control-label">PAYMENT TYPE : </label>
                                                <table id="ContentPlaceHolder1_paymode" class="form-control" style="font-family:Trebuchet MS,Verdana,Sans-Serif,Arial;font-size:Small;width:200px;">
                                                    <tr>
                                                        <td><input id="ContentPlaceHolder1_paymode_0" type="radio" name="ctl00$ContentPlaceHolder1$paymode" value="B" checked="checked" /><label for="ContentPlaceHolder1_paymode_0">e-banking</label></td><td><span class="aspNetDisabled"><input id="ContentPlaceHolder1_paymode_1" type="radio" name="ctl00$ContentPlaceHolder1$paymode" value="M" disabled="disabled" onclick="javascript:setTimeout( & #39; __doPostBack(\ & #39; ctl00$ContentPlaceHolder1$paymode$1\ & #39; , \ & #39; \ & #39; ) & #39; , 0)" /><label for="ContentPlaceHolder1_paymode_1">Manually</label></span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="clearfix" ></div>

                                            <div class="form-group">
                                                <label class="control-label">SELECT BANK : </label>
                                                <select name="ctl00$ContentPlaceHolder1$ddBank" id="ContentPlaceHolder1_ddBank" class="form-control" style="width:220px;">
                                                    <option value="Select Bank">Select Bank</option>
                                                    <option selected="selected" value="CBI">CBI Central Bank of India-NetBanking</option>
                                                    <option value="IDB">IDBI - NetBanking</option>
                                                    <option value="PNB">PNB - NetBanking </option>
                                                    <option value="SBI">SBI - NetBanking </option>
                                                    <option value="MOP">SBI Aggregator - (Options NB/DB)</option>
                                                    <option value="UBI">UBI Union Bank of India  - NetBanking </option>
                                                    <option value="UCO">UCO Bank - NetBanking </option>

                                                </select>
                                                <span id="ContentPlaceHolder1_RequiredFieldValidator7" class="validerr" style="display:inline-block;font-size:X-Small;height:16px;width:2px;display:none;">Kindly Select Bank</span> 
                                            </div>
                                            <div class="clearfix" ></div>       

                                            <div class="form-group">
                                                <label class="control-label">ENTER CODE : </label>
                                                <div id="ContentPlaceHolder1_UpdatePanel5">
                                                    <img src="../Common/Captcha.aspx" id="ContentPlaceHolder1_Img1" style="float:left;" /> 
                                                    <input name="ctl00$ContentPlaceHolder1$searchtext" type="text" maxlength="4" id="ContentPlaceHolder1_searchtext" class="form-control" placeholder="ENTER CODE" style="width:95px;margin-left:15px;" />                             
                                                    <span id="ContentPlaceHolder1_RequiredFieldValidator11" style="font-size:X-Small;display:none;"></span>
                                                </div>
                                            </div>
                                            <div class="clearfix" ></div>
                                            <div class="form-group">
                                                <label class="control-label"> &nbsp; </label>
                                                <input type="submit" name="ctl00$ContentPlaceHolder1$btnSubmit" value="MAKE PAYMENT" onclick="javascript:return ConfirmOn(); WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions( & quot; ctl00$ContentPlaceHolder1$btnSubmit & quot; , & quot; & quot; , true, & quot; & quot; , & quot; & quot; , false, false))" id="ContentPlaceHolder1_btnSubmit" class="button" class="btn btn-primary" style="margin-left: 0px;padding:6px 8px 6px 8px;background:#D96A4D;color:#fff;border:0px;font-family:Cambria;font-size:13px;" />

                                                <input type="submit" name="ctl00$ContentPlaceHolder1$btnCancel" value="CANCEL" onclick="javascript:return ConfirmCan();" id="ContentPlaceHolder1_btnCancel" class="button" class="btn btn-primary" style="margin-left:15px;padding:6px 9px 6px 9px;color:#fff;background:#666;border:0px;font-family:Cambria;font-size:13px;" />
                                            </div>
                                            <div class="clearfix" ></div>
                                        </div>
                                    </div>                                 
                                    <div class ="clearfix"></div>
                                    <div class ="row" style="margin:10px;">
                                        <div class ="col-md-1"></div>
                                        <div class="col-md-10" >
                                            <div id="ContentPlaceHolder1_UpdatePanel2">
                                                <div>
                                                    <table class="zui-table2" cellspacing="0" cellpadding="4" font-color="#000000" id="ContentPlaceHolder1_gdvTranscations" style="background-color:White;border-color:#F9A449;border-width:1px;border-style:Dotted;font-family:Trebuchet MS;font-size:11px;border-collapse:collapse;">
                                                        <caption>
                                                            Latest 10 Transactions Done with Above Dept Ref No.
                                                        </caption><tr align="left" valign="top" style="color:White;background-color:#F9A449;font-weight:bold;">
                                                            <th align="left" scope="col">Sl.No.</th><th align="left" scope="col">HIMGRN</th><th align="left" scope="col">Dated</th><th align="left" scope="col">DDO</th><th align="left" scope="col">Tender By</th><th align="left" scope="col">Amount</th><th align="left" scope="col">Status</th><th class="center" scope="col">Verify with Bank</th><th class="center" scope="col">Detail</th>
                                                        </tr>
                                                        <tr style="color:Black;background-color:White;">
                                                            <td>
                                                                <span id="ContentPlaceHolder1_gdvTranscations_Label1_0">1</span>
                                                            </td><td>
                                                                <span id="ContentPlaceHolder1_gdvTranscations_lblHimgrn_0">A18L124571</span>
                                                            </td><td>
                                                                <span id="ContentPlaceHolder1_gdvTranscations_lblDated_0">31-12-2018</span>
                                                            </td><td>
                                                                <span id="ContentPlaceHolder1_gdvTranscations_lblDDO_0">DEPUTY COMMISSIONER STATE TAXES AND EXCISE</span>
                                                            </td><td>
                                                                <span id="ContentPlaceHolder1_gdvTranscations_lblTenderby_0">AMIT SINGH</span>
                                                            </td><td>
                                                                <span id="ContentPlaceHolder1_gdvTranscations_lblAmount_0">250</span>
                                                            </td><td>
                                                                <span id="ContentPlaceHolder1_gdvTranscations_lblStatus_0">Completed successfully.</span>

                                                            </td><td align="center">


                                                            </td><td align="center">
                                                                <a id="ContentPlaceHolder1_gdvTranscations_lnkView_0" onClick="javascript:open_and_move1( & #39; /echallan/challan_reports / SearchReportViewer.aspx?qs = kEd2Gdgw / eTXL0U7OiZFL0z8lsHrWqerKDKds / AB3grcRZZbxuE6rW8A2NspGxbH & #39; )" href="Javascript:void(0);"><i class="fa fa-file-pdf-o" title="detail report" style ="font-size:20px;color:#D96A4D" aria-hidden="true"></i></a>
                                                            </td>
                                                        </tr>                                                                                                                                                                       
                                                    </table>
                                                </div>


                                            </div> 
                                            <center>
                                                <div id="ContentPlaceHolder1_UpdateProgress1" style="display:none;">

                                                    <div id="Background"></div>
                                                    <div id="Progress">
                                                        <img src="../img/load5.gif" style="vertical-align:middle" alt = "loading" />   Processing, Please Wait ..  


                                                    </div>
                                            </center>

                                        </div>
                                    </div>
                                    <div class ="clearfix"></div>
                                </div> 



                            </div>
                        </section> 
                    </div> 
                </div>
            </div>

            <section class="footer">
                <div  style="color:#000;">
                    <hr class="widget2" style="padding:5px;margin:4px 0px 4px 0;">
                        <div class="container">

                            <div class="row" >
                                <p class="text-muted" style="color:#000;font-family:cambria,'Trebuchet MS', Helvetica, sans-serif;">
                                    <b>&nbsp;<span style="color:#B24714;font-family:cambria;">Disclaimer:</span></b> Content on this website is published and managed by <strong>Department
                                        of Treasuries, Accounts and Lotteries, Himachal Pradesh, Shimla.</strong> For any query regarding
                                    this website, please contact the<strong> <i class="fa fa-quote-left"></i>&nbsp;Web Information Manager:<b> Sh Deepak Bhardwaj </b>[ Additional Director ],<a class="links" style="color:#D96A4D;" href="mailto:addtre-hp@nic.in">&nbsp;addtre-hp@nic.in</a> &nbsp;<i class="fa fa-quote-right"></i>.</strong>&nbsp;Contents of this website are informative only and
                                    for benefit of the public. However, these do not confer any legal right or obligation.
                                    Website designed by National Informatics Center.
                                </p>				</div>
                        </div>
                </div>

            </section>


            <script type="text/javascript">
            //<![CDATA[
                var Page_Validators = new Array(document.getElementById("ContentPlaceHolder1_RequiredFieldValidator7"), document.getElementById("ContentPlaceHolder1_RequiredFieldValidator11"));
            //]]>
            </script>

            <script type="text/javascript">
            //<![CDATA[
                var ContentPlaceHolder1_RequiredFieldValidator7 = document.all ? document.all["ContentPlaceHolder1_RequiredFieldValidator7"] : document.getElementById("ContentPlaceHolder1_RequiredFieldValidator7");
                ContentPlaceHolder1_RequiredFieldValidator7.controltovalidate = "ContentPlaceHolder1_ddBank";
                ContentPlaceHolder1_RequiredFieldValidator7.errormessage = "Kindly Select Bank";
                ContentPlaceHolder1_RequiredFieldValidator7.display = "Dynamic";
                ContentPlaceHolder1_RequiredFieldValidator7.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
                ContentPlaceHolder1_RequiredFieldValidator7.initialvalue = "Select Bank";
                var ContentPlaceHolder1_RequiredFieldValidator11 = document.all ? document.all["ContentPlaceHolder1_RequiredFieldValidator11"] : document.getElementById("ContentPlaceHolder1_RequiredFieldValidator11");
                ContentPlaceHolder1_RequiredFieldValidator11.controltovalidate = "ContentPlaceHolder1_searchtext";
                ContentPlaceHolder1_RequiredFieldValidator11.focusOnError = "t";
                ContentPlaceHolder1_RequiredFieldValidator11.errormessage = "Enter Security Code";
                ContentPlaceHolder1_RequiredFieldValidator11.display = "None";
                ContentPlaceHolder1_RequiredFieldValidator11.validationGroup = "ValidationRefNos";
                ContentPlaceHolder1_RequiredFieldValidator11.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
                ContentPlaceHolder1_RequiredFieldValidator11.initialvalue = "";
            //]]>
            </script>


            <script type="text/javascript">
            //<![CDATA[
                javascript:alert('Wrong Verification Code'); //]]>
            </script>
            <script type='text/javascript'>new Sys.WebForms.Menu({ element: 'Menu1', disappearAfter: 500, orientation: 'horizontal', tabIndex: 0, disabled: false });</script>
            <script type="text/javascript">
            //<![CDATA[

                var Page_ValidationActive = false;
                if (typeof (ValidatorOnLoad) == "function") {
                ValidatorOnLoad();
                }

                function ValidatorOnSubmit() {
                if (Page_ValidationActive) {
                return ValidatorCommonOnSubmit();
                }
                else {
                return true;
                }
                }
                WebForm_AutoFocus('ContentPlaceHolder1_searchtext');
                document.getElementById('ContentPlaceHolder1_RequiredFieldValidator7').dispose = function() {
                Array.remove(Page_Validators, document.getElementById('ContentPlaceHolder1_RequiredFieldValidator7'));
                }

                document.getElementById('ContentPlaceHolder1_RequiredFieldValidator11').dispose = function() {
                Array.remove(Page_Validators, document.getElementById('ContentPlaceHolder1_RequiredFieldValidator11'));
                }
                Sys.Application.add_init(function() {
                $create(Sys.UI._UpdateProgress, {"associatedUpdatePanelId":"ContentPlaceHolder1_UpdatePanel2", "displayAfter":1, "dynamicLayout":true}, null, null, $get("ContentPlaceHolder1_UpdateProgress1"));
                });
            //]]>
            </script>
        </form>
    </body>
</html>
