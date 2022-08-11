<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $hotel=Hotel::all();
        return $hotel;
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
         //    dd($request);
         if ($added){
            return response()->json([
                "msg"=>"Added Hotel Succusfully"   
            ]);
         }
 
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
 
     public function show(Hotel $hotel)
     {
        //dd($hotel);
        return $hotel;
     }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        //dd($request);
        $update= $hotel-> update($request->all());
        if ($update){
            return response()->json([
                "msg"=>"Update Hotel Succusfully"
            ]);
        }
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $deleted= $hotel->delete();
        if ($deleted){
            return response()->json([
                "msg"=>"Deleted Hotel Succusfully"
            ]);
        }
    }
}