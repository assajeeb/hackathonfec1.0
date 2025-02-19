<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WifiLoginController extends Controller
{
    public function WifiLoginHistory(Request $request){
        $validator = Validator::make($request->all(),[
            'timestamp' => 'required|regex:/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}Z$/',
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => 'Invalid UTC format'], 400);
        }
        try{
        $recode = DB::table('wifi_login_history')->where("student_id",$request->student_id)->first();
        if($recode){
        
            DB::table('wifi_login_history')->where("student_id",$request->student_id)->update(
                [
                    'last_login_timestamp'=> now(),
                    'login_count'=>$recode->login_count+1
                ]);
            $UpdatedRecode = DB::table('wifi_login_history')->where("student_id",$request->student_id)->first();
            return response()->json([
                'message'=>"Login recorded",
                'student_id'=>$UpdatedRecode->student_id,
                'login_count'=>$UpdatedRecode->login_count
            ],200);
      
        }else{
            return response()->json(['data' => 'There is no Student with ID '.$request->student_id], 200); 
        }
        }catch (Exception $e){
            DB::rollBack();
            return response()->json($e,500);
        }
        
    }
}
