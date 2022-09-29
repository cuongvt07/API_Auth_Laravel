<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function register()
    {
        return view('register');
    }

    public function registerAPI(Request $request)
    {
        $validator =Validator::make($request->all(),[
            'name' =>'required',
            'email' =>'required|string|email|unique:users',
            'password' =>'required|string|confirmed|min:6'
        ]);

        if($validator->fails()){
             return response()->json($validator->errors()->toJson(),400);
             return view('home');
        }
        $user=User::create(array_merge(
            $validator->validated(),
            ['password'=>bcrypt($request->password)]
        ));
            return redirect()->route('login');
    }

    public function login()
    {
        return view('login');
    }
    public function loginAPI(Request $request)
    {
        $validator =Validator::make($request->all(),[
            'email' =>'required|string|email',
            'password' =>'required|string|min:6'
        ]);

        if($validator->fails()){
             return response()->json($validator->error(),422);
        }
        if(!$token=auth()->attempt($validator->validated())){
            return  response()->json(['error' =>'Unauthorized'],401);
        }
        return view('welcome');

    }
}
