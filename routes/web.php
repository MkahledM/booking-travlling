<?php
use App\Models\User;
use App\Models\Book;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
//use App\Htpp\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RatingController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\MailController;

use App\Http\Controllers\papPalcontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

*/



Route::get('/', [SartController::class,'index']);



// routes for user
Route::middleware(['auth', 'user-access:user'])->group(function () {
Route::get('start', [SartController::class,'index'])->name('home');
Route::resource('hotel', HotelController::class)->except(['edit', 'udpate','destroy']);
Route::resource('place', PlaceController::class)->except(['edit', 'udpate','destroy']);
Route::resource('comment', CommentController::class);
Route::resource('book', BookController::class);
Route::get('/show/{id}', [BookController::class,'show2']);
Route::get('showb/{id}', [BookController::class,'show3']);

Route::resource('contact', ContactController::class)->except(['show','udpate','destroy','create']);
Route::resource('contact', ContactController::class);
Route::get('send-mail', [MailController::class,'sendMail']);
Route::get('/profile', [UserController::class,'index'])->name('profile-settings');
Route::resource('/add.rating', RatingController::class);
Route::post('/add.rating', [RatingController::class, 'add']);
});

Route::get('go-payment', [PapPalController::class, 'goPayment'])->name('payment.go');

Route::get('payment',[PapPalController::class, 'payment'])->name('payment');
Route::get('cancel',[PapPalController::class, 'cancel'])->name('payment.cancel');
Route::get('payment/success', [PapPalController::class, 'success'])->name('payment.success');

// routes for admin

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('hotel.curd');
    Route::resource('admin', AdminController::class);
    Route::resource('hotel', HotelController::class)->except(['index', 'show',]);
    Route::resource('place', PlaceController::class)->except(['index', 'show',]);
    Route::resource('contact', ContactController::class)->except(['index','store' ]);
    Route::get('/placeadmin', [AdminController::class,'index2']);
    Route::get('/contactadmin', [AdminController::class,'index3']);
    Route::get('/custplace', [AdminController::class,'index4']);
    Route::get('/custhotel', [AdminController::class,'index5']);
    Route::get('/role-register', [dashboardController::class,'registered']);
    Route::get('/role-edit/{id}', [dashboardController::class,'registeredite']);
    Route::put('/role-register-update/{id}', [dashboardController::class,'registerupdate']);
    Route::delete('/role-delete/{id}', [dashboardController::class,'registerdelete']);





});


Auth::routes();


