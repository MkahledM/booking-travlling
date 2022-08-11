<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Hotel;

use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != ""){
            $place = Place::where('name','LIKE',"%$search%")->get();
        }else{
            $place = Place::all();
        }
        $data= compact('place', 'search');
        return view("places.index",["data"=>$place])->with($data);
    }
    public function index2()
    {
        $place = Place::all();
        return view("places.curdp",["data"=>$place]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $place= Place::all();
        return view ("places.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required',
            // 'price'=>'required',
            'description'=>'required',
            'location'=>'required',
            'name_img'=> 'required'
        ]);

        $place = new Place ;
        $place->name = request("name");
        // $place->price = request("price");
        $place->description = request("description");
        $place->location = request("location");

        $place->name_img = request("name_img");
        // $hotels->user_id = request("user_id");
        $place->save();
        return redirect("admin");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        return view("places.details",["data"=>$place]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        return view("places.edit",["data"=>$place]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)


    {
        $this->validate($request, [
            'name'=> 'required',
            'price'=>'required',
            'description'=>'required',
            'location'=>'required',
            'name_img'=> 'required'
        ]);
        $place->name = request("name");
        // $place->price = request("price");
        $place->description = request("description");
        $place->location = request("location");
        $place->name_img = request("name_img");
        // $hotels->user_id = request("user_id");
        $place->save();
        return redirect("admin");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {

        $place->delete();
        return redirect ("admin");

    }


    public function search(Request $request)
    {
        // $search_text=$_GET['quary'];

    //  $place= Place::where('name','like','%'.$request->input('ttt').'%')->get();
    //  $place= Hotel::where('name','like','%'.$request->input('ttt').'%')->get();
    $res= [];

    $tableONe = Place::where('name','like','%'.$request->input('ttt').'%')->get();

    array_push($res,$tableONe);


    $tableTwo = Hotel::where('name','like','%'.$request->input('ttt').'%')->get();

    array_push($res,$tableTwo);


    return view("user.search",['data'=>$res]);

    }
}
