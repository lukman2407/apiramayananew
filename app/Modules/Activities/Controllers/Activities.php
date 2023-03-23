<?php

namespace App\Modules\Activities\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transformers\TblCommcheckTransformer;
use App\Transformers\TblCategoryTransformer;
use App\Transformers\TblDivisiTransformer;
use App\Transformers\TblMyLogTransformer;
use App\Transformers\TblUserVoidTransformer;

class Activities extends Controller {

    public function index(Request $request)
    {
        $data = \App\Models\master_user::all();
        dd('aw',$data);
    }

    public function tbl_category(Request $request)
    {
        $category = ['PO','SO'];
        $data = \App\Models\tbl_category::whereIn('category',$category)->get();
        
        $response = fractal()
            ->collection($data) //ini untuk yang GET
            ->transformWith(new TblCategoryTransformer())
            ->toArray();

        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data' => $response['data']
        ]);
    }




    // kalau routesnya udah, next bikin functionnya disini zaa. samplenya mirip tbl_category
    public function tbl_divisi(Request $request)
   
    {
        \Log::info('iza 99');
        $data = \App\Models\tbl_divisi::get();
        $response = fractal()
        ->collection($data)
        ->transformWith(new TblDivisiTransformer())
        ->toArray();       

        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data'=>$response['data']
        ]);
    }

    public function tbl_user_void_return(){
\Log::info('iza 333');
        $data = \App\Models\tbl_user_void_return::get();
        \Log::info($data);
        \Log::info('iza 77');
        $response = fractal()
        ->collection($data)
        ->transformWith(new TblUserVoidTransformer())
        ->toArray();
        \Log::info('iza 88');
        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data' => $response['data']
        ]);
    }

    public function tbl_my_log(Request $request)
    {
        $data = \App\Models\tbl_my_log::get();
        $response = fractal()
        ->collection($data)
        ->transformWith(new TblMyLogTransformer())
        ->toArray();

        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data'=>$response['data']
        ]);
    }


    public function tbl_commcheck(Request $request)
    {
    $m1 = $request->input('m1');
    $data = \App\Models\tbl_commcheck::where('m1', $m1)
    ->where('is_approv', '0')->get();
    $response = fractal() 
    ->collection($data) //ini untuk yang GET
    ->transformWith(new TblCommcheckTransformer())
    ->toArray();

    \Log::info($data);
    \Log::info('bersama 321'); 

    return response()->json([
        'status' => 200,
        'message' => 'Success',
        'data' => $response['data']
    ]);
 
      
    }

    public function tbl_commcheck_approve (Request $request){
        $m1 = $request->input('m1');
        $data = \App\Models\tbl_commcheck::where('m1',$m1)
        ->where('is_approv','!=','0')->get(); 
        $response = fractal()
        ->collection($data)
        ->transformWith(new TblCommcheckTransformer())
        ->toArray();

        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data' => $response['data']
        ]);
     
    }

    public function updateApproveCommcheck(Request $request)
    {
        $id_komcek = $request->input('id_komcek'); 
        $user_approv = $request->input('user_approv'); 
        $periode_awal = $request->input('periode_start'); 
        $periode_akhir = $request->input('periode_end');
        $is_approve = $request->input('is_approv'); 
        try {
            foreach($id_komcek as $key => $row){
                $data = \App\Models\tbl_commcheck::where('id_commcheck',$row)
                     ->first(); 
                     
                if($data){
                    $data->update([
                        'is_approv  '=>'1',
                        'user_approv'=>$user_approv,
                        'periode_awal' => $periode_awal[$key],
                        'periode_akhir' => $periode_akhir[$key]
                    ]); 
                }
            }
    //
            return response()->json([
                'status' => 200,
                'message' => 'Success'
            ]);
        } catch(Exception $e) {
            return response()->json([
                'status' => 404,
                'message' => $e
            ]);
        }
    }

   
}