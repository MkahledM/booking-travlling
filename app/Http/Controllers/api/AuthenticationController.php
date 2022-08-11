<?php

namespace App\Http\Controllers\api;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    
    public function createUser(Request $request){
        // dd($request);
        $userData = $request->validate([
            "name"=>"required | string ",
            "email"=>"required | string | email | unique:users,email",
            "phone"=> "required | string",
            "password"=> "required | string | min:6 | confirmed"
        ]);
        // dd($userData);
 
        $user =User::create([
            "name"=>$userData["name"],
            "email"=>$userData["email"],
            "phone"=>$userData["phone"],
            "password"=>bcrypt ($userData["password"]),
 
        ]);
        // dd($user);
 
        if ($user){
            return response()->json([
                "msg"=>"Create User Succusfully",
                "token"=>$user->createToken("token")->plainTextToken
            ]);
        }
    }
 
    public function signin(Request $request){
        // dd($request);
 
        $userData = $request->validate([
            "email"=>"required | string | email",
            "password"=> "required | string | min:6 "
        ]);
        // dd($userData);
 
       
        if (!auth()->attempt($request->only("email","password"))){
            return response()->json([
                "msg"=>"invalid Data",
            ]);
        }
 
        $user = User::where("email", $userData["email"])->firstOrFail();
        $token = $user->createToken("token")->plainTextToken;
        
        if ($userData){
            return response()->json([
                "msg"=>"login Succusfully",
                "token"=>$user->createToken("token")->plainTextToken
            ]);
        }
    }
}