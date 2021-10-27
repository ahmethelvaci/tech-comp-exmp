<?php

use App\Phone;
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
    $phones= Phone::all();
    return view('welcome',['phones'=>$phones]);
});

Route::get('/product/{id}', function ($id) {
    $phone = Phone::findOrFail($id);
    return view('productModal',['phone' => $phone]);
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
