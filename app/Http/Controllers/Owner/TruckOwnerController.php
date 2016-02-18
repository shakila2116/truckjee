<?php

namespace TruckJee\Http\Controllers\Owner;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use TruckJee\Http\Requests;
use TruckJee\Http\Controllers\Controller;
use TruckJee\Models\TruckOwner\Truck;
use TruckJee\User;

class TruckOwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('truckowner');
        parent::__construct();
    }

    /*
     * TODO:
     * 1.Display current truck location in the dashboard;
     * 2.
     */
    public function index()
    {
        return view('truck-owner.dashboard')->with([
            'trucks'    =>  $this->user->trucks()
        ]);
    }

    public function viewTruck($id)
    {
        $truck = Truck::find($id);
        $owner = $this->user;
        return view('admin.truck.view')->with([
            'owner' =>  $owner,
            'truck' =>  $truck
        ]);
    }

    public function showTrucks()
    {
        return view('truck-owner.trucks.trucks');
    }

    public function trackTrucks()
    {
        return view('truck-owner.trucks.track-trucks');
    }

    public function viewLiveBids()
    {
        return view('truck-owner.loads.list');
    }

    public function searchLoads()
    {
        return view('truck-owner.loads.search');
    }
    
    public function viewParticipation()
    {
        return view('truck-owner.loads.list');
    }
    
    public function currentTransactions()
    {
        return view('truck-owner.transactions.current');
    }

    public function transactionHistory()
    {
        return view('truck-owner.transactions.transaction-history');
    }
}

