<!--<script src="<?php echo ASSETS_FRONT; ?>datetime/js/bootstrap-datetimepicker.min.js"></script>-->
<script nonce='S51U26wMQz' type="text/javascript" src="<?php echo ASSETS_FRONT; ?>datetime/js/bootstrap-datepicker.min.js"></script>
<script nonce='S51U26wMQz' type="text/javascript">
    $(document).ready(function () {
        $('#validitydate').datepicker({
            todayBtn: "linked",
            clearBtn: true,
            autoclose: true,
            todayHighlight: true,
            format: "dd/mm/yyyy"
        });
    });
</script>