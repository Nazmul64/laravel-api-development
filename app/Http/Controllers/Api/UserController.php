<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
   public function showUser($id=null){
      if($id==''){
         $users=User::get();
         return response()->json(['users'=>$users]);
      }else{
        $users=User::find($id);
        return response()->json(['users'=>$users]);
      }
   }
public function addusers(Request $request){
    if($request->isMethod('post')){
        $data=$request->all();

        $roles =[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ];

        $customMessages=[
            'name.required'=>'name is required',
            'email.required'=>'email is required',
            'password.required'=>'password is required',
        ];

        $validator = Validator::make($data, $roles, $customMessages);
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $user=new User();
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->password=bcrypt($data['password']);
        $user->save();
    }
}

public function addmultipleusers(Request $request){
    if($request->isMethod('post')){
        $data=$request->all();

        $roles =[
            'users.*.name'=>'required',
            'users.*.email'=>'required',
            'users.*.password'=>'required',
        ];

        $customMessages=[
            'users.*.name.required'=>'name is required',
            'users.*.email.required'=>'email is required',
            'users.*.password.required'=>'password is required',
        ];

        $validator = Validator::make($data, $roles, $customMessages);
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
      foreach($data['users'] as $adduser){

        $user=new User();
        $user->name=$adduser['name'];
        $user->email=$adduser['email'];
        $user->password=bcrypt($adduser['password']);
        $message="User Successfully Added";
        $user->save();
      }
      return response()->json(['message'=>$message],422);
    }
}

}
