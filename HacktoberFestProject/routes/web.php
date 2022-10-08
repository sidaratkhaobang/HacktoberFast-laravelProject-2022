<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Select2Controller;


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
//Util Select2
Route::get('select2/provinces', [Select2Controller::class, 'getProvinces'])->name('select2.provinces');

Route::get('/', function () {
    return view('profiles.index');
});
Route::resource('profiles', ProfileController::class);




