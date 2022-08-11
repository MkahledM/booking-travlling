<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Book;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendMail(){
        $details=[
            'user' => User::where('id','like','%'. auth()->user()->id.'%')->get(),
            'book' =>Book::where('user_id','like','%'.auth()->user()->id.'%')->get(),
        ];

        Mail::to('mostafaeltawel123@gmail.com')->send(new TestMail($details));
        return redirect('book')->with('alert', 'will conect with you by phone or email and your booking  confirm');

            }
}
