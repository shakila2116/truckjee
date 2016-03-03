@extends('layouts.app')

@section('head')

    <link rel="stylesheet" href="{{ url('css/datepicker3.css')}}">
    <link rel="stylesheet" href="{{ url('css/select2.css')}}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css')}}">
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <style type="text/css">
        /* Custom the feedback icon styles */
        #requirmentForm .form-control-feedback {
            position: fixed;
        }
    </style>
@stop

@section('content')

    <section class="content-header">
        <h1>
            Create Requirement
            {{--<small>it all starts here</small>--}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Create Requirement</a></li>
            {{--<li class="active">Blank page</li>--}}
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form id="requirmentForm" action="{{ url('/transporter/requirement/create') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Enter your requirements</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group col-xs-6 col-md-3">
                                    <label for="source">*Source</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <input type="text" class="form-control"  id='source' name="source" placeholder="Enter a location" required>
                                    </div>
                                    <div id="addressDetails">
                                        <input name="source_level_1" id="administrative_area_level_1" type="text" hidden>
                                        <input name="source_level_2" id="administrative_area_level_2" type="text" hidden>
                                        <input name="source_locality" id="locality" type="text" hidden>
                                        <input name="source_postal_code" id="postal_code" type="text" value="" hidden>
                                    </div>
                                </div>
                                <div class="form-group col-xs-6 col-md-3">
                                    <label for="destination">*Destination</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <input type="text" class="form-control" id="destination" name="destination" required>
                                    </div>
                                    <div id="destination_address">
                                        <input name="destination_level_1" id="administrative_area_level_1" type="text" hidden>
                                        <input name="destination_level_2" id="administrative_area_level_2" type="text" hidden>
                                        <input name="destination_locality" id="locality" type="text" hidden>
                                        <input name="destination_postal_code" id="postal_code" type="text" value="" hidden>
                                    </div>
                                </div>
                                <div class="form-group col-xs-6 col-md-3">
                                    <label>*Date </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control" id="date_required" name="date_required" required>
                                    </div>
                                </div>
                                <div class="form-group col-xs-6 col-md-3">
                                    <label>*Expected Delivery Date</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control" id="date_delivery" name="date_delivery" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-6 col-md-3">
                                    <label for="truck_type">*Truck type</label>
                                    <select name="truck_type[]" id="truck_type" class="form-control"  multiple="multiple">
                                        @foreach(getTruckTypes() as $truck_type)
                                            <option value="{{ $truck_type->id }}">{{ $truck_type->model_id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xs-6 col-md-3">
                                    <label for="total_trucks">*No of Trucks</label>
                                    <select class="form-control" name="total_trucks" id="total_trucks" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4+">More than 4</option>
                                    </select>
                                </div>
                                <div class="form-group col-xs-6 col-md-3">
                                    <label for="material">Material Description</label>
                                    <select class="form-control" name="material" id="material" style="width: 100%;">
                                        @foreach(getMaterials() as $material)
                                            <option value="{{ $material }}">{{ $material }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xs-6 col-md-3">
                                    <label for="Packing">Packing</label>
                                    <select name="packing" id="packing" class="form-control"  style="width: 100%;">
                                        @foreach(getPackingType() as $packing)
                                            <option value="{{ $packing }}">{{ $packing }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-6 col-md-3">
                                    <label for="max_weight">Maximum Weight of Cargo</label>
                                    <select name="max_weight" id="max_weight" class="form-control" style="width: 100%;">
                                        @foreach(getMaxWeights() as $weight)
                                            <option value="{{ $weight }}">{{ $weight }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xs-6 col-md-3">
                                    <label for="cargo_value">Value of Cargo</label>
                                    <select name="cargo_value" id="cargo_value" class="form-control" style="width: 100%;">
                                        @foreach(getCargoValues() as $value)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xs-6 col-md-3">
                                    <lable><b>Material Insurance?</b></lable>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="material_insurance" id="optionsRadios1" value="insured" required>
                                            Not Insured
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="material_insurance" id="optionsRadios2" value="not insured" required>
                                            Insured
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-xs-6 col-md-3">
                                    <label for="advance" >*Advance</label>
                                    <select name="advance" id="advance" class="form-control" required>
                                        @foreach(getAdvance() as $advance)
                                            <option value="{{ $advance }}">{{ $advance }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-6 col-md-2">
                                    <label for="balance">*Balance to be paid</label>
                                    <select name="balance" id="balance" class="form-control" required>
                                        @foreach(getBalance() as $balance)
                                            <option value="{{ $balance }}">{{ $balance }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xs-6 col-md-2">
                                    <label for="balance_payable">*Balance Payable at</label>
                                    <input type="text" id="balance_payable" name="balance_payable" class="form-control" placeholder="Balance Payable" required>
                                </div>
                                <div class="form-group col-xs-6 col-md-2">
                                    <label for="incentive">Incentive(Per day)</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rs</span>
                                        <input id="incentive" name="incentive" type="text" class="form-control" placeholder="Incentive for Express delivery (Per day" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="form-group col-xs-6 col-md-2">
                                    <label for="penalty">Penalty(Per day)</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rs</span>
                                        <input id="penalty" name="penalty" type="text" class="form-control" placeholder="Penalty for late delivery (Per day)" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="form-group col-xs-6 col-md-2">
                                    <label for="detention">Detention (Per day)</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rs</span>
                                        <input id="detention" name="detention" type="text" class="form-control" placeholder="Detention (Per day)" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="form-group col-xs-6 col-md-2">
                                    <label for="challan_mamool">Challan Mamool</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rs</span>
                                        <input name="challan_mamool" id="challan_mamool" type="text" class="form-control" placeholder="Challan Mamool" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-6 col-md-2">
                                    <label for="loading_mamool">Loading Mamool</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rs</span>
                                        <input id="loading_mamool" name="loading_mamool" type="text" class="form-control" placeholder="Loading Mamool" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="form-group col-xs-6 col-md-2">
                                    <label for="unloading_mamool">Unloading Mamool</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rs</span>
                                        <input id="unloading_mamool" name="unloading_mamool" type="text" class="form-control" placeholder="Unloading Mamool" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="form-group col-xs-6 col-md-3">
                                    <label for="loading_reimbursement">Loading Reimbursement</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rs</span>
                                        <input id="loading_reimbursement" name="loading_reimbursement" type="text" class="form-control" placeholder="Loading Reimbursement" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="form-group col-xs-6 col-md-3">
                                    <label for="unloading_reimbursement">Unloading Reimbursement</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Rs</span>
                                        <input  id="unloading_reimbursement" name="unloading_reimbursement" type="text" class="form-control" placeholder="Unloading Reimbursement" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="form-group col-xs-6 col-md-2">
                                    <label for="tds">TDS if applicable</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">%</span>
                                        <input  id="tds" name="tds" type="text" class="form-control" placeholder="TDS if applicable" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <p class="help-block">Fields with * are required</p>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Create Requirement</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@stop

@section('scripts')
    <script src="{{ url('js/jquery-ui.min.js') }}"></script>
    <script src="{{ url('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ url('js/jquery.geocomplete.js') }}"></script>
    <script src="{{ url('js/select2.full.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#truck_type').select2({
                placeholder : "Select type",
                maximumSelectionLength: 3
            });
            $('#source').geocomplete({
                country : "IN",
                details : '#addressDetails',
                detailsAttribute : 'id',
                types : ["geocode" ],
            });
            $('#source').on('change',function(){
                $("#source").trigger("geocode");
            });
            $('#destination').geocomplete({
                country : "IN",
                details: "#destination_address",
                detailsAttribute : 'id',
                types : ["geocode" ],
            });
            $('#destination').on('change',function(){
                $("#destination").trigger("geocode");
            });

            $('#date_required, #date_delivery ').datepicker({
                format : "dd-mm-yyyy",
                todayHighlight : true,
                startDate: new Date(),
                autoclose : true
            });
        });
    </script>
@stop