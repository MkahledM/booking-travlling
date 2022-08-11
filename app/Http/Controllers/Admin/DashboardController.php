<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function registered(){
        $users=User::all();
        return view("admin.register")->with('users',$users);
    }
    public function registeredite(Request $request,$id){

        $users = User::findOrfail($id);
        return view('admin.register-edit')->with('users',$users);
    }
    public function registerupdate(Request $request,$id){

        $users = User::find($id);
        $users->name = $request->input('username');
        $users->role = $request->input('usertype');
        $users->update();
        return redirect('/role-register')->with('status','Your Data Is Update');
    }
    public function registerdelete($id){
        $users = User::findOrfail($id);
        $users->delete();
        return redirect('/role-register')->with('status','Your Data Is deleted');
    }
}
