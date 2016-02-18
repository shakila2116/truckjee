<?php

namespace TruckJee\Http\Controllers\Admin;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use TruckJee\Http\Requests;
use TruckJee\Http\Controllers\Controller;
use TruckJee\Models\TruckOwner\UserDetails;
use TruckJee\User;

class TransporterController extends Controller
{
    public function showCreateTransporter()
    {
        return view('admin.transporter.create');
    }

    public function createTransporter(Request $request)
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
        return redirect('admin/transporter/'.$userId.'/add-personal');
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
        $user->role = 2;
        $user->tj_id = getTransporterId($user->id);
        $user->save();
        return $user->id;
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required||min:10|unique:users,phone',
        ]);
    }

    public function showAddPersonal($id)
    {
        return view('admin.transporter.add-personal')->with([
            'owner' =>  User::findOrFail($id)
        ]);
    }

    public function addPersonal(Request $request)
    {
        $docs = ['id_proof','company_proof'];
        $input = $request->input();
        try{
            $userDetails = new UserDetails($input);
            foreach($docs as $doc)
            {
                if($request->hasFile($doc))
                {
                    $userDetails->$doc = $this->addFileToUser($doc ,$request->file($doc), $userDetails->user_id);
                }
            }
            $userDetails->save();
            return redirect('admin/transporter/'.$input['user_id'].'/view');
        }catch(QueryException $e)
        {
            Session::flash('message','Cannot add details');
            return redirect()->back()->withInput();
        }

    }

    public function addFileToUser($doc, UploadedFile $file, $userId)
    {
        $baseDir = 'users/'.getTransporterId($userId) ;
        $extn = $file->getClientOriginalExtension();
        $filename = $doc.'.'.$extn;
        $file->move($baseDir, $filename);
        return ($baseDir.'/'.$filename);
    }
    
    public function showTransporter($id)
    {
        $transporter = User::findOrFail($id);
        $detail = $transporter->getDetails()->first();
        return view('admin.transporter.view')->with([
            'transporter'     =>  $transporter,
            'detail'          =>  $detail
        ]);
    }

    public function showList()
    {
        return view('admin.transporter.list');
    }
}
