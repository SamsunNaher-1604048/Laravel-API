<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Usersdata;
use App\Models\User;
use Validator;

class UsersdataController extends Controller
{
    function showdata($id=null){
        if($id==null){
            $data = Usersdata::all();
            return response()->json(['users'=>$data],200);
        }
        else{
            $data = Usersdata::find($id);
            return response()->json(['users'=>$data],200);
        }
    }

    function adddata(Request $req){
        if($req->ismethod('post')){
            $data = $req->all();
            $user = new User();

            // rulrs
            $rules = [
                'name'=>'required',
                'email'=>'requirde|email|unique:user',
                'password'=>'required',
            ];

            $custommessage=[
                'name.required'=>'name is required',
                'email.required'=>'email is required',
                'email.email'=>'emaileee is required',
                'password.required'=>'paddword is required',
            ];
            $validator = Validator::make($data,$rules,$custommessage);
            if($validator->fails()){
                return response()->json($validator->errors(),422);
            }

            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = $req->password;
            $user->save();
            $message = 'user successfully add';
            return response()->json(['message'=>$message],201);
        }

    }

    function userupdate(Request $res,$id){
        if($res->ismethod('put')){
            $data = $res->all();
        }

        $user = User::findOrFail($id);
        $user->name = $res->name;
        $user->password = $res->password;
        $user->save();
        $message = 'user succesfully update';
        return response()->json(['message'=>$message],200);

    }

    function updatesinglerecord(Request $req,$id){
        if($req->ismethod('patch')){
            $data = $req->all();
        }

        $user = User::findOrFail($id);
        $user->password = $req->password;
        $user->save();
        $message = 'user password succesfully update';
        return response()->json(['message'=>$message],200);


    }

  
}
