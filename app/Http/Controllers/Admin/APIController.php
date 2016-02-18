<?php

namespace TruckJee\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use TruckJee\Http\Requests;
use TruckJee\Http\Controllers\Controller;
use TruckJee\Models\TruckOwner\TruckModel;
use TruckJee\Models\TruckOwner\TruckModelDetails;
use TruckJee\User;
use Yajra\Datatables\Datatables;

class APIController extends Controller
{
    public function getOwners()
    {
        $users = User::Owners()->get();
        return Datatables::of($users)
            ->addColumn('actions', function ($data) {
                return  "<a class='btn btn-xs btn-success' href='/admin/truck-owner/$data->id/view/'>View</a>"." ".
                "<a class='btn btn-xs btn-danger' href='/admin/truck/$data->id/create'>Add Truck</a>";
            })
            ->removeColumn('role')
            ->removeColumn('id')
            ->removeColumn('created_at')
            ->removeColumn('updated_at')
            ->make(true);
    }

    public function getTransporters()
    {
        $users = User::Transporters()->get();
        return Datatables::of($users)
            ->addColumn('actions', function ($data) {
                return  "<a class='btn btn-xs btn-success' href='/admin/transporter/$data->id/view/'>View</a>";
            })
            ->removeColumn('role')
            ->removeColumn('id')
            ->removeColumn('created_at')
            ->removeColumn('updated_at')
            ->make(true);
    }

    public function getTrucks()
    {
        $res = DB::table('users')
            ->join('trucks','users.id','=','trucks.owner_id')
            ->select('trucks.id','users.name','trucks.truck_id','trucks.truck_number','trucks.short_form','trucks.imei');
        return Datatables::of($res)
            ->addColumn('actions', function ($data) {
                return  "<a class='btn btn-xs btn-success' href='/admin/truck/$data->id/view/'>View</a>";
            })
            ->editColumn('search_term_id','{{ getSearchTerm($id) }}')
            ->editColumn('model_id','{{ getModelInfo($id) }}')
            ->removeColumn('id')
            ->make(true);
    }

    public function getTruckModels()
    {
        $query = Input::get('q');

        return Response::json(array(
            'data'=>TruckModel::where('search_term','like',"%". $query ."%")
                ->get()
        ));
    }
    
    public function getTruckModelDetails()
    {
        $query = Input::get('q');
        return Response::json(array(
            'data'=>TruckModelDetails::where('search_term_id','=',$query)
                ->get()
        ));
    }
}
