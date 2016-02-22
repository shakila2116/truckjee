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
                <table id="view-owners" class="table table-bordered table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
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
            var t = $('#view-owners').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax":"{{ url('admin/truck-owner/get-owners') }}",

                columns: [
                    { data: 'tj_id', name: 'tj_id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'actions', name: 'actions' }
                ]
            } );
        } );
    </script>
@stop