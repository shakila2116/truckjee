@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Create Transporter
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
                        <h3 class="box-title">Add Basic Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ url('admin/transporter/create') }}" method="POST">
                        {!! csrf_field() !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Phone Number</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Phone Number" name="phone" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Create Transporter</button>
                        </div>
                    </form>
                </div>
            </div>
            {{--end of col-md-6--}}
            <div class="col-md-6">
                @if(\Illuminate\Support\Facades\Session::has('errors'))
                    <div class="alert alert-danger alert-dismissible" style="margin-top:2em;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        <ul>
                            @foreach((\Illuminate\Support\Facades\Session::get('errors')) as $error)
                                <li>{{ $error[0] }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(\Illuminate\Support\Facades\Session::has('message'))
                    <div class="callout callout-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        {{ \Illuminate\Support\Facades\Session::get('message') }}
                    </div>
                @endif
            </div>
        </div>

    </section>

@stop