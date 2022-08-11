<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Book;
use App\Models\Room;

use Illuminate\Http\Request;

class HotelController extends Controller
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

            $hotel = Hotel::where('name', 'LIKE', "%$search%")->get();

        }else{
            $hotel = Hotel::all();
        }
        $data = compact('hotel', 'search');
        return view("hotels.index",["data"=>$hotel])->with($data);
    }

    public function index2()
    {
        $hotel = Hotel::all();
        return view("hotels.curd",["data2"=>$hotel]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotel= Hotel::all();
        return view ("hotels.create");
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
            'price'=>'required',
            'description'=>'required',
            'location'=>'required',
            'name_img'=> 'required'
        ]);

        $hotel = new Hotel ;
    $hotel->name = request("name");
    $hotel->price = request("price");
    $hotel->description = request("description");
    $hotel->location = request("location");
    $hotel->rate = request("rate");

    $hotel->name_img = request("name_img");

    // $hotels->user_id = request("user_id");
    $hotel->save();
    return redirect("admin");
    }

//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Models\Hotel  $hotel
//      * @return \Illuminate\Http\Response
//      */
public function show(Hotel $hotel)
    {

        $Rooms = Room::where("hotel_id", $hotel->id)->count();
        $available = Room::where("hotel_id", $hotel->id)->where("status", "available")->count();
        // $Room = Room::where("hotel_id", $hotel->id)->get();



    return view("hotels.details",["data"=>$hotel ,"Rooms"=>$Rooms , "available"=>$available ,]);


    }
    // public function show(Hotel $hotel)
    // {
    //     // dd($hotel);
    // return view("books.show",["data"=>$hotel]);

    // }




// // findorfail($id);


//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Models\Hotel  $hotel
//      * @return \Illuminate\Http\Response
//      */
    public function edit(Hotel $hotel)
    {
      return view('hotels.edit',["data"=>$hotel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $this->validate($request, [
            'name'=> 'required',
            'price'=>'required',
            'description'=>'required',
            'location'=>'required',
            'name_img'=> 'required'
        ]);


        $hotel->name = request("name");
        $hotel->price = request("price");
        $hotel->description = request("description");
        $hotel->location = request("location");
        $hotel->name_img = request("name_img");
        // $hotel->name_img2 = request("name_img2");
        // $hotel->name_img3 = request("name_img3");
        // $hotels->user_id = request("user_id");
        $hotel->save();
        return redirect ("admin");
      }

    /**
      * Remove the specified resource from storage.
   *
     * @param  \App\Models\Hotel  $hotel
  * @return \Illuminate\Http\Response
      */
    public function destroy(Hotel $hotel , Book $book)
    {
        $book2=Book::where("name",$book->name);
        $hotel2=Hotel::where('name',$hotel->name);
        if($hotel2==$book2){
            return redirect('admin')->with('alert' , 'cant delete hotel');
        }else{
            $hotel->delete();
        return redirect("admin");
        }
        

    }

}
