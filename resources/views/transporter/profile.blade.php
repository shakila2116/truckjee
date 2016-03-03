@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profile</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Personal Details</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <td>Owner Id: </td>
                                <td>{{ $transporter->tj_id }}</td>
                            </tr>
                            <tr>
                                <td>Name: </td>
                                <td>{{ $transporter->name }}</td>
                            </tr>
                            <tr>
                                <td>DocumentNumber: </td>
                                <td>{{ $details->document_number }}</td>
                            </tr>
                            <tr>
                                <td>DateofBirth:</td>
                                <td>{{ $details->dob }}</td>
                            </tr>
                            <tr>
                                <td>Wedding Date:</td>
                                <td>{{ $details->anniversary }}</td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td>{{ $details->address }}</td>
                            </tr>
                            <tr>
                                <td>Proof:</td>
                                <td>
                                    <a href="{{ url( $details->id_proof) }}" data-title="RC Book Copy" data-lightbox="truck">Id Proof</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Company Details</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <td>Association Id:</td>
                                <td>{{ $details->association_id }}</td>
                            </tr>
                            <tr>
                                <td>Association Name:</td>
                                <td>{{ $details->association_name }}</td>
                            </tr>
                            <tr>
                                <td>Company Name:</td>
                                <td>{{ $details->company_name }}</td>
                            </tr>
                            <tr>
                                <td>Company Type:</td>
                                <td>{{ $details->company_type }}</td>
                            </tr>
                            <tr>
                                <td>Company Proof:</td>
                                <td>  <a href="{{ url( $details->company_proof) }}" data-title="RC Book Copy" data-lightbox="truck">CompanyProof</td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td>{{ $details->company_address }}</td>
                            </tr>
                            <tr>
                                <td>Phone Number:</td>
                                <td>{{ $details->company_landline }}</td>
                            </tr>
                            <tr>
                                <td> Company Mobile:</td>
                                <td>{{ $details->company_mobile }}</td>
                            </tr>
                            <tr>
                                <td> Company Website:</td>
                                <td>{{ $details->company_website }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
