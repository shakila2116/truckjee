@extends('layouts.app')

@section('head')

    <link rel="stylesheet" href="{{ url('css/datepicker3.css')}}">
    <link rel="stylesheet" href="{{ url('css/select2.css')}}">
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
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
            <form action="{{ url('/transporter/requirement/create') }}" method="POST">
                {!! csrf_field() !!}
                <div class="col-md-7">
                    <div class="box box-primary" id="basic_details">
                        <div class="box-header with-border">
                            <h3 class="box-title">Basic Details</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
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
                            <div class="form-group">
                                <label for="destination">*Destination</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <input type="text" class="form-control" id="destination" name="Destination" required>
                                </div>
                                <div id="destination_address">
                                    <input name="destination_level_1" id="administrative_area_level_1" type="text" hidden>
                                    <input name="destination_level_2" id="administrative_area_level_2" type="text" hidden>
                                    <input name="destination_locality" id="locality" type="text" hidden>
                                    <input name="destination_postal_code" id="postal_code" type="text" value="" hidden>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="truck_type">*Truck type</label>
                                <input type="text" class="form-control" id="truck_type" name="truck_type" placeholder="Truck type" required>
                            </div>
                            <div class="form-group">
                                <label>*Date Required</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control" id="date_required" required>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>*Expected Delivery Date</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control" id="date_delivery" required>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <button class="btn btn-success" id="basic_btn">Enter Cargo Details</button>
                        </div>
                    </div>

                    <div class="box box-primary" id="cargo_details">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cargo Details</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="Packing">Packing</label>
                                <select name="packing" id="packing" class="form-control"  style="width: 100%;">
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
                                <select name="max_weight" id="max_weight" class="form-control" style="width: 100%;">
                                    @foreach(getMaxWeights() as $weight)
                                        <option value="{{ $weight }}">{{ $weight }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cargo_value">Value of Cargo</label>
                                <select name="cargo_value" id="cargo_value" class="form-control" style="width: 100%;">
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
                            <button class="btn btn-success" data-target="#myModal" id="cargo_btn">Enter Truck Hire Details</button>
                        </div>
                    </div>

                    <div class="box box-primary" id="hire_details">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cargo Details</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <td class="col-md-6">
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
                                            <label for="incentive">Incentive for Express delivery (Per day)</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rs</span>
                                                <input name="incentive" type="text" class="form-control" placeholder="Incentive for Express delivery (Per day" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="penalty">Penalty for late delivery (Per day)</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rs</span>
                                                <input name="penalty" type="text" class="form-control" placeholder="Penalty for late delivery (Per day)" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="detention">Detention (Per day)</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rs</span>
                                                <input name="detention" type="text" class="form-control" placeholder="Detention (Per day)" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tds">TDS if applicable (in Percentage %)</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rs</span>
                                                <input name="tds" type="text" class="form-control" placeholder="TDS if applicable" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-md-6">
                                        <div class="form-group">
                                            <label for="loading_mamool">Loading Mamool</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rs</span>
                                                <input name="loading_mamool" type="text" class="form-control" placeholder="Loading Mamool" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="loading_reimbursement">Loading Reimbursement</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rs</span>
                                                <input name="loading_reimbursement" type="text" class="form-control" placeholder="Loading Reimbursement" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="unloading_mamool">Unloading Mamool</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rs</span>
                                                <input name="unloading_mamool" type="text" class="form-control" placeholder="Unloading Mamool" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="unloading_reimbursement">Unloading Reimbursement</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rs</span>
                                                <input name="unloading_reimbursement" type="text" class="form-control" placeholder="Unloading Reimbursement" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="balance_payable">Balance Payable at</label>
                                            <input type="text" name="balance_payable" class="form-control" placeholder="Balance Payable">
                                        </div>
                                        <div class="form-group">
                                            <label for="challan_mamool">Challan Mamool</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rs</span>
                                                <input name="challan_mamool" type="text" class="form-control" placeholder="Challan Mamool" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <p class="help-block">Enter 0 for fields which are not applicable</p>
                                    </td>
                                </tr>
                            </table>
                            <button class="btn btn-success" id="cargo_btn">Create Requirement</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="col-md-5">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Your Requirement</h3>
                    </div>
                    <div class="box-body">
                        <div class="progress" >
                            <div id="progressbar"  class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                <span class="sr-only">20% Complete (warning)</span>
                            </div>
                        </div>
                        <div class="row" style="text-align: center;">
                            <div class="col-md-4">
                                <a id="basic_details_a">
                                    <i class="fa fa-3x fa-send"></i>
                                    <p>Basic Details</p>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a id="cargo_details_a">
                                    <i class="fa fa-3x fa-cubes"></i>
                                    <p>Cargo Details</p>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a id="hire_details_a">
                                    <i class="fa fa-3x fa-truck"></i>
                                    <p>Truck Hire Info</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class = "modal fade" id="shareModal" role = "dialog">
            <div class = "modal-dialog">
                <div class = "modal-content">
                    <div class="modal-header">
                        <a class="close" data-dismiss="modal">×</a>
                        <h3>Modal header</h3>
                    </div>
                    <div class="modal-body">
                        <div id="errorId"></div>
                        <p>One fine body…</p>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

@section('scripts')
    <script src="{{ url('js/jquery-ui.min.js') }}"></script>
    <script src="{{ url('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ url('js/jquery.geocomplete.js') }}"></script>
    <script src="{{ url('js/formValidation.min.js') }}"></script>
    <script src="{{ url('js/fvbootstrap.min.js') }}"></script>

    <script type="text/javascript">
        $(function () {
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
            $('#cargo_details').hide();
            $('#hire_details').hide();
            $('#basic_details_a').on('click',showBasic);
            $('#hire_details_a').on('click', showHire);
            $('#cargo_details_a').on('click', showCargo);
            $('#basic_btn').on('click',function(e){
                e.preventDefault();
                console.log(basicValidation());
                if(!basicValidation())
                {
                    $('#errorId').appendto("Hello world");
                    $('#shareModal').modal('show');
                }
                else
                {
                    showCargo();
                    $('#progressbar').animate({
                        width : "65%"
                    },{queue: false});
                }
            });
            $('#cargo_btn').on('click',function(e){
                e.preventDefault();
                showHire();
                $('#progressbar').animate({
                    width : "100%"
                },{queue: false});
            });

            $('#date_required, #date_delivery ').datepicker({
                format : "dd-mm-yyyy",
                todayHighlight : true,
                startDate: new Date(),
                autoclose : true
            });

            function hideAll()
            {
                $('#cargo_details').hide();
                $('#hire_details').hide();
                $('#basic_details').hide();
            }
            function showCargo()
            {
                hideAll();
                $('#cargo_details').fadeIn(1000);
            }
            function showHire()
            {
                hideAll();
                $('#hire_details').fadeIn(1000);
            }
            function showBasic()
            {
                hideAll();
                $('#basic_details').fadeIn(1000);
            }
            function basicValidation()
            {
                var inputs = ['source','destination', 'truck_type', 'date_required','date_delivery'];
                var valid = true;
                $.each(inputs, function(index, value){
                    if($('#'+value).val()== "")
                    {
                        $('#errorId').val("Hello "+value);
                        valid = false;
                    }
                });
                return valid;
            }
        });
    </script>
@stop