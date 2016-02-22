<?php

namespace TruckJee\Http\Controllers\Admin;

use Illuminate\Http\Request;

use TruckJee\Http\Requests;
use TruckJee\Http\Controllers\Controller;

class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index()
    {
        return view('admin.dashboard');
    }
    



}
