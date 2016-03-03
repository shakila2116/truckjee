<?php

namespace TruckJee\Http\Controllers\Transporter;

use Illuminate\Http\Request;

use TruckJee\Http\Requests;
use TruckJee\Http\Controllers\Controller;
use TruckJee\User;
use UxWeb\SweetAlert\SweetAlert;


class TransporterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('transporter');
        parent::__construct();
    }
    public function index()
    {
        return view('transporter.dashboard');
    }

    public function create()
    {
        return view('transporter.requirement.create');
    }

    public function profile()
    {
        $transporter = User :: findOrFail($this->user->id);
        $details = $transporter->getDetails()->first();
        return view('transporter.profile')->with(['transporter'=>$transporter,'details'=>$details]);
    }

}
