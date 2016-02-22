@extends('layouts.app')

@section('head')

    <link rel="stylesheet" href="{{ url('css/datepicker3.css')}}">
    <link rel="stylesheet" href="{{ url('css/select2.css')}}">

@stop

@section('content')

    <section class="content-header">
        <h1>
            Create Requirement
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Basic Details</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="source">Source</label>
                            <input type="text" class="form-control"  id='datetimepicker4' name="source" placeholder="Source">
                        </div>
                        <div class="form-group">
                            <label for="destination">Destination</label>
                            <input type="text" class="form-control" id="destination" name="Destination"
                                   placeholder="Destination">
                        </div>
                        <div class="form-group">
                            <label for="truck_type">Truck type</label>
                            <input type="text" class="form-control" id="truck_type" name="truck_type" placeholder="Truck type">
                        </div>
                        <div class="form-group">
                            <label>Date Required</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" id="date_required" data-mask="">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>Expected Delivery Date</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" id="date_delivery" data-mask="">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cargo Details</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="Packing">Packing</label>
                            <select name="packing" id="packing" class="form-control">
                                @foreach(getPackingType() as $packing)
                                    <option value="{{ $packing }}">{{ $packing }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="material">Material Description</label>
                            <select class="form-control" name="material" id="material" style="width: 100%;">
                                @foreach(getMaterials() as $material)
                                    <option value="{{ $material }}">{{ $material }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="max_weight">Maximum Weight of Cargo</label>
                            <select name="max_weight" id="max_weight" class="form-control">
                                @foreach(getMaxWeights() as $weight)
                                    <option value="{{ $weight }}">{{ $weight }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cargo_value">Value of Cargo</label>
                            <select name="cargo_value" id="cargo_value" class="form-control">
                                @foreach(getCargoValues() as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <lable><b>Material Insurance?</b></lable>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="material_insured" id="optionsRadios1" value="insured" checked>
                                    Not Insured
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="material_insured" id="optionsRadios2" value="not insured">
                                    Insured
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Payment Details</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="advance" >Advance</label>
                                    <select name="advance" id="advance" class="form-control">
                                        @foreach(getAdvance() as $advance)
                                            <option value="{{ $advance }}">{{ $advance }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="advance">Balance to be paid in</label>
                                    <select name="advance" id="advance" class="form-control">
                                        @foreach(getBalance() as $balance)
                                            <option value="{{ $balance }}">{{ $balance }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <lable for="penalty"><b>Incentive for Express delivery (Per day)</b></lable>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rs.</span>
                                        <input id="incentive" name="incentive" type="text" class="form-control">
                                    </div>
                                    <p class="help-block">Rs.0 if no Incentive</p>

                                </div>
                                <div class="form-group">
                                    <lable for="penalty"><b>Penalty for delay (Per day)</b></lable>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rs.</span>
                                        <input id="penalty" name="penalty" type="text" class="form-control">
                                    </div>
                                    <p class="help-block">Rs.0 if no Penalty</p>
                                </div>
                                <div class="form-group">
                                    <lable for="detention"><b>Detention (Per Day)</b></lable>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rs.</span>
                                        <input id="detention" name="detention" type="text" class="form-control">
                                    </div>
                                    <p class="help-block">Rs.0 if no Detention</p>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tds">TDS if applicable (in Percentage %)</label>
                                    <input type="text" class="form-control" id="tds" name="tds"
                                           placeholder="TDS if applicable (in Percentage %)">
                                </div>

                                <div class="form-group">
                                    <label for="loading_mamool">Loading Mamool charge</label>
                                    <input type="text" class="form-control" id="loading_mamool" name="loading_mamool"
                                           placeholder="Loading Mamool charge">
                                </div>
                                <div class="form-group">
                                    <label for="loading_reimbursement">Loading Reimbursement</label>
                                    <input type="text" class="form-control" id="loading_reimbursement"
                                           name="loading_reimbursement" placeholder="Loading Reimbursement">
                                </div>
                                <div class="form-group">
                                    <label for="unloading_mamool">Unloading Mamool</label>
                                    <input type="text" class="form-control" id="unloading_mamool"
                                           name="unloading_mamool"
                                           placeholder="Unloading Mamool">
                                </div>
                                <div class="form-group">
                                    <label for="unloading_reimbursement">Unloading Reimbursement</label>
                                    <input type="text" class="form-control" id="unloading_reimbursement"
                                           name="unloading_reimbursement" placeholder="Unloading Reimbursement">
                                </div>
                                <div class="form-group">
                                    <label for="balance_payable">Balance Payable at</label>
                                    <input type="text" class="form-control" id="balance_payable" name="balance_payable"
                                           placeholder="Balance Payable at">
                                </div>
                                <div class="form-group">
                                    <label for="challan_mamool">Challan Mamool</label>
                                    <input type="" class="form-control" id="challan_mamool" name="challan_mamool"
                                           placeholder="challan Maool">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

@stop

@section('scripts')
    <script src="{{ url('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ url('js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('#date_required').datepicker({
                format : "dd-mm-yyyy"
            });
            $('#date_required').on('change',function(){
                $('.datepicker').hide();
            });
            $('#date_delivery').datepicker({
                format : "dd-mm-yyyy"
            });
            $('#date_delivery').on('change',function(){
                $('.datepicker').hide();
            });
            $("#packing").select2();
            $("#material").select2();
            $("#max_weight").select2();
            $("#cargo_value").select2();
        });
    </script>
@stop

<div class="box-header with-border">
    <h3 class="box-title">Payment Details</h3>
</div>
<div class="box-body">
    <div class="form-group">
        <label for="advance" >Advance</label>
        <select name="advance" id="advance" class="form-control">
            @foreach(getAdvance() as $advance)
                <option value="{{ $advance }}">{{ $advance }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="advance">Balance to be paid in</label>
        <select name="advance" id="advance" class="form-control">
            @foreach(getBalance() as $balance)
                <option value="{{ $balance }}">{{ $balance }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <lable for="penalty"><b>Incentive for Express delivery (Per day)</b></lable>
        <div class="input-group">
            <span class="input-group-addon">Rs.</span>
            <input id="incentive" name="incentive" type="text" class="form-control">
        </div>
        <p class="help-block">Rs.0 if no Incentive</p>

    </div>
    <div class="form-group">
        <lable for="penalty"><b>Penalty for delay (Per day)</b></lable>
        <div class="input-group">
            <span class="input-group-addon">Rs.</span>
            <input id="penalty" name="penalty" type="text" class="form-control">
        </div>
        <p class="help-block">Rs.0 if no Penalty</p>
    </div>
    <div class="form-group">
        <lable for="detention"><b>Detention (Per Day)</b></lable>
        <div class="input-group">
            <span class="input-group-addon">Rs.</span>
            <input id="detention" name="detention" type="text" class="form-control">
        </div>
        <p class="help-block">Rs.0 if no Detention</p>
    </div>
    <div class="form-group">
        <label for="tds">TDS if applicable (in Percentage %)</label>
        <input type="text" class="form-control" id="tds" name="tds"
               placeholder="TDS if applicable (in Percentage %)">
    </div>

    <div class="form-group">
        <label for="loading_mamool">Loading Mamool charge</label>
        <input type="text" class="form-control" id="loading_mamool" name="loading_mamool"
               placeholder="Loading Mamool charge">
    </div>
    <div class="form-group">
        <label for="loading_reimbursement">Loading Reimbursement</label>
        <input type="text" class="form-control" id="loading_reimbursement"
               name="loading_reimbursement" placeholder="Loading Reimbursement">
    </div>
    <div class="form-group">
        <label for="unloading_mamool">Unloading Mamool</label>
        <input type="text" class="form-control" id="unloading_mamool"
               name="unloading_mamool"
               placeholder="Unloading Mamool">
    </div>
    <div class="form-group">
        <label for="unloading_reimbursement">Unloading Reimbursement</label>
        <input type="text" class="form-control" id="unloading_reimbursement"
               name="unloading_reimbursement" placeholder="Unloading Reimbursement">
    </div>
    <div class="form-group">
        <label for="balance_payable">Balance Payable at</label>
        <input type="text" class="form-control" id="balance_payable" name="balance_payable"
               placeholder="Balance Payable at">
    </div>
    <div class="form-group">
        <label for="challan_mamool">Challan Mamool</label>
        <input type="" class="form-control" id="challan_mamool" name="challan_mamool"
               placeholder="challan Maool">
    </div>
</div>

<script>
    'use strict';
    app.controller('pricingCalulatorController', ["$scope", "$state", "$location", "$timeout", "$http", "commonService", "supplierQuotation", function ($scope, $state, $location, $timeout, $http, commonService, supplierQuotation) {

        $scope.weights = commonService.getWeights();
        console.log($scope.weights);
        //Load Body Type
        supplierQuotation.getBodyType(function (data) {
            $scope.bodyTypes = data.ResponseObject;
        }, function (data) {
        });

        //Load Vehicle Type
        supplierQuotation.getVehicleType(function (data) {
            //console.log(data);
            $scope.vehicleTypes = data.ResponseObject;
        }, function (data) {
        });

        //Load Trucks
        supplierQuotation.getTrucks(function (data) {
            //console.log(data);
            $scope.trucks = data.ResponseObject;
        }, function (data) {
            //alert("fail");
        });

        $scope.loadfare = {};

        $scope.onSubmitTimeKm = function (loadfare) {
            $scope.showErrInTimeModal = true;
            if (!loadfare.timekm) {
                return;
            }
            var weightId = "";
            if (loadfare.weight) {
                weightId = loadfare.weight.Value;
            }
            // for radio buttons values
            var radios = document.getElementsByName('returnTrip');
            for (var i = 0, length = radios.length; i < length; i++) {
                if (radios[i].checked) {
                    //                        alert(radios[i].value);
                    var returnValue = radios[i].value;
                }
            }

            var radioRate = document.getElementsByName('ratePer');
            for (var i = 0, length = radioRate.length; i < length; i++) {
                if (radioRate[i].checked) {
                    //                        alert(radioRate[i].value);
                    var rateValue = radioRate[i].value;
                }
            }

            var timestamp = getMicrotime(true).toString();
            var inputData = {
                RoleId: 5,
                Weight: weightId,
                FromLocationName: loadfare.from_routes,
                FromState: loadfare.from_state,
                ToLocationName: loadfare.to_routes,
                ToState: loadfare.to_state,
                Distance: loadfare.distance,
                ToandFro: returnValue,
                Shortkm: "1",
                TimeId: loadfare.timekm.TimeId,
                BodyType: loadfare.bodyType.VehicleBodyId,
                VechicleCategory: loadfare.truck.Truck_Id,
                VechicleType: loadfare.vehicleType.VehicleTypeName == "AC" ? 2 : 1,

            };
            //debugger;
            //console.log(JSON.stringify(inputData));
            var hash = common1HMAC(timestamp);
            $("#equitas_loader").show();
            $.ajax({
                type: "POST",
                url: baseurl + "v1/post/Common/AmountCalculation/",
                data: inputData,
                headers: {
                    datatype: "application/json",
                    contentType: "text/plain",
                },
                beforeSend: function (request) {
                    request.setRequestHeader('Microtime', timestamp);
                    request.setRequestHeader('Hash', hash);
                },
                success: function (data) {
                    if (data.IsSuccess == true) {
                        $("#equitas_loader").hide();
                        //alert(data.ResponseObject);
                        $timeout(function () {
                            $scope.calcResult = data.ResponseObject;
                            $("#timekmModal").modal("hide");
                        });
                    }
                    else {
                        $("#equitas_loader").hide();
                        alert(data.ResponseObject);
                    }
                },
                error: function (errorMessage) {
                    $("#equitas_loader").hide();
                    alert('Calculation Failde,Please Check Connection');
                }
            });


        };
        function getTimeKmList() {
            //debugger;
            supplierQuotation.getTimeKmList(function (data) {
                if (data.IsSuccess) {
                    $scope.timekmList = data.ResponseObject;
                    if ($scope.loadfare.timekm) {
                        for (var i in $scope.timekmList) {
                            if ($scope.timekmList[i].TimeId == $scope.loadfare.timekm.TimeId) {
                                $scope.loadfare.timekm = $scope.timekmList[i];
                            }
                        }
                    }
                }
            }, function () {
                //alert("Failed to load Time Km details. Please check connection");
            });
        }
        //form Submit service call
        $scope.loadfare_Calculation = function (invalid, loadfare) {
            $scope.showErr = true;

            if (invalid) {
                return;
            } else {
                if (!loadfare.weight) {
                    return;
                }
                if (loadfare.from_routes == loadfare.to_routes) {
                    //                    alert("=");
                    $("#timekmModal").modal("show");
                    getTimeKmList();
                    return;
                }
                var weightId = "";
                if (loadfare.weight) {
                    weightId = loadfare.weight.Value;
                }
                // for radio buttons values
                var radios = document.getElementsByName('returnTrip');
                for (var i = 0, length = radios.length; i < length; i++) {
                    if (radios[i].checked) {
                        //                        alert(radios[i].value);
                        var returnValue = radios[i].value;
                    }
                }

                var radioRate = document.getElementsByName('ratePer');
                for (var i = 0, length = radioRate.length; i < length; i++) {
                    if (radioRate[i].checked) {
                        //                        alert(radioRate[i].value);
                        var rateValue = radioRate[i].value;
                    }
                }

                var timestamp = getMicrotime(true).toString();
                var inputData = {
                    RoleId: 5,
                    Weight: weightId,
                    FromLocationName: loadfare.from_routes,
                    FromState: loadfare.from_state,
                    ToLocationName: loadfare.to_routes,
                    ToState: loadfare.to_state,
                    Distance: loadfare.distance,
                    ToandFro: returnValue,
                    Shortkm: "0",
                    BodyType: loadfare.bodyType.VehicleBodyId,
                    VechicleCategory: loadfare.truck.Truck_Id,
                    VechicleType: loadfare.vehicleType.VehicleTypeName == "AC" ? 2 : 1,

                };
                //debugger;
                //console.log(JSON.stringify(inputData));
                var hash = common1HMAC(timestamp);
                $("#equitas_loader").show();
                $.ajax({
                    type: "POST",
                    url: baseurl + "v1/post/Common/AmountCalculation/",
                    data: inputData,
                    headers: {
                        datatype: "application/json",
                        contentType: "text/plain",
                    },
                    beforeSend: function (request) {
                        request.setRequestHeader('Microtime', timestamp);
                        request.setRequestHeader('Hash', hash);
                    },
                    success: function (data) {
                        if (data.IsSuccess == true) {
                            $("#equitas_loader").hide();
                            //alert(data.ResponseObject);
                            $timeout(function () {
                                $scope.calcResult = data.ResponseObject;
                            });
                        }
                        else {
                            $("#equitas_loader").hide();
                            alert(data.ResponseObject);
                        }
                    },
                    error: function (errorMessage) {
                        $("#equitas_loader").hide();
                        alert('Calculation Failde,Please Check Connection');
                    }
                });
            }
        };
        // for bind State Names
        $scope.getLocation = function (val) {
            return $http.get('//maps.googleapis.com/maps/api/geocode/json', {
                params: {
                    address: val,
                    sensor: true,
                    components: "country:INDIA"
                }
            }).then(function (response) {
                console.log(response);
                if (response.data.results.length == 0) {
                    $scope.noResults = true;
                }
                return response.data.results.map(function (item) {
                    return item.formatted_address;
                });
            });
        };

        $scope.onPincodeSelect = function (item, model, label, option) {
            $http.get('//maps.googleapis.com/maps/api/geocode/json', {
                params: {
                    address: item,
                    sensor: true,
                    components: "country:INDIA"
                }
            }).then(function (response) {
                for (var i in response.data.results) {
                    if (response.data.results[i].formatted_address == item) {
                        //onBind(response.data.results[i]);
                        var geocoder = new google.maps.Geocoder();
                        var lat = response.data.results[i].geometry.location.lat;
                        var lng = response.data.results[i].geometry.location.lng;
                        var latlng = new google.maps.LatLng(lat, lng);

                        geocoder.geocode({ 'latLng': latlng }, function (response, status) {
                            //console.log(response);
                            onBind(response[0], option);
                        });
                    }
                }
            });
            function onBind(result, option) {
                var addr = result.address_components;
                var localityExist = false;
                if (option == "from") {
                    $scope.loadfare.from_routes = "";
                    $scope.loadfare.from_state = "";
                    $timeout(function () {
                        for (var i in addr) {
                            if (addr[i].types[0] == "locality") {
                                localityExist = true;
                                $scope.loadfare.from_routes = addr[i].long_name;
                            }
                            else if ((addr[i].types[0] == "administrative_area_level_1") || (addr[i].types[0] == "administrative area level 1") || (addr[i].types[0] == "administrative_area_level") || (addr[i].types[0] == "administrative area level")) {
                                $scope.loadfare.from_state = addr[i].long_name;
                                //debugger;
                            }
                        }
                        if (!localityExist) {
                            for (var i in addr) {
                                if ((addr[i].types[0] == "administrative_area_level_2") || (addr[i].types[0] == "administrative area level 2")) {
                                    $scope.loadfare.from_route = addr[i].long_name;
                                }
                            }
                        }
                        $scope.loadfare.from_location = result.geometry.location;
                        $scope.getDistance($scope.loadfare.from_location, $scope.loadfare.to_location);
                    });
                }
                else {
                    $scope.loadfare.to_routes = "";
                    $scope.loadfare.to_state = "";
                    $timeout(function () {
                        for (var i in addr) {
                            if (addr[i].types[0] == "locality") {
                                localityExist = true;
                                $scope.loadfare.to_routes = addr[i].long_name;
                            }
                            else if ((addr[i].types[0] == "administrative_area_level_1") || (addr[i].types[0] == "administrative area level 1") || (addr[i].types[0] == "administrative_area_level") || (addr[i].types[0] == "administrative area level")) {
                                $scope.loadfare.to_state = addr[i].long_name;
                            }
                        }
                        if (!localityExist) {
                            for (var i in addr) {
                                if ((addr[i].types[0] == "administrative_area_level_2") || (addr[i].types[0] == "administrative area level 2")) {
                                    $scope.loadfare.to_routes = addr[i].long_name;
                                }
                            }
                        }
                        $scope.loadfare.to_location = result.geometry.location;
                        $scope.getDistance($scope.loadfare.from_location, $scope.loadfare.to_location);
                    });
                }
            }
        };

        $scope.getDistance = function (p1, p2) {
            if (p1 && p2) {
                var rad = function (x) {
                    return x * Math.PI / 180;
                };
                var R = 6378137; // Earth’s mean radius in meter
                var dLat = rad(p2.lat() - p1.lat());
                var dLong = rad(p2.lng() - p1.lng());
                var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                        Math.cos(rad(p1.lat())) * Math.cos(rad(p2.lat())) *
                        Math.sin(dLong / 2) * Math.sin(dLong / 2);
                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                var d = R * c;
                //return d/1000; // returns the distance in meter
                $scope.loadfare.distance = parseInt(d / 1000);
            }
        };
    }]);

</script>