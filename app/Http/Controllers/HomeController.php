<?php

namespace App\Http\Controllers;
use App\Models\Hotel;
use App\Models\Place;
use App\Models\Comment;



use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $comment= Comment::all();

        return redirect('user.home',["data"=>$comment]);
    }

    public function adminHome()
    {
        $hotel=Hotel::all();
        $place=Place::all();
        return view('admin.curd2',["data"=>$hotel,"data2"=>$place]);
    }
}
