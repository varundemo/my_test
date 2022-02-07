<?php

use App\Http\Controllers\MediaController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('add-image',[MediaController::class,'insert'])->name('add-image');
Route::post('add-image',[MediaController::class,'store']);
Route::post('delete-img/{id}',[MediaController::class,'delimg'])->name('delete-img');
