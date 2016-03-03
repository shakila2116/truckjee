<?php

namespace TruckJee\Http\Controllers\Owner;

use Illuminate\Http\Request;

use TruckJee\Http\Requests;
use TruckJee\Http\Controllers\Controller;

class AuctionController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('truckowner');
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->getEligibleTrucks();
    }

    public function getEligibleTrucks()
    {
        $trucks = $this->user->trucks();
        dd($trucks);
    }
}
