<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use app\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['api_token'], 'prefix' => 'v1/auth'], function () {
Route::post('/signin', [\App\Http\Controllers\API\LoginController::class, 'signin'])->name('signin');
Route::post('/reset.password', [\App\Http\Controllers\API\LoginController::class, 'resetpassword'])->name('resetpassword');
});


// Route::get('login_laravel',[])
//  Route::get('login', [LoginController::class,'index']);
// Route::get('login', function(){
//     return response()->json("kamalllll");
// });
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
