<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\StatisticalController;
use App\Http\Controllers\SuKienController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VeController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
  routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Home
Route::get('/', [HomeController::class, 'trangchu'])->name('trangchu');

//Login
Route::get('/login', [HomeController::class, 'login'])->name('login.user');
Route::post('/check', [HomeController::class, 'check'])->name('login.check');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

//Register
Route::get('/register', [HomeController::class, 'register'])->name('register.user');
Route::post('/store', [HomeController::class, 'store'])->name('register.store');

Route::get('/forgot_password', [HomeController::class, 'getEmail']);
Route::post('/forgot_password', [HomeController::class, 'postEmail'])->name('forgot_password');;

// Facebook
Route::get('login/facebook', [HomeController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [HomeController::class, 'handleFacebookCallback']);

// Google
Route::get('login/google', [HomeController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [HomeController::class, 'handleGoogleCallback']);

//Detail Event
Route::get('detail_event/{id}', [SuKienController::class, 'getDetailEvent']);

//Checkout Tickket
Route::get('checkout_ticket/{id}', [KhachHangController::class, 'getThem'])->name('getcheckout_ticket');
Route::post('checkout_ticket/{id}', [KhachHangController::class, 'postThem'])->name('checkout_ticket');

Route::prefix('/')->middleware(['userLogin', 'checkLogin'])->group(function () {

    Route::get('nav', [HomeController::class, 'nav'])->name('nav');

    //Profile
    Route::get('profile/{id}', [HomeController::class, 'edit']);
    Route::put('profile/{id}', [HomeController::class, 'update']);

    //Event_of_me
    Route::get('event_of_me/{id}', [SuKienController::class, 'getDanhSach']);

    //Insert Event
    Route::get('insert_event/{id}', [SuKienController::class, 'getThem']);
    Route::post('insert_event/{id}', [SuKienController::class, 'postThem'])->name('insert_event');

    //Edit Event
    Route::get('edit_event/{id}', [SuKienController::class, 'getSua'])->name('edit_event');
    Route::post('edit_event/{id}', [SuKienController::class, 'postSua']);

    //Checkin Event
    Route::get('checkin_event/{id}', [VeController::class, 'getListSuKien'])->name('checkin_event');
    Route::get('checkin/{id_khach}/{id}', [VeController::class, 'getCheckIn']);

    //List Event Register
    Route::get('list_event_register', [VeController::class, 'filterListTicket'])->name('list_event_register');
    Route::get('payment_status/{id_khach}/{id}', [VeController::class, 'PaymentStatus']);

    //Show Ticket
    Route::get('show_ticket/{id}', [VeController::class, 'getListTicket'])->name('show_ticket');

    //Insert Ticket
    Route::get('insert_ticket/{id}', [VeController::class, 'getTicket']);
    Route::post('insert_ticket/{id}', [VeController::class, 'postTicket'])->name('insert_ticket');

    //Update Ticket
    Route::get('update_ticket/{id}', [VeController::class, 'getUpdateTicket'])->name('show_update_ticket');
    Route::post('update_ticket/{id}', [VeController::class, 'postUpdateTicket'])->name('update_ticket');

    //Statistical
    Route::get('statistical/{id}', [StatisticalController::class, 'statistical'])->name('statistical');

    //Schedule
    Route::get('schedule/{id}', [SuKienController::class, 'schedule'])->name('schedule');

    //Permission
    Route::get('permission', [SuKienController::class, 'permission'])->name('permission');

});
