<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('master.dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/redirects');
})->name('dashboard');

Route::get('/redirects',[IndexController::class,'index']);

//------------------------------------user------------------------------------------------//
// ::::::::::::::::::::::::::::::::::: Pembelian Pengguna ::::::::::::::::::::::::::::::::::::: //
// beli didashboard
Route::post('redirects',[UserController::class,'orderstore']);
// keranjang pembelian user
Route::get('redirects/keranjang',[UserController::class,'keranjang']);
Route::post('redirects/keranjang',[UserController::class,'storekeranjang']);
Route::delete('redirects/keranjang',[UserController::class,'destroykeranjang']);
//materi users
Route::get('redirects/{id}/kelas',[UserController::class,'kelas']);
Route::get('redirects/{id}/exams',[UserController::class,'exams']); 