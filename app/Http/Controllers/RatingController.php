<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rating = Rating::where('rating')->count();
        return view("hotels.index",["data2"=>$rating]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    public function add(Request $request)
    {
        $rating= new Rating;
        $rating->rating= $request->input('product_raing');
        // dd($rating);
        $rating->user_id= auth()->user()->id;
        $rating->hotel_id= request('hotel_id');
        $rating->save();
        return redirect('hotel');

    }
}
