<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller; 
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Transformers\MasterUserTransformer;

use Auth;

/**
 * @group Auth Manajement
 */
class LoginController extends Controller
{
    /**
     * @hideFromAPIDocumentation
     */
    /**
     * Sing In

     * @queryParam client_id string required Get from Apps
     * @queryParam google_token string required Get from Apps
     */
    public function signin(Request $request)
    {
        try {
            /**
             * Signin
             */
            if ($request->has('user_name')) {
                $validator = Validator::make($request->all(), [
                    'user_name' => 'required',
                    'password' => 'required', 
                    'progname' => 'required',
                    'versi' => 'required',
                    'date_run' => 'required',
                    'info1' => 'required',
                    'info2' => 'required',
                    'userid' => 'required',
                    'toko' => 'required',
                    'devicename' => 'required',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => 203,
                        'message' => ucfirst($validator->getMessageBag()->first())
                    ], 203);
                }

                $cred = $request->only(['user_name', 'password']);
                $user_nameaja = $request->input(['user_name']);
                $passwordaja = $request->input(['password']); 
                $progname = $request->input(['progname']);
                $versi = $request->input(['versi']);
                $date_run = $request->input(['date_run']); 
                $info1 = $request->input(['info1']);
                $info2 = $request->input(['info2']);
                $userid = $request->input(['userid']);
                $toko = $request->input(['toko']);
                $devicename = $request->input(['devicename']);

                \Log::info('damn 231');
                // \Log::info($request->input(['user_name']));
                \Log::info($request);
                \Log::info($passwordaja);
                \Log::info($cred);
                \Log::info('test 6655');
                Auth::attempt($cred); //telursri
                $user = Auth::user();
                \Log::info('damn 44'); 
                
                $arrParam = array( 
                    'progname' => $progname.'-'.'Dev-v.01',
                    'versi' => $versi,
                    'date_run' => $date_run, 
                    'info1' => $info1,
                    'info2' => $info2,
                    'userid' => $userid,
                    'toko' => $toko,
                    'devicename' => $devicename 
                  );
                  \Log::info($arrParam);
                  \Log::info('$arrParam 1234555555');
                  

                // \Log::info($user->only['user_name']);
                \Log::info($user);
                $data = \App\Models\master_user::where('nik', $userid) ;
\Log::info('tesffff');
\Log::info($data);
           /*      if($dev_uniqe_id == null){

                }else{
                    if($dev_uniqe_id == '313132'){

                    }else{

                    }
                } */

                if ($user) {
                    
                    $createlog = \App\Models\create_mylog::create([$arrParam]);
    
               /*      $updateimei = \App\Models\update_imei::update(['dev_uniqe_id'=>$info1]);
                    ->where(['nik' => $userid]);   */                   

                   if ($passwordaja == '123'){
                        $userpass = '1'; 
                        \Log::info('damn 4554444');
                        \Log::info($userpass);
                        \Log::info($user_nameaja.'ckckc'.$passwordaja);

                     }else {
                        $userpass = '0';
                        \Log::info('damn 455666');
                        \Log::info($userpass);
                        \Log::info($user_nameaja.'ckckc'.$passwordaja);
                     }  
                    $token = Str::random(60);
                    
                    $response = fractal()
                        ->item($user) //untuk tipe post menggunakan item 
                        ->transformWith(new MasterUserTransformer())
                        ->toArray();
                       
                    return response()->json([
                         'userpass' => $userpass, 
                        'status' => 200,
                        'message' => 'Success', 
                        'access_token' => $token,
                        'data' => $response['data']
                    ]);
            

                } else {
                    return response()->json([
                        'status' => 201,
                        'message' => 'User not found'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 201,
                    'message' => "We are not support login with your provider"
                ], 201);
            }
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function resetpassword(Request $request){
        try{
            /**
             * Reset Password
             */
            if ($request->has('user_name')) {
                $validator = Validator::make($request->all(), [
                    'user_name' => 'required' 
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => 203,
                        'message' => ucfirst($validator->getMessageBag()->first())
                    ], 203);
                }
             

                $user = \App\Models\master_user::firstWhere('user_name',$request->input('user_name'));
                date_default_timezone_set('Asia/Jakarta');
                $createlog = \App\Models\create_mycommand::create(['status' => '0','perintah' => '1','date_cr' => date("Y-m-d"),'waktu_cr' => date("H:i:s"),'param1' => $request->input('user_name')],'',);
                
                // $user = \App\Models\master_user::firstWhere('user_name',$request->input('user_name'));
                // $ris_user = \App\Models\ris_master_user::firstWhere('username','0'.$request->input('user_name'));
                if ($user && $createlog) { 
                    $pass = \Hash::make($request->input('password')); //telusrui
                    $user->update(['password'=>$pass]);
                 /*    $createlog->Post::create(['status'=>'1','perintah'=>'1']);
                    // $ris_user->update(['password'=>$pass]);
                    \Log::info('damn 55666');
                    \Log::info($createlog); */
                    $token = Str::random(60);

                    $response = fractal()
                        ->item($user,$createlog) //untuk tipe post menggunakan item 
                        ->transformWith(new MasterUserTransformer())
                        ->toArray();

                    return response()->json([
                        'status' => 200,
                        'message' => 'Success',
                        'access_token' => $token,
                        'data' => $response['data']
                    ]);
                } else {
                    return response()->json([
                        'status' => 201,
                        'message' => 'User not found'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 201,
                    'message' => "We are not support reset password with your provider"
                ], 201);
            }
        }catch (\Exception $exception) {
            return $exception;
        }
    }

    public function index(){
        return response()->json('berhasil');
    }
}


//penambahan