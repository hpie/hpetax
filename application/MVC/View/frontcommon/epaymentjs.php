<script>
    $(document).ready(function () {
        $('#taxType').on('change', function () {
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
                        $("#vehicleno").val('');
                        $('#tabledata').append($(_returnData.html));
                        if (id === "PTCG") {
                            $(".quantity").text("No of Passanger");
                        }
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
//                        $("#vehicleno").val('');
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
            var alertstr = [];
            var returnval = 0;
            var weight = 0;
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
                if ($("#mesuare").length) {
                    mesuare = $("#mesuare").val();
                }
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
                data: {taxtypeid: taxtypeid, commodityid: commodityid, weight: weight, mesuare: mesuare, sourcelocation: sourcelocation, destinationlocation: destinationlocation, distance: distance, vehicleno: vehicleno, totaltax: totaltax, noofpassenger: noofpassenger},
                url: urlReq,
                success: function (_returnData) {
                    if (_returnData.result == "success") {
                        $('#tbody').append(_returnData.html);
                        $(".clearalltext").val("");
                        $("#commodity").val('0');
                        $("#total").val(_returnData.total);
                        $('#vehicleno').attr('readonly', true); 
                    }
                }
            });
        });

        $("table").delegate(".deletetd", "click", function () {
            if (confirm("Are you sure you want delete ?")) {
                var id = $(this).attr('id');
                var urlReq = '<?php echo FRONT_DELETE_TAX_ITEM_QUE_LINK ?>';
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    data: {id: id},
                    url: urlReq,
                    success: function (_returnData) {
                        if (_returnData.result == "success") {
                            $("#" + id).text("deleted");
                            $("#" + id).removeClass("deletetd");
                             $("#total").val(_returnData.total);
                        }
                    }
                });
            }
            return false;
        });
    });
</script>
<script>
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
                        var str=response.routes[0].legs[0].distance['text'];
                        var array=str.split(" ");
                        $("#distance").val(array[0]);
//                        console.log(response.routes[0].legs[0].distance['text']);
                        me.directionsDisplay.setDirections(response);
                    } else {
                        window.alert('Directions request failed due to ' + status);
                    }
                });
    };

    function computeTotalDistance(result) {
        var total = 0;
        var myroute = result.routes[0];
        for (var i = 0; i < myroute.legs.length; i++) {
            total += myroute.legs[i].distance.value;
        }
        total = total / 1000;
        alert(total + ' km');
//        document.getElementById('total').innerHTML = total + ' km';
    }


</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBYb8Qt5VL-SALXmCeycEkaNtNypMuDuE&libraries=places&callback=initMap" async defer></script>