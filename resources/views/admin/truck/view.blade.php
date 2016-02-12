@extends('layouts.app')

@section('head')

    <link rel="stylesheet" href="{{ url('css/lightbox.min.css') }}">

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
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title">Dashboard</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Truck Details</h3>
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <td>Truck Number</td>
                            <td>{{ $truck->truck_number }}</td>
                        </tr>
                        <tr>
                            <td>Truck Short Form</td>
                            <td>{{ $truck->short_form }}</td>
                        </tr>
                        <tr>
                            <td>IMEI</td>
                            <td>{{ $truck->imei }}</td>
                        </tr>
                        <tr>
                            <td>Model Info</td>
                            <td>{{ getModelInfo($truck->model_id) }}</td>
                        </tr>
                        <tr>
                            <td>Rc Book</td>
                            <td>
                                <a href="{{ url($truck->rc) }}" data-title="RC Book Copy" data-lightbox="truck">Rc</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Insurance</td>
                            <td>
                                <a href="{{ url($truck->insurance) }}" data-title="Insurance" data-lightbox="truck">Insurance</a>                            </td>
                        </tr>
                        <tr>
                            <td>National Permit</td>
                            <td>
                                <a href="{{ url($truck->np) }}" data-title="National Permit" data-lightbox="truck">National Permit</a>                            </td>
                        </tr>
                        <tr>
                            <td>Pollution</td>
                            <td>
                                <a href="{{ url($truck->pollution) }}" data-title="Pollution" data-lightbox="truck">Pollution</a>                            </td>
                        </tr>
                        <tr>
                            <td>Authorization</td>
                            <td>
                                <a href="{{ url($truck->authorization) }}" data-title="Authorization" data-lightbox="truck">Authorization</a>                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Truck Owner Information</h3>
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <td>Owner Id</td>
                            <td>{{ getOwnerId($owner->id) }}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $owner->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $owner->email }}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $owner->phone }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>

@stop

@section('scripts')

    <script src="{{ url('js/lightbox.min.js') }}"></script>

@stop