<?php

namespace App\Modules\Membercard\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transformers\TblCustomerTransformer;
use App\Transformers\TblTrxSaldoKrywnTransformer;


class Membercard extends Controller {
 
    $data = DB::connection('dbprod')->table("dwh.orc_consales")
    ->where("supplier", "=", '0849800051')
    ->where(function($query){
        $query->where("sls_date", "=", '2023-01-08')->orWhere("sls_date", "=", '2023-01-11')->orWhere("sls_date", "=", '2023-01-21');
    })->get();

    // DB::table(", round where_subquery_group_1_ sisa_saldo")
    // ->select("nokartu", "rmy_id", "nama", "notelpon", "email", "saldo as")
    // ->where(DB::raw("customer"))
    // ->get();


    public function tbl_customer(Request $request){ //disini dia ada ambil parameter
        $id_user = $request->input('id_user'); //disini kita kelola parameter nya untuk varibal id_user
\Log::info('iza 333');
        $data = \App\Models\tbl_customer::where('nokartu','%'.$id_user.'%')->..get();  //disni kita kasih kondisi
        \Log::info($data);
        \Log::info('iza 77');
        $response = fractal()
        ->collection($data)
        ->transformWith(new TblCustomerTransformer())
        ->toArray();
        \Log::info('iza 88');
        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data' => $response['data']
        ]);
    }

    public function tbl_trxsaldokaryawan(){
        \Log::info('iza 444');
                $data = \App\Models\tbl_trxsaldokaryawan::get();
                \Log::info($data);
                \Log::info('iza 77');
                $response = fractal()
                ->collection($data)
                ->transformWith(new TblTrxSaldoKrywnTransformer())
                ->toArray();
                \Log::info('iza 88');
                return response()->json([
                    'status' => 200,
                    'message' => 'Success',
                    'data' => $response['data']
                ]);
            }
   
}