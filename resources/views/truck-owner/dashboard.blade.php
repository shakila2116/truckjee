@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{ url('css/bootstrap-editable.css') }}">
    <link rel="stylesheet" href="{{ url('css/address.css') }}">
@stop

@section('content')

    <section class="content-header">
        <h1>
            Truck Owner Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            {{--<li><a href="#">Examples</a></li>--}}
            {{--<li class="active">Blank page</li>--}}
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
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
                                    <td>Truck Type</td>
                                    <td>Status</td>
                                    <td>Update Location</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            @foreach($trucks as $truck)
                                <tr>
                                    <td>{{ $truck->truck_id }}</td>
                                    <td>{{ $truck->truck_number }}</td>
                                    <td>{{ getModelName($truck->model_id) }}</td>
                                    <td>{{ getStatus($truck->status) }}</td>
                                    <td><a href="#" id="address" data-pk="1" data-type="address" data-title="Please, fill address"></a></td>
                                    <td>
                                        <a href="{{ url('truck-owner/trucks/'.$truck->id.'/view') }}" class="btn btn-xs btn-success">View</a>
                                        <a class="btn btn-xs btn-primary">Track</a>
                                        <a class="btn btn-xs btn-danger">Update Location</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-4">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <div class="box-header with-border">
                            <h3 class="box-title">Placeholder</h3>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop


@section('scripts')
    <script src="{{ url('js/bootstrap-editable.min.js') }}"></script>
    <script src="{{ url('js/address.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#address').editable({
                url: '/post',
                value: {
                    city: "Moscow",
                    street: "Lenina",
                    building: "12"
                },
                validate: function(value) {
                    if(value.city == '') return 'city is required!';
                },
                display: function(value) {
                    if(!value) {
                        $(this).empty();
                        return;
                    }
                    var html = '<b>' + $('<div>').text(value.city).html() + '</b>, ' + $('<div>').text(value.street).html() + ' st., bld. ' + $('<div>').text(value.building).html();
                    $(this).html(html);
                }
            });
        });

    </script>
@stop