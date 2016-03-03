<?php

namespace TruckJee\Http\Controllers\Transporter;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Event;
use Illuminate\Support\Facades\Log;
use TruckJee\Events\RequirementCreated;
use TruckJee\Http\Requests;
use TruckJee\Http\Controllers\Controller;
use TruckJee\Models\Transporter\CargoDetails;
use TruckJee\Models\Transporter\Location;
use TruckJee\Models\Transporter\PaymentDetails;
use TruckJee\Models\Transporter\Requirement;


class RequirementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('transporter');
        parent::__construct();
    }

    /**
     * Get method to view the create requirement form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('transporter.requirement.create');
    }

    /**
     * Post method used by form at transporter/requirement/create to create a requirement
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(Request $request)
    {
        try
        {
            $requirement = $this->createRequirement($request);
            Log::info('User '. $this->user->id . '.' .$this->user->name .' created a requirement with ID '. $requirement->id);
            event(new RequirementCreated($requirement));
            alert()->success("Requirement created successfully!", "Success")->persistent("Ok");
        }
        catch(\Exception $e)
        {
            alert()->warning("Requirement could not be created.","Oh no!")->persistent("Ok");
            $requirement->delete();
            Log::warning($e);
        }
        return redirect()->back();

    }

    /**
     * Create a requirement object, get json objects from cargodetails, payment and location and save.
     *
     * @param Request $request
     * @return Requirement
     */
    public function createRequirement(Request $request)
    {
        $data = $request->input();
        $data['user_id'] = $this->user->id;
        $transit_time = Carbon::parse($data['date_delivery'])->diffInDays(Carbon::parse($data['date_required']));
        Log::info('User '. $this->user->id . $this->user->name .' attempts to create a requirement');
        return Requirement::create([
            'user_id'           =>  $data['user_id'],
            'truck_type'        =>  $data['truck_type'],
            'source'            =>  new Location($request->input(),"source"),
            'source_locality'   =>  $data['source_locality'],
            'source_district'   =>  $data['source_level_2'],
            'destination'       =>  new Location($request->input(), "destination"),
            'destination_locality'  =>  $data['destination_locality'],
            'destination_district'  =>  $data['destination_level_2'],
            'date_required'     =>  Carbon::parse($data['date_required']),
            'date_delivery'     =>  Carbon::parse($data['date_delivery']),
            'cargo_details'     =>  new CargoDetails($request->input()),
            'transit_time'      =>  $transit_time < 1? 1 : $transit_time,
            'payment_details'   =>  new PaymentDetails($request->input()),
            'valid_till'        =>  Carbon::now()->addMinutes(30),
        ]);

    }

    /**
     * View the requirement with an ID
     *
     * @param $id
     * @return mixed
     */
    public function view($id)
    {
        Log::info('User '. $this->user->id . '.' .$this->user->name .' requested to view the requirement with ID '. $id);
        return Requirement::findOrFail($id);
    }

    public function listRequirement()
    {
        return $this->user->openRequirements();
    }
}
