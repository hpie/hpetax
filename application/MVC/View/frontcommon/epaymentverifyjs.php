<!--<script src="<?php echo ASSETS_FRONT; ?>datetime/js/bootstrap-datetimepicker.min.js"></script>-->
<script nonce='S51U26wMQz' src="<?php echo ASSETS_FRONT; ?>datetime/js/bootstrap-datepicker.min.js"></script>
<script nonce='S51U26wMQz'>
    $(document).ready(function () {
        $('.input-daterange').datepicker({
            todayBtn: "linked",
            clearBtn: true,
            autoclose: true,
            todayHighlight: true,
            format: "dd/mm/yyyy"
        });
        $('#invoice_date').datepicker({
            todayBtn: "linked",
            clearBtn: true,
            autoclose: true,
            todayHighlight: true,
            format: "yyyy-mm-dd"
        });
    });
</script>