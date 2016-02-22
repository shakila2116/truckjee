<?php

namespace TruckJee\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use TruckJee\Http\Requests;
use TruckJee\Http\Controllers\Controller;
use TruckJee\User;
use TruckJee\Models\TruckOwner\Truck;
class TruckController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * @param $owner_id
     * @return $this
     */
    public function showCreateTruck($owner_id)
    {

        $owner = User::findOrFail($owner_id);
        $trucks = Truck::where('owner_id','=',$owner_id)->get();

        return view('admin.truck.create')->with([
            'owner'     =>$owner,
            'trucks'    =>$trucks
        ]);
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function createTruck(Request $request)
    {
        $docs = ['rc', 'insurance', 'np', 'pollution', 'authorization'];
        $validator = $this->validator($request->input());
        if($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        $truck = $this->create($request->input());
        $truck->truck_id    = getTruckId($truck->id);
        $truck->status      = 0;
        foreach($docs as $doc)
        {
            if($request->hasFile($doc))
            {
                $truck->$doc = $this->addFileToTruck($doc ,$request->file($doc), $truck->id);
            }
        }
        $truck->save();
        Session::flash('message','Success! Truck created with ID '.getTruckId($truck->id));
        return redirect()->back();
    }


    /**
     * @param $doc
     * @param UploadedFile $file
     * @param $truckId
     * @return string
     */
    protected function addFileToTruck($doc, UploadedFile $file, $truckId)
    {
        $baseDir = 'trucks/'.getTruckId($truckId);
        $extn = $file->getClientOriginalExtension();
        $filename = $doc.'.'.$extn;
        $file->move($baseDir, $filename);
        return ($baseDir.'/'.$filename);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'truck_number'  =>  'required|unique:trucks,truck_number',
            'short_form'    =>  'required',
            'owner_id'      =>  'required',
            'imei'          =>  'required|unique:trucks,imei',
            'model_id'      =>  'required',
            'search_term_id'      =>  'required'
        ]);
    }


    /**
     *
     * @param array $data
     * @return static
     */
    protected function create(array $data)
    {
        return Truck::create([
            'truck_number'  =>  $data['truck_number'],
            'short_form'    =>  $data['short_form'],
            'model_id'      =>  $data['model_id'],
            'search_term_id'      =>  $data['search_term_id'],
            'owner_id'      =>  $data['owner_id'],
            'imei'          =>  $data['imei']
        ]);
    }

    public function listTrucks()
    {
        return view('admin.truck.list');
    }

    public function view($id)
    {
        $truck = Truck::find($id);

        $owner = User::find($truck->owner_id);
        return view('admin.truck.view')->with([
            'owner' =>  $owner,
            'truck' =>  $truck
        ]);
    }

}
