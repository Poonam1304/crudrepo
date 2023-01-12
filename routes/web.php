<?php

use App\Http\Controllers\Admin\Authcontroller;
use App\Http\Controllers\Admin\UserlistController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
//dashboard

Route::get('/', [LoginController::class, 'AdminLogin'])->name('Admin');


// Route::group(['middleware'=>'web'],function(){


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/login',[Authcontroller::class,'getLogin'] )->name('getLogin');
Route::post('/admin/login',[Authcontroller::class,'postLogin'] )->name('postLogin');
Route::get('/admin/dashboard',[Authcontroller::class,'dashboard'] )->name('dashboard');
Route::get('/admin/dashboard',[Authcontroller::class,'dashboard'] )->name('dashboard');

// Route::get('/admin/users',[Authcontroller::class,'userlist'] )->name('users');
Route::get('/admin/logout',[Authcontroller::class,'logout'] )->name('logouts');
// Route::get('/admin/Userlist',[UserlistController::class,'Userlist'] )->name('Userlist');
Route::get('users', [UserlistController::class, 'index'])->name('users');

Route::get('/search', [UserlistController::class, 'search'])->name('search');
Route::get('/simplesearch', [UserlistController::class, 'searchdata'])->name('searchdata');
Route::get('/addUser', [UserlistController::class, 'getaddform'])->name('getaddform');
Route::get('/edituser/{id}', [UserlistController::class, 'edituser'])->name('edituser');
Route::post('/updateuser/{id}', [UserlistController::class, 'updateuser'])->name('updateuser');

Route::post('/storeUser', [UserlistController::class, 'storeuser'])->name('storeuser');


Route::get('/termsconditions', [UserlistController::class, 'terms'])->name('termsconditions');
Route::post('/Post/terms', [UserlistController::class, 'postTerms'])->name('postTerms');
Route::post('/delete', [UserlistController::class, 'delete'])->name('delete');

Route::get('stripe', [StripePaymentController::class, 'stripe']);
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');


Auth::routes();


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
