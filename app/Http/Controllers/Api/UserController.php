<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function create(Request $request){
       
        $data = $request->validate([
            'full_name'=>'required',
            'email'=>'required|unique:users',
        ]);
        $userData = User::create($data);
        if($userData){
            // return response()->json(array('users'=>$userData),200);
            return response()->json(['success' => 'success', 200]);

        }else{
            // return response()->json(array('error'=>'Somthing went wrong'),401);
            return response()->json(['error' => 'Somthing went wrong', 401]);

        }

    } 
    public function getUser(){
       
        $userData = User::orderBy('id', 'DESC')->get();
        if($userData){
            return response()->json(array('users'=>$userData),200);
        }else{
            return response()->json(array('error'=>'Somthing went wrong'),401);
        }

    }
}
