@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{ url('css/selectize.bootstrap3.css') }}">
@stop

@section('content')

    <section class="content-header" xmlns="http://www.w3.org/1999/html">
        <h1>
            Create Truck
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
                            <h3 class="box-title">Enter Truck Info</h3>
                        </div>
                        <form role="form" action="{{ url('admin/truck/create') }}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <input type="text" hidden name="owner_id" value="{{ $owner->id }}">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="truck_number">Truck Number</label>
                                    <input value="{{ old('truck_number') }}" type="text" name="truck_number" class="form-control" id="truck_number" placeholder="Truck Number">
                                </div>
                                <div class="form-group">
                                    <label for="short_form">Short Form</label>
                                    <input value="{{ old('short_form') }}" type="text" name="short_form" class="form-control" id="short_form" placeholder="Short Form">
                                </div>
                                <div class="form-group">
                                    <label for="imei">IMEI Number</label>
                                    <input value="{{ old('imei') }}" type="text" name="imei" class="form-control" id="imei" placeholder="IMEI Number">
                                </div>

                                <div class="form-group">
                                    <label for="model_id">Truck Model</label>
                                    <select name="model_id" id="model_id" placeholder="Enter Model Name"></select>
                                </div>

                                <div class="form-group">
                                    <label for="RC">RC Book Copy</label>
                                    <input value="{{ old('rc') }}" type="file" name="rc" id="RC" placeholder="RC Book Copy">
                                </div>

                                <div class="form-group">
                                    <label for="insurance">Insurance</label>
                                    <input value="{{ old('insurance') }}" type="file" id="insurance" name="insurance"
                                           placeholder="Insurance">
                                </div>

                                <div class="form-group">
                                    <label for="pollution">Pollution</label>
                                    <input value="{{ old('pollution') }}" type="file" id="pollution" name="pollution"
                                           placeholder="Pollution">
                                </div>

                                <div class="form-group">
                                    <label for="np">National Permit</label>
                                    <input value="{{ old('np') }}" type="file" id="np" name="np"
                                           placeholder="National Permit">
                                </div>

                                <div class="form-group">
                                    <label for="authorization">Authorization Certificate</label>
                                    <input value="{{ old('authorization') }}" type="file" id="authorization" name="authorization"
                                           placeholder="Authorization Certificate">
                                </div>

                                <p class="help-block">Accepted file formats : jpg, jpeg, png</p>
                                <p class="help-block">Max file size : 2 MB per file</p>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>



                    </div>
                </div>
                <div class="col-md-6">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible" style="margin-top:2em;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ ($error) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        @if(\Illuminate\Support\Facades\Session::has('message'))
                            <div class="alert alert-success alert-dismissible" style="margin-top:2em;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-ban"></i> Success!</h4>
                                <h3>{{ \Illuminate\Support\Facades\Session::get('message') }}</h3>
                            </div>
                        @endif
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
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            Truck List
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Truck Number</td>
                                    <td>IMEI</td>
                                    <td>Created At</td>
                                </tr>
                            </thead>
                            @foreach($trucks as $truck)
                                <tr>
                                    <td>{{ $truck->truck_number }}</td>
                                    <td>{{ $truck->imei }}</td>
                                    <td>{{ dayFormat($truck->created_at) }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
    </section>

@stop

@section('scripts')

    <script src="{{ url('js/selectize.min.js') }}"></script>


    <script>
        $(document).ready(function(){
            $('#model_id').selectize({
                valueField: 'id',
                labelField: 'model_name',
                searchField: ['model_name','manufacturer','search_term'],
                maxOptions: 10,
                options: [],
                create: false,
                render: {
                    option: function(item, escape) {
                        return '<div>' +
                                escape(item.search_term)+'<br>' +
                                escape(item.manufacturer) + '-' + escape(item.model_name) + '<br>'+
                                escape(item.max_capacity) + '- ' + escape(item.axle) +' - '+ escape(item.type) + '- Wheels : ' + escape(item.wheels) +
                                '</div>'
                    }
                },
                load: function(query, callback) {
                    if (!query.length) return callback();
                    $.ajax({
                        url: "{{ url('admin/trucks/get-models') }}",
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            q: query
                        },
                        error: function() {
                            callback();
                        },
                        success: function(res) {
                            callback(res.data);
                        }
                    });
                }
            });
        });
    </script>
@stop