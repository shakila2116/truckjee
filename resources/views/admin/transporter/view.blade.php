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
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Transporter Information</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <td>Transporter Id</td>
                                <td>{{ $transporter->id }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $transporter->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $transporter->email }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{ $transporter->phone }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $detail->address }}</td>
                            </tr>
                            <tr>
                                <td>ID Proof</td>

                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </section>

@stop