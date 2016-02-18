<?php

namespace TruckJee\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use TruckJee\Http\Requests;
use TruckJee\Http\Controllers\Controller;
use TruckJee\Models\TruckOwner\Truck;
use TruckJee\Models\TruckOwner\UserDetails;
use TruckJee\User;


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
        $userId = $this->createNew($data);
        Session::flash('message', "New User has been successfully created ");
        return redirect('admin/truck-owner/'.$userId.'/add-personal');
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
        return $user->id;
    }

    public function showAddPersonal($id)
    {
        return view('admin.truck-owner.add-personal')->with([
            'owner' =>  User::findOrFail($id)
        ]);
    }

    public function addPersonal(Request $request)
    {
        $docs = ['id_proof','company_proof'];
        $input = $request->input();
        $userDetails = new UserDetails($input);
        foreach($docs as $doc)
        {
            if($request->hasFile($doc))
            {
                $userDetails->$doc = $this->addFileToUser($doc ,$request->file($doc), $userDetails->user_id);
            }
        }
        $userDetails->save();
        return redirect('admin/truck-owner/'.$input['user_id'].'/view');
    }

    public function addFileToUser($doc, UploadedFile $file, $userId)
    {
        $baseDir = 'users/'.$userId ;
        $extn = $file->getClientOriginalExtension();
        $filename = $doc.'.'.$extn;
        $file->move($baseDir, $filename);
        return ($baseDir.'/'.$filename);
    }


}
