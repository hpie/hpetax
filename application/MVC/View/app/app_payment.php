<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php echo $TITLE; ?></title>
    </head>
<body>
<form action="https://himkosh.hp.nic.in/echallan/WebPages/wrfApplicationRequest.aspx" id="aspnetForm" method="POST">
    <input type="hidden" name="encdata" value="<?php if(isset($encryptedString)){echo $encryptedString;}else{ echo '';} ?>"/>
    <input type="hidden" name="merchant_code" value="HIMKOSH114"/>
<input type="Submit" name="btn_submit" value="Make Payment"/>
</form>
<script type="text/javascript">
   document.getElementById("aspnetForm").submit();
</script>
</body>
</html>