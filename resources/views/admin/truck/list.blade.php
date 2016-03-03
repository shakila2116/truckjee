@extends('layouts.app')


@section('head')
    <link rel="stylesheet" href="{{ url('css/dataTables.bootstrap.css') }}">
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
                <div class="box-title">Truck List</div>
                <table id="truck-list" class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Truck ID</td>
                            <td>Owner Name</td>
                            <td>Number</td>
                            <td>Model Name</td>
                            <td>Model Description</td>
                            <td>GPS IMEI</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>

@stop

@section('scripts')


    <script src="{{ url('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('js/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var t = $('#truck-list').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax":"{{ url('admin/trucks/get-trucks') }}",

                columns: [
                    { data: 'truck_id', name: 'truck_id' },
                    { data: 'name', name: 'name' },
                    { data: 'truck_number', name: 'truck_number' },
                    { data: 'description_id', name: 'description_id' },
                    { data: 'model_id', name: 'model_id' },
                    { data: 'imei', name: 'imei' },
                    { data: 'actions', name:'action', searchable: false}
                ]
            } );
        } );
    </script>
@stop