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
        <div class="row">
            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Truck List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Truck ID</td>
                                    <td>Truck Number</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            @foreach($trucks as $truck)
                                <tr>
                                    <td>{{ $truck->truck_id }}</td>
                                    <td>{{ $truck->truck_number }}</td>
                                    <td>{{ getStatus($truck->status) }}</td>
                                    <td>
                                        <a href="{{ url('truck-owner/trucks/'.$truck->id.'/view') }}" class="btn btn-xs btn-success">View</a>
                                        <a class="btn btn-xs btn-primary">Track</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <div class="box-header with-border">
                            <h3 class="box-title">Current Transactions</h3>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

