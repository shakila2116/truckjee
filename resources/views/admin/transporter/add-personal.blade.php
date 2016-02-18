@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{ url('css/datepicker3.css')}}">

@stop

@section('content')


    <section class="content-header">
        <h1>
            Dashboard
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>
    <section class="content">
        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div class="callout callout-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Message </h4>
                {{ \Illuminate\Support\Facades\Session::get('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Enter Personal Details of {{ $owner->tj_id }}, {{ $owner->name }}
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <form action="{{ url('admin/transporter/add-personal') }}" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <input type="text" hidden name="user_id" value="{{ $owner->id }}">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="document_number">Document Number</label>
                                        <input type="text" class="form-control" id="document_number" name="document_number"
                                               placeholder="Document Number" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_proof">ID Proof Scan</label>
                                        <input type="file" class="form-control" id="id_proof" name="id_proof"
                                               placeholder="ID Proof Scan">
                                    </div>
                                    <div class="form-group">
                                        <label>Date of birth</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" name="dob" id="dob" required>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="form-group">
                                        <lable><b>Gender</b></lable>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="gender" id="gender1" value="Male" checked>
                                                Male
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="gender" id="gender2" value="Female">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Anniversary</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" name="anniversary" id="anniversary" required>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" id="address" name="address" placeholder="Address" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="association_name">Association Name</label>
                                        <input type="text" class="form-control" id="association_name" name="association_name"
                                               placeholder="Association Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="association_id">Association Id</label>
                                        <input type="text" class="form-control" id="association_id" name="association_id"
                                               placeholder="Association Id" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="company_name">Company_name</label>
                                        <input type="text" class="form-control" id="company_name" name="company_name"
                                               placeholder="Company_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="company_address">Company Address</label>
                                    <textarea class="form-control" id="company_address" name="company_address"
                                              placeholder="Company Address"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="company_type">Company Type</label>
                                        <select name="company_type" class="form-control">
                                            <option value="Private Ltd">Private Ltd</option>
                                            <option value="proprietorship">Proprietorship</option>
                                            <option value="partnership">Partnership</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="company_proof">Company Proof</label>
                                        <input type="file" class="form-control" id="company_proof" name="company_proof"
                                               placeholder="Company Proof">
                                    </div>
                                    <div class="form-group">
                                        <label for="trucks_owned">Trucks Owned</label>
                                        <input type="text" class="form-control" id="trucks_owned" name="trucks_owned"
                                               placeholder="Trucks Owned">
                                    </div>

                                    <div class="form-group">
                                        <label for="company_landline">Landline</label>
                                        <input type="text" class="form-control" id="company_landline" name="company_landline"
                                               placeholder="Landline">
                                    </div>
                                    <div class="form-group">
                                        <label for="company_mobile">Company Mobile</label>
                                        <input type="text" class="form-control" id="company_mobile" name="company_mobile"
                                               placeholder="Company Mobile">
                                    </div>
                                    <div class="form-group">
                                        <label for="company_website">Website</label>
                                        <input type="text" class="form-control" id="company_website" name="company_website"
                                               placeholder="Website">
                                    </div>

                                    <button class="btn btn-primary">Add Personal Details</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

@section('scripts')

    <script src="{{ url('js/bootstrap-datepicker.js') }}"></script>
    <script>
        $('#dob, #anniversary ').datepicker({
            format : "dd-mm-yyyy",
            todayHighlight : true,
            autoclose : true
        });
    </script>

@stop