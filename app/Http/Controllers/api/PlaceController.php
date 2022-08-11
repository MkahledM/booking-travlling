<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $place= Place::all();
        return $place;
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $added =Place::create($request->all());
        if($added){
            return response()->json([
                "msg"=>"Added Place Succusfully"
            ]);
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        // dd($place);
        return $place;
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
 
    public function update(Request $request, Place $place){
        //dd($request);
        $update = $place-> Update($request->all());
        if($updated){
            return response()->json([
                "msg"=>"Update Hotel Succusfully"
            ]);
        }
 
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        $deleted =$place ->delete();
        if($deleted){
            return response()->json([
                "msg"=>"Deleted Place Succusfully"
            ]);
           }
    }
}