@extends('layouts.app')

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
                        <h3 class="box-title">Truck Owner Information</h3>
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
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Trucks Info</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td>Number</td>
                                <td>Model ID</td>
                                <td>IMEI</td>
                                <td>Model Name</td>
                                <td></td>
                            </tr>
                            </thead>
                            @foreach($trucks as $truck)
                                <tr>
                                    <td>{{ $truck->truck_number}}</td>
                                    <td>{{ getModelName($truck->model_id) }}</td>
                                    <td>{{ $truck->imei }}</td>
                                    <td>{{ getModelInfo($truck->description_id) }}</td>
                                    <td><a href="{{ url('/admin/truck/'.$truck->id.'/view') }}"
                                           class="btn btn-xs btn-danger">View</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop