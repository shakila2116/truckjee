<?php

namespace TruckJee\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use TruckJee\Http\Requests;
use TruckJee\Http\Controllers\Controller;
use TruckJee\Models\TruckOwner\Truck;
use TruckJee\User;
use Yajra\Datatables\Datatables;

class TruckOwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showCreate()
    {
        return view('admin.truck-owner.create-owner');
    }

    public function create(Request $request)
    {
        $data = $request->input();
        $validator = $this->validator($data);
        if($validator->fails())
        {
            $errors = (json_decode($validator->errors(),true));
            Session::flash('errors', $errors);
            return redirect()->back()->withInput();
        }
        $this->createNew($data);
        Session::flash('message', "New User has been successfully created ");
        return redirect()->back();
    }


    public function showList()
    {
        return view('admin.truck-owner.list');
    }

    public function showOwner($id)
    {
        $owner = User::findOrFail($id);
        $trucks = Truck::where('owner_id','=',$owner->id)->get();
        return view('admin.truck-owner.view')->with([
            'owner'     =>  $owner,
            'trucks'    =>  $trucks
        ]);
    }



    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required||min:10|unique:users,phone',
        ]);
    }

    protected function createNew(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'tj_id' => $data['phone'],
            'password' => bcrypt($data['phone']),
        ]);
        $user->role = 1;
        $user->tj_id = getOwnerId($user->id);
        $user->save();
    }

}
