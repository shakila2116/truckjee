<?php

namespace TruckJee\Http\Controllers\Transporter;

use Illuminate\Http\Request;

use TruckJee\Http\Requests;
use TruckJee\Http\Controllers\Controller;
use TruckJee\User;


class TransporterController extends Controller
{
    public function index()
    {
        return view('transporter.dashboard');
    }

    public function create()
    {
        return view('transporter.requirement.create');
    }
    
    public function createRequirement(Request $request)
    {
        dd($request->input());
    }
}
