<script>
    $(document).ready(function () {



        $('#taxType').on('change', function () {
            var urlReq = '<?php echo FRONT_COMMODITY_LIST_LINK ?>';
            var id = this.value;
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {id: id},
                url: urlReq,
                success: function (_returnData) {
                    if (_returnData.result == "success") {
                        $('#commodity option').remove();
                        $('#commodity').append('<option value=0>Select</option>');
                        $.each(_returnData.commodity, function (key, value) {
                            $('#commodity').append($("<option></option>").attr("value", value['tax_commodity_id']).text(value['tax_commodity_name']));
                        });
                        $('.removetr').remove();
                        $('.removetr2').remove();
                        $("#vehicleno").val('');
                        $('#tabledata').append($(_returnData.html));
                    }
                }
            });
        });
        $('#commodity').on('change', function () {
            var urlReq = '<?php echo FRONT_COMMODITY_FIELD_LINK ?>';
            var id = this.value;
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {id: id},
                url: urlReq,
                success: function (_returnData) {
                    if (_returnData.result == "success") {
                        $('.removetr2').remove();
                        $("#commoditytr").after($(_returnData.html));
                        $('#totaltax').val(_returnData.commodity['tax_commodity_rate']);
                        $('#hiderate').val(_returnData.commodity['tax_commodity_rate']);
                        $("#vehicleno").val('');
                    }
                }
            });
        });
        $("table").delegate("#rateunit", "keyup", function () {
            var taxtypeid = $('#taxType').children("option:selected").val();
            var price = $('#totaltax').val();
            var rateunithide = $('#hiderate').val();
            var rateunit = this.value;
            if (taxtypeid == "AG") {
                var total = (rateunithide * rateunit).toFixed(2)
                $('#totaltax').val(total);
            }
            if (taxtypeid == "CGCR") {
                var total = (rateunithide * rateunit).toFixed(2)
                $('#totaltax').val(total);
            }
            if (rateunit == 0 || rateunit === null) {
                $('#totaltax').val(rateunithide);
            }
        });

        $("table").delegate("#noofpassenger", "keyup", function () {
            var taxtypeid = $('#taxType').children("option:selected").val();
            var price = $('#totaltax').val();
            var distance = $('#distance').val();
            var rateunithide = $('#hiderate').val();
            var passenger = this.value;
            if (distance == 0) {
                distance = 1;
            }
            if (passenger == 0) {
                passenger = 1;
            }
            if (taxtypeid == "PTCG") {
                var total = (passenger * distance * rateunithide).toFixed(2)
                $('#totaltax').val(total);
            }
        });
        $("table").delegate("#distance", "keyup", function () {
            var taxtypeid = $('#taxType').children("option:selected").val();
            var price = $('#totaltax').val();
            var passenger = $('#noofpassenger').val();
            var rateunithide = $('#hiderate').val();
            var distance = this.value;
            if (distance == 0) {
                distance = 1;
            }
            if (passenger == 0) {
                passenger = 1;
            }
            if (taxtypeid == "PTCG") {
                var total = (passenger * distance * rateunithide).toFixed(2)
                $('#totaltax').val(total);
            }
        });

        $('#vehicleno').on('focusout', function () {
            var number = $(this).val();
            var pattern = new RegExp("(([A-Za-z]){2,3}(|-| |.)(?:[0-9]){1,2}(|-| |.)(?:[A-Za-z]){2}(|-| |.)([0-9]){1,4})|(([A-Za-z]){2,3}(|-| |.)([0-9]){1,4})");
            if (pattern.test(number)) {
                return true;
            } else {
                alert('Please enter valid vehicle no');
                $(this).val('');
            }
        });

        $("#add").click(function () {
            var taxtypeid = $('#taxType').children("option:selected").val();
            var commodityid = $('#commodity').children("option:selected").val();
            var weight = 0;
            var mesuare = '';
            var sourcelocation = '';
            var destinationlocation = '';
            var distance = 0;
            var vehicleno = '';
            var totaltax = 0;
            var noofpassenger = 0;
            if ($("#rateunit").length) {
                weight = $("#rateunit").val();
            }
            if ($("#mesuare").length) {
                mesuare = $("#mesuare").val();
            }
            if ($("#sourcelocation").length) {
                sourcelocation = $("#sourcelocation").val();
            }
            if ($("#destinationlocation").length) {
                destinationlocation = $("#destinationlocation").val();
            }
            if ($("#vehicleno").length) {
                vehicleno = $("#vehicleno").val();
            }
            if ($("#totaltax").length) {
                totaltax = $("#totaltax").val();
            }
            if ($("#noofpassenger").length) {
                noofpassenger = $("#noofpassenger").val();
            }
            
             var urlReq = '<?php echo FRONT_ADD_TAX_ITEM_QUE_LINK ?>';
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {taxtypeid: taxtypeid,commodityid:commodityid,weight:weight,mesuare:mesuare,sourcelocation:sourcelocation,destinationlocation:destinationlocation,distance:distance,vehicleno:vehicleno,totaltax:totaltax,noofpassenger:noofpassenger},
                url: urlReq,
                success: function (_returnData) {
                    if (_returnData.result == "success") {
                        
                    }
                }
            });            
        });
    });
</script>