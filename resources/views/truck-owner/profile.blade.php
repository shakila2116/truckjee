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
                                <td>{{ getOwnerId('$user->user_id') }}</td>
                            </tr>
                            <tr>
                                <td>Name: </td>
                                <td>{{ $owner->name }}</td>
                            </tr>
                            <tr>
                                <td>DocumentNumber: </td>
                                <td>{{ $user->document_number }}</td>
                            </tr>
                            <tr>
                                <td>DateofBirth:</td>
                                <td>{{ date('d-m-Y', strtotime($user->dob)) }}</td>
                            </tr>
                            <tr>
                                <td>Wedding Date:</td>
                                <td>{{ date('d-m-Y', strtotime($user->anniversary)) }}</td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td>{{ $user->address }}</td>
                            </tr>
                            <tr>
                                <td>Proof:</td>
                                <td>
                                    <a href="{{ url( $user->id_proof) }}" data-title="RC Book Copy" data-lightbox="truck">Id Proof</a>
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
                                <td>{{ $user->association_id }}</td>
                            </tr>
                            <tr>
                                <td>Association Name:</td>
                                <td>{{ $user->association_name }}</td>
                            </tr>
                            <tr>
                                <td>Company Name:</td>
                                <td>{{ $user->company_name }}</td>
                            </tr>
                            <tr>
                                <td>Company Type:</td>
                                <td>{{ $user->company_type }}</td>
                            </tr>
                            <tr>
                                <td>Company Proof:</td>
                                <td>  <a href="{{ url( $user->company_proof) }}" data-title="RC Book Copy" data-lightbox="truck">CompanyProof</td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td>{{ $user->company_address }}</td>
                            </tr>
                            <tr>
                                <td>Phone Number:</td>
                                <td>{{ $user->company_landline }}</td>
                            </tr>
                            <tr>
                                <td> Company Mobile:</td>
                                <td>{{ $user->company_mobile }}</td>
                            </tr>
                            <tr>
                                <td> Company Website:</td>
                                <td>{{ $user->company_website }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
