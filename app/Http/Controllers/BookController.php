<?php

namespace App\Http\Controllers;


use App\Models\Hotel;
use App\Models\User;
use App\Models\Room;
use App\Models\Place;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $book= Book::all();
        $book= Book::where('user_id', auth()->user()->id)->get();

        // $book= Book::where('user_id','like','%'.Auth::user()->id.'%')->get();

        return view("books.index",["data"=>$book]);

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'arive'=>'required',
            'leave'=>'required',
            'days'=> 'required',
            'total'=> 'required'
        ]);
        $book = new Book ;
        $book->name = request("name");
        $book->price = request("price");
        $book->name_img = request("name_img");
        $book->arive = request("arive");
        $book->leave = request("leave");
        $book->days = request("days");
        $book->total = request("total");
        $book ->user_id = auth()->user()->id;
         $book->room = request("room");
           


        
        
       



        // $hotels->user_id = request("user_id");
        $book->save();
        return redirect ("book");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id )
    {
        $book = Hotel::findorfail($id);
        $room = Room::findOrFail($id);
        $sRooms =Room::where("hotel_id",$id)->where("type","single")->get();
        $dRooms =Room::where("hotel_id",$id)->where("type","double")->get();
        $types = ["single","double"];
        // $Rooms = Room::where("hotel_id",$id)->get();

        return view("books.booking",["data"=>$book, "srooms"=>$sRooms,"drooms"=>$dRooms, "types"=>$types, "room"=>$room ,]);
    }
    public function show3($id)
    {
        $book = Hotel::findorfail($id);
        $room = Room::findOrFail($id);
        $sRooms =Room::where("hotel_id",$id)->where("type","single")->get();
        $dRooms =Room::where("hotel_id",$id)->where("type","double")->get();
        $types = ["single","double"];
        // $Rooms = Room::where("hotel_id",$id)->get();

        return view("books.edit",["data"=>$book, "srooms"=>$sRooms,"drooms"=>$dRooms, "types"=>$types, "room"=>$room ,]);
    }

    public function show2( $id){
        $book = Place::findorfail($id);
        return view("books.placeb", ["data"=>$book] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit( Book $book )
    {
    
    
        
        $book = Book::where("user_id", auth()->user()->id);
        dd($book);
        $room = Room::findOrFail($id);
        $sRooms =Room::where("hotel_id",$id)->where("type","single")->get();
        $dRooms =Room::where("hotel_id",$id)->where("type","double")->get();
        $types = ["single","double"];
        // $Rooms = Room::where("hotel_id",$id)->get();

        return view("books.edit",["data"=>$book, "srooms"=>$sRooms,"drooms"=>$dRooms, "types"=>$types, "room"=>$room ,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'arive'=>'required',
            'leave'=>'required',
            'days'=> 'required',
            'total'=> 'required'
        ]);
        $book = new Book ;
        $book->name = request("name");
        $book->price = request("price");
        $book->name_img = request("name_img");
        $book->arive = request("arive");
        $book->leave = request("leave");
        $book->days = request("days");
        $book->total = request("total");
        $book ->user_id = auth()->user()->id;
         $book->room = request("room");
           


        
        
       



        // $hotels->user_id = request("user_id");
        $book->save();
        return redirect ("book");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route("book.index");

    }
}
