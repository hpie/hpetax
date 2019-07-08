<!--<script src="<?php echo ASSETS_FRONT; ?>datetime/js/bootstrap-datetimepicker.min.js"></script>-->
<script src="<?php echo ASSETS_FRONT; ?>datetime/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function () {
        $('.input-daterange').datepicker({
            todayBtn: "linked",
            clearBtn: true,            
            autoclose: true,
            todayHighlight: true,
            format: "dd/mm/yyyy"
        });                      
    });
</script>