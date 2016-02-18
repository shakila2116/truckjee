@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Profile
        </h1>
        {{--<ol class="breadcrumb">--}}
            {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
            {{--<li><a href="#">Examples</a></li>--}}
            {{--<li class="active">Blank page</li>--}}
        {{--</ol>--}}
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Personal Details</h3>
                @foreach ($user as $use)
                    <table class="table table-bordered">
                    <tr>
                    <td>Owner Id: </td>
                    <td>{{ $use->user_id }}</td>
                    </tr>
                    <tr>
                    <td>Name: </td>
                    <td>{{ $owner->name }}</td>
                    </tr>
                        <tr>
                            <td>DocumentNumber: </td>
                            <td>{{ $use->document_number }}</td>
                        </tr> <tr>
                            <td>DateofBirth:</td>
                            <td>{{ date('d-m-Y', strtotime($use->dob)) }}</td>
                        </tr>
                        <tr>
                            <td>Wedding Date:</td>
                            <td>{{ date('d-m-Y', strtotime($use->anniversary)) }}</td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td>{{ $use->address }}</td>
                        </tr>
                        <tr>
                            <td>Proof:</td>
                            <td>
                                <a href="{{ url( $use->id_proof) }}" data-title="RC Book Copy" data-lightbox="truck">Id Proof</a>
                               </td>
                        </tr>
                    </table>
                @endforeach


                </div>
            </div>
            </div>

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Company Details</h3>
                        @foreach ($user as $use)
                            <table class="table table-bordered">
                                <tr>
                                    <td>Association Id:</td>
                                    <td>{{ $use->association_id }}</td>
                                </tr>
                                <tr>
                                    <td>Association Name:</td>
                                    <td>{{ $use->association_name }}</td>
                                </tr>
                                <tr>
                                    <td>Company Name:</td>
                                    <td>{{ $use->company_name }}</td>
                                </tr>
                                <tr>
                                    <td>Company Type:</td>
                                    <td>{{ $use->company_type }}</td>
                                </tr>
                                <tr>
                                    <td>Company Proof:</td>
                                    <td>  <a href="{{ url( $use->company_proof) }}" data-title="RC Book Copy" data-lightbox="truck">CompanyProof</td>
                                </tr>
                                <tr>
                                    <td>Address:</td>
                                    <td>{{ $use->company_address }}</td>
                                </tr>
                                <tr>
                                    <td>Phone Number:</td>
                                    <td>{{ $use->company_landline }}</td>
                                </tr>
                                <tr>
                                    <td> Company Mobile:</td>
                                    <td>{{ $use->company_mobile }}</td>
                                </tr>
                                <tr>
                                    <td> Company Website:</td>
                                    <td>{{ $use->company_website }}</td>
                                </tr>
                            </table>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
