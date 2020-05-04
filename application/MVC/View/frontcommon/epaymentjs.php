<script nonce='S51U26wMQz' type="text/javascript">
    $(document).ready(function () {        
        $('#confirm').on('click', function () {
            if (confirm('Are you sure you want to confirm?')) {
            var urlReq = '<?php echo FRONT_CHECK_EXIST_TAX_ITEM_QUE_LINK; ?>';
            $.ajax({
                type: "POST",
                dataType: "json",
                url: urlReq,
                success: function (_returnData) {
                    if (_returnData.result == "success") {
                        window.location = "<?php echo FRONT_EPAYMENT_TREASURY; ?>";
                    } else {
                        alert('Please complete the add tax process');
                    }
                }
            });
            }
        });
        $('#taxType').on('change', function () {
        
         if (confirm('Are you sure you want to select ' + $("#taxType option:selected").text() + '?')) {
            $('#locationtr').removeClass("location");
            $('#mapdisplay').removeClass("location");
            var urlReq = '<?php echo FRONT_COMMODITY_LIST_LINK ?>';
            var id = this.value;
            if (id === "PGT" || id === "PTCG") {
                $('#locationtr').addClass("location");
                $('#mapdisplay').addClass("location");
            }
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
//                        $("#vehicleno").val('');
                        $('#tabledata').append($(_returnData.html));
                        if (id === "PTCG") {
                            $(".quantity").text("No of Passanger");
                        }
                        
                        $("#sourcelocation").val('');
                        $("#destinationlocation").val('');                         
                        initMap();
                    }
                }
            });
            $('#taxType').attr('disabled', true);
        }
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
                        
                        if(_returnData.commodity['tax_commodity_cess']>0){
                            $('#totaltax').val(_returnData.commodity['totaltax']);
                        }
                        else{
                            $('#totaltax').val(_returnData.commodity['tax_commodity_rate']);
                        }
                        $('#hiderate').val(_returnData.commodity['tax_commodity_rate']);
                        $('#tax_commodity_rate_unit').val(_returnData.commodity['tax_commodity_rate_unit']);                        
                        $("#sourcelocation").val('');
                        $("#destinationlocation").val(''); 
                        initMap();
//                        $("#vehicleno").val('');
                    }
                }
            });
        });
        
//        $('#commodity').on('change', function () {
        if ($("#quintityBY_COUNT").length) {           
//        if ($("table").delegate("#quintityBY_COUNT").length) {            
            $("table").delegate("#quintityBY_COUNT", "keyup", function () {              
                var taxtypeid = $('#taxType').children("option:selected").val();
                var price = $('#totaltax').val();
                var ratehideDb = $('#hiderate').val();
                var unitValueDb = $('#tax_commodity_rate_unit').val();                
                var singleValue=ratehideDb/unitValueDb;
                var weight = this.value;                    
                var total = (singleValue * weight).toFixed(2)
                $('#totaltax').val(total);               
                if (weight == 0 || weight === null) {
                    alert('Please enter valid value');                  
                    $('#totaltax').val(ratehideDb);
                }
            });
        }           
        $("table").delegate("#rateunit", "keyup", function () { 
            
            if (this.value.match(/[^0-9]/g)) {
                this.value = '';
            }
            
            
            if (!($("#quintityBY_COUNT").length)) {                                        
                var taxtypeid = $('#taxType').children("option:selected").val();
                var price = $('#totaltax').val();
                var ratehideDb = $('#hiderate').val();
                var unitValueDb = $('#tax_commodity_rate_unit').val();                  
                var singleValue=ratehideDb/unitValueDb;               
                var weight = this.value;                
                var total = (singleValue * weight).toFixed(2);
                $('#totaltax').val(total);               
                if (weight == 0 || weight === null) {
                    alert('Please enter valid value');                    
                    $('#totaltax').val(ratehideDb);
                } 
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
            
            if (this.value.match(/[^a-zA-Z0-9]/g)) {
                this.value = '';
            }
            
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

        $('#vehicleno').on('keyup', function (e) { 
            
            if (this.value.match(/[^a-zA-Z0-9]/g)) {
                this.value = '';
            }
            
            
//            var str=$(this).val();
//            for (var i = 0; i < str.length; i++) {
//                var charCode=str.charAt(i).charCodeAt(0);                  
//                if (charCode === 60 || charCode === 96 || charCode === 126 || charCode === 33 || charCode === 35 || charCode === 36 || charCode === 37 || charCode === 94 || charCode === 96 || charCode === 38 || charCode === 42 || charCode == 40 || charCode === 41 || charCode === 61 || charCode === 43 || charCode === 123 || charCode === 125 || charCode === 91 || charCode === 93 || charCode === 124 || charCode === 92 || charCode === 58 || charCode === 59 || charCode === 34 || charCode === 39 || charCode === 44 || charCode === 63 || charCode === 47 || charCode === 62)
//                {                
//                    alert('Special Characters are not allowed. Only use A-Z, a-z and 0-9');
//                    $(this).val('');
//                    return false;
//                }                                       
//            }               
//            return true;
//            
//            
//            
//            
//            var number = $(this).val();
//            var pattern = new RegExp("(([A-Za-z]){2,3}(|-| |.)(?:[0-9]){1,2}(|-| |.)(?:[A-Za-z]){2}(|-| |.)([0-9]){1,4})|(([A-Za-z]){2,3}(|-| |.)([0-9]){1,4})");
//            if (pattern.test(number)) {
//                return true;
//            } else {
//                alert('Please enter valid vehicle no');
//                $(this).val('');
//            }
        });
        
        $("#add").click(function () {
            var taxtypeid = $('#taxType').children("option:selected").val();
            var commodityid = $('#commodity').children("option:selected").val();
            var alertstr = [];
            var returnval = 0;
            var cess=0;
            var weight = 0;
            var quintityBY_COUNT = 0;
            var mesuare = '';
            var sourcelocation = '';
            var destinationlocation = '';
            var distance = 0;
            var vehicleno = '';
            var totaltax = 0;
            var noofpassenger = 0;
            

            if (taxtypeid != 0) {
                if (commodityid == 0) {
                    alertstr.push("Please select Commodity/Description.");
                    returnval = 1;
                } else {
                    if ($("#rateunit").length) {
                        weight = $("#rateunit").val();
                        if (weight === '' || weight === 0) {
                            alertstr.push("Please enter weight.");
                            returnval = 1;
                        }
                    }
                }                                
                
                if ($("#vehicleno").length) {
                    vehicleno = $("#vehicleno").val();
                    if (vehicleno === '' || vehicleno === 0) {
                        alertstr.push("Please enter Vehicle Number.");
                        returnval = 1;
                    }
                }                
                if ($("#quintityBY_COUNT").length) {
                    quintityBY_COUNT = $("#quintityBY_COUNT").val();
                    if (quintityBY_COUNT === '' || quintityBY_COUNT === 0) {
                        alertstr.push("Please enter quintity.");
                        returnval = 1;
                    }
                }
                
                if ($("#mesuare").length) {
                    mesuare = $("#mesuare").val();
                }
                if (taxtypeid === "AG" || taxtypeid === "CGCR") {
                if ($("#sourcelocation").length) {
                    sourcelocation = $("#sourcelocation").val();
                    if (sourcelocation === '') {
                        alertstr.push("Please enter Source Location.");
                        returnval = 1;
                    }
                }
               
                if ($("#destinationlocation").length) {
                        destinationlocation = $("#destinationlocation").val();
                        if (destinationlocation === '') {
                            alertstr.push("Please enter Destination Location.");
                            returnval = 1;
                        }
                    }
                }
                if ($("#distance").length) {
                    distance = $("#distance").val();
                    if (distance === '' || distance === 0) {
                        alertstr.push("Please enter Distance.");
                        returnval = 1;
                    }
                }
                if ($("#noofpassenger").length) {
                    noofpassenger = $("#noofpassenger").val();
                    if (noofpassenger === '' || noofpassenger === 0) {
                        alertstr.push("Please enter Number of Passenger.");
                        returnval = 1;
                    }
                }
                if ($("#cessValue").length) {
                    cess = $("#cessValue").val();                    
                }                
                if ($("#totaltax").length) {
                    totaltax = $("#totaltax").val();
                }                                                
                if (returnval == 1) {
                    var text = "";
                    var i;
                    for (i = 0; i < alertstr.length; i++) {
                        text += (i + 1) + "." + alertstr[i] + "\n";
                    }
                    alert(text);
                    return false;
                }
            } else {
                alert('1.Please select Tax Type.\n2.Please select Commodity/Description. \n3.Please enter Vehicle Number.');
                return false;
            }
            var urlReq = '<?php echo FRONT_ADD_TAX_ITEM_QUE_LINK ?>';
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {taxtypeid: taxtypeid, commodityid: commodityid, quintityBY_COUNT:quintityBY_COUNT, weight: weight, mesuare: mesuare, sourcelocation: sourcelocation, destinationlocation: destinationlocation, distance: distance, vehicleno: vehicleno, totaltax: totaltax,cess:cess, noofpassenger: noofpassenger},
                url: urlReq,
                success: function (_returnData) {
                    if (_returnData.result == "success") {
                        $('#tbody').append(_returnData.html);
                        $(".clearalltext").val("");
                        $("#commodity").val('0');
                        $("#total").val(_returnData.total);
                        $('#vehicleno').attr('readonly', true);
                        $("#sourcelocation").val('');
                        $("#destinationlocation").val('');   
                        initMap();
                    } else {
                        alert('You allready add this tax commodity');
                    }
                }
            });
        });

        $("table").delegate(".modifytd", "click", function () {
            var id = $(this).attr('id').replace("md", "");
            var urlReq = '<?php echo FRONT_GET_MODIFY_TAX_ITEM_QUE_DETAILS_LINK ?>';
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {id: id},
                url: urlReq,
                success: function (_returnData) {
                    if (_returnData.result == "success") {                        
                        $("#taxType").val(_returnData.taxtype_id);
                        $('#commodity option').remove();
                        $('#commodity').append('<option value=0>Select</option>');
                        $.each(_returnData.commodity, function (key, value) {
                            $('#commodity').append($("<option></option>").attr("value", value['tax_commodity_id']).text(value['tax_commodity_name']));
                        });
                        $('.removetr').remove();
                        $('.removetr2').remove();
                        $('#commodity option[value=' + _returnData.commodity_id + ']').attr('selected', 'selected');
                        $("#commoditytr").after($(_returnData.commodityhtml));


                        $('#tabledata').append($(_returnData.html));
                        if (_returnData.taxtype_id === "PTCG") {
                            $(".quantity").text("No of Passanger");
                        }                        
                        if (_returnData.taxtype_id === "PGT" || _returnData.taxtype_id === "PTCG") {
                            $('#locationtr').addClass("location");
                            $('#mapdisplay').addClass("location");
                        }
                        if (_returnData.taxtype_id === "AG" || _returnData.taxtype_id === "CGCR") {
                            $('#locationtr').removeClass("location");
                            $('#mapdisplay').removeClass("location");
                            $("#sourcelocation").val(_returnData.data['tax_item_source_location']);
                            $("#destinationlocation").val(_returnData.data['tax_item_destination_location']);
                        }
                        $("#hiderate").val(_returnData.hiderate);
                        $("#tax_commodity_rate_unit").val(_returnData.tax_commodity_rate_unit);
                        $("#modifyIdInput").val(id);
                        $(".deletetd").text("Delete");  
                        $("#del" + id).text("");                          
//                        $("#md" + id).removeClass("modifytd");                          
                        $(".modifytd").text("Modify");  
                        $("#md" + id).text("Modifying");
                        $("#addbuttondiv").css("display","none");
                        $("#modifybuttondiv").css("display","block");
                        
//                        $("#taxType").val(_returnData.res['tax_type_id']);
                    }
                }
            });
            return false;
        });
        
        
        
         $("#clearModify").click(function () {
//        $("div").delegate("#clearModify", "click", function () {
//            alert('hi');
            $(".modifytd").text("Modify");
            $(".deletetd").text("Delete");
            $("#addbuttondiv").css("display","block");
            $("#modifybuttondiv").css("display","none");
            $("#modifyIdInput").val("");
            $("#taxType").change();            
        });
        
        
        
        
        
        $("#clearAdd").click(function () { 
            $("#taxType").change();            
        });
        $("#update").click(function () {            
            var taxtypeid = $('#taxType').children("option:selected").val();
            var commodityid = $('#commodity').children("option:selected").val();
            var tax_item_quee_id = $('#modifyIdInput').val();          
            var alertstr = [];
            var returnval = 0;
            var cess=0;
            var weight = 0;
            var quintityBY_COUNT=0;
            var mesuare = '';
            var sourcelocation = '';
            var destinationlocation = '';
            var distance = 0;
            var vehicleno = '';
            var totaltax = 0;
            var noofpassenger = 0;

            if (taxtypeid != 0) {
                if (commodityid == 0) {
                    alertstr.push("Please select Commodity/Description.");
                    returnval = 1;
                } else {
                    if ($("#rateunit").length) {
                        weight = $("#rateunit").val();
                        if (weight === '' || weight === 0) {
                            alertstr.push("Please enter weight.");
                            returnval = 1;
                        }
                    }
                }
                if ($("#vehicleno").length) {
                    vehicleno = $("#vehicleno").val();
                    if (vehicleno === '' || vehicleno === 0) {
                        alertstr.push("Please enter Vehicle Number.");
                        returnval = 1;
                    }
                }
                
                if ($("#quintityBY_COUNT").length) {
                    quintityBY_COUNT = $("#quintityBY_COUNT").val();
                    if (quintityBY_COUNT === '' || quintityBY_COUNT === 0) {
                        alertstr.push("Please enter quintity.");
                        returnval = 1;
                    }
                }
                
                
                if ($("#mesuare").length) {
                    mesuare = $("#mesuare").val();
                }
                if (taxtypeid === "AG" || taxtypeid === "CGCR") {
                if ($("#sourcelocation").length) {
                    sourcelocation = $("#sourcelocation").val();
                    if (sourcelocation === '') {
                        alertstr.push("Please enter Source Location.");
                        returnval = 1;
                    }
                }
               
                    if ($("#destinationlocation").length) {
                        destinationlocation = $("#destinationlocation").val();
                        if (destinationlocation === '') {
                            alertstr.push("Please enter Destination Location.");
                            returnval = 1;
                        }
                    }
                }
                if ($("#distance").length) {
                    distance = $("#distance").val();
                    if (distance === '' || distance === 0) {
                        alertstr.push("Please enter Distance.");
                        returnval = 1;
                    }
                }
                if ($("#noofpassenger").length) {
                    noofpassenger = $("#noofpassenger").val();
                    if (noofpassenger === '' || noofpassenger === 0) {
                        alertstr.push("Please enter Number of Passenger.");
                        returnval = 1;
                    }
                }
                if ($("#cessValue").length) {
                    cess = $("#cessValue").val();                    
                }                
                if ($("#totaltax").length) {
                    totaltax = $("#totaltax").val();
                }
                if (returnval == 1) {
                    var text = "";
                    var i;
                    for (i = 0; i < alertstr.length; i++) {
                        text += (i + 1) + "." + alertstr[i] + "\n";
                    }
                    alert(text);
                    return false;
                }
            } else {
                alert('1.Please select Tax Type.\n2.Please select Commodity/Description. \n3.Please enter Vehicle Number.');
                return false;
            }
            var urlReq = '<?php echo FRONT_UPDATE_TAX_ITEM_QUE_LINK ?>';
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {tax_item_quee_id:tax_item_quee_id,taxtypeid: taxtypeid, quintityBY_COUNT:quintityBY_COUNT, commodityid: commodityid, weight: weight, mesuare: mesuare, sourcelocation: sourcelocation, destinationlocation: destinationlocation, distance: distance, vehicleno: vehicleno, totaltax: totaltax,cess:cess,  noofpassenger: noofpassenger},
                url: urlReq,
                success: function (_returnData) {
                    if (_returnData.result == "success") {
                        $('#datatr'+tax_item_quee_id).empty();
                        $('#datatr'+tax_item_quee_id).append(_returnData.html);
                        $(".clearalltext").val("");
                        $("#commodity").val('0');
                        $("#total").val(_returnData.total);
                        $('#vehicleno').attr('readonly', true);                                                
                        $(".modifytd").text("Modify");
                        $(".deletetd").text("Delete");
                        $("#addbuttondiv").css("display","block");
                        $("#modifybuttondiv").css("display","none");
                        $("#modifyIdInput").val("");
                        $("#taxType").change();                         
                        $("#sourcelocation").val('');
                        $("#destinationlocation").val(''); 
                        initMap();
                    } else {
                        alert('You allready add this tax commodity');
                    }
                }
            });
        });
        $("table").delegate(".deletetd", "click", function () {
            if (confirm("Are you sure you want delete ?")) {
                var id = $(this).attr('id').replace("del", "");               
                var urlReq = '<?php echo FRONT_DELETE_TAX_ITEM_QUE_LINK ?>';
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    data: {id: id},
                    url: urlReq,
                    success: function (_returnData) {
                        if (_returnData.result == "success") {
                            $("#del" + id).text("deleted");
                            $("#md" + id).text("");
                            $("#del" + id).removeClass("deletetd");
                            $("#md" + id).removeClass("modifytd");
                            $("#total").val(_returnData.total);
                        }
                    }
                });
            }
            return false;
        });
    });

// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            mapTypeControl: false,
            center: {lat: 31.1048145, lng: 77.1734033},
            zoom: 13
        });
        new AutocompleteDirectionsHandler(map);                 
    }

    /**
     * @constructor
     */
    function AutocompleteDirectionsHandler(map) {
        this.map = map;
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.travelMode = 'DRIVING';
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originInput = document.getElementById('sourcelocation');
        var destinationInput = document.getElementById('destinationlocation');
//        var modeSelector = document.getElementById('mode-selector');

        var originAutocomplete = new google.maps.places.Autocomplete(originInput);
// Specify just the place data fields that you need.
        originAutocomplete.setFields(['place_id']);

        var destinationAutocomplete = new google.maps.places.Autocomplete(destinationInput);
// Specify just the place data fields that you need.
        destinationAutocomplete.setFields(['place_id']);
//        this.setupClickListener('changemode-transit', 'TRANSIT');
//        this.setupClickListener('changemode-driving', 'DRIVING');

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

//        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
//        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
//        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
    }
    AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function (autocomplete, mode) {
        var me = this;
        autocomplete.bindTo('bounds', this.map);
        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();

            if (!place.place_id) {
                window.alert('Please select an option from the dropdown list.');
                return;
            }
            if (mode === 'ORIG') {
                me.originPlaceId = place.place_id;
            } else {
                me.destinationPlaceId = place.place_id;
            }
            me.route();
        });
    };

    AutocompleteDirectionsHandler.prototype.route = function () {
        if (!this.originPlaceId || !this.destinationPlaceId) {
            return;
        }
        var me = this;

        this.directionsService.route(
                {
                    origin: {'placeId': this.originPlaceId},
                    destination: {'placeId': this.destinationPlaceId},
                    travelMode: this.travelMode
                },
                function (response, status) {
                    if (status === 'OK') {
                        var str = response.routes[0].legs[0].distance['text'];
                        var array = str.split(" ");
                        $("#distance").val(array[0]);
//                        console.log(response.routes[0].legs[0].distance['text']);
                        me.directionsDisplay.setDirections(response);
                    } else {
                        window.alert('Directions request failed due to ' + status);
                    }
                });
    };
       
</script>
<script nonce='S51U26wMQz' type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOo8VS-DubgppGE3b94PsvweQyYqzrKGI&libraries=places&callback=initMap" async defer></script>