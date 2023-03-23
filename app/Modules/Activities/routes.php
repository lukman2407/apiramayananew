<?php

use App\Modules\Activities\Controllers\Activities;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1/activity', 'namespace' => 'App\Modules\Activities\Controllers', 'middleware' => ['api_token']], function () {
   
    Route::get('test', 'Activities@index');
    Route::get('tbl_category', 'Activities@tbl_category');
    // bikin routesnya dulu, mau method get atau post. namanya mau apa.
    Route::get('tbl_divisi','Activities@tbl_divisi');
    Route::get('tbl_user_void_return','Activities@tbl_user_void_return');
    Route::get('tbl_my_log', 'Activities@tbl_my_log');
    Route::post('tbl_commcheck','Activities@tbl_commcheck');
    Route::get('tbl_commcheck_approve','Activities@tbl_commcheck_approve');
    Route::post('updateApproveCommcheck','Activities@updateApproveCommcheck');
   
    // typo, activitiesnya
});
