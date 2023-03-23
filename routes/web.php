<?php

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

// Route::group(['middleware' => ['api_token'], 'prefix' => 'v1/auth'], function () {
//     Route::get('/signin', [\App\Http\Controllers\API\LoginController::class, 'signin'])->name('signin');
//     Route::post('/reset.password', [\App\Http\Controllers\API\LoginController::class, 'resetpassword'])->name('resetpassword');
// });

Route::get('/', function () {
    return view('welcome');
});


