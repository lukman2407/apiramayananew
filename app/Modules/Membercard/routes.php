<?php

use App\Modules\Membercard\Controllers\Membercard;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1/membercard', 'namespace' => 'App\Modules\Membercard\Controllers', 'middleware' => ['api_token']], function () {

    Route::get('tbl_customer','Membercard@tbl_customer');
    Route::get('tbl_trxsaldokaryawan','Membercard@tbl_trxsaldokaryawan');
   
    // typo, activitiesnya
});