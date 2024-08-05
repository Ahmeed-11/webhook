<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/home', [HomeController::class,'home'])->name('redirects');
Route::post('addcard/{id}', [HomeController::class,'addcard']);
Route::get('showcart/{id}', [HomeController::class,'showcart']);
Route::get('remove/{id}', [HomeController::class,'remove']);
Route::post('orderconfirm', [HomeController::class,'orderconfirm']);



Route::get('/users', [AdminController::class,'user']);
Route::get('/deleteuser/{id}', [AdminController::class,'deleteuser']);
Route::get('/foodmenu', [AdminController::class,'foodmenu']);
Route::post('/uploadfood', [AdminController::class,'uploadfood']);
Route::get('/deletemenu/{id}', [AdminController::class,'deletemenu']);
Route::get('/updateview/{id}',[AdminController::class,'updateview']);
Route::post('/updatemenu/{id}', [AdminController::class,'updatemenu']);
Route::post('reservation', [AdminController::class,'reservation']);
Route::get('viewreservation', [AdminController::class,'viewreservation']);
Route::get('viewchef', [AdminController::class,'viewchef']);
Route::post('uploadchef', [AdminController::class,'uploadchef']);
Route::get('deletechef/{id}', [AdminController::class,'deletechef']);
Route::get('updatechef/{id}', [AdminController::class,'updatechef']);
Route::post('updatefoodchef/{id}', [AdminController::class,'updatefoodchef']);
Route::get('orders', [AdminController::class,'orders']);





Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


});



