<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
     public function index()
    {

        $room = Room::all();
        dd($room);
        // return view("hotels.details",["data2"=>$room]);
    }
        // public function index2()
        // {
        //     $room = Room::all();
        //     return view("rooms.curd",["data"=>$room]);
        // }




    public function create()
    {
        $room = Room::all();
        return view('rooms.create');
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'price'=>'required',
            'status'=>'required',
            'type'=>'required',
        ]);
        $room = new Room();

        $room ->price = request("price");

        $room ->status = request("status");
        $room ->type = request("type");
        $room->save();
        return redirect("admin");
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('room.edit', compact('room'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [

        'price'=>'required',

            'status'=>'required',
            'type'=>'required'

            ]);

        $room = Room::findOrFail($id);


        $room->price = $request->price;

        $room->status = $request->status;
        $room->type = $request->type;
        $room->save();
        return redirect("admin");
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect("admin");
    }

}
