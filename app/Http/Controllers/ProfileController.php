<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Hotel;

class ProfileController extends Controller
{
    public function index(){
        return view('user.profile');
    }

    public function show($id){
        $user = User::findOrFail($id)->where('user_id', auth()->user()->id)->get();
        return view ('user.profile',[
            'user'=>$user,
        ]);
    }

    public function show2($id )
    {
        $book = Hotel::findorfail($id);
        dd($book);
        return view("user.profile",["data"=>$book] );
    }
}
