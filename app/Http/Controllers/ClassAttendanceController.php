<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClassAttendanceController extends Controller
{
    public function InsertClassAttendace(Request $request){
        $validator = Validator::make($request->all(),[
            'date' => 'required|date_format:Y-m-d'
        ]);
        if($validator->fails()){
            return response()->json([
                "data"=>"Invalid Date Validation"
            ],200);
        }
        try{
            $Present_students = $request->present_students;
                DB::table('class_attendace')->insert([
                    "date"=>$request->date,
                    "class_id"=>$request->class_id,
                    "present_students"=>json_encode($Present_students),
                    'created_at'=>now(),
                    'updated_at'=>now()

                ]);
                return response()->json([
                    'message'=>"Attendance recorded",
                    'total_present'=>count($Present_students)
                ],200);
        }catch (Exception $e){
            DB::rollBack();
            return response()->json([
                'data'=>$e
            ],500);
        }
    
    }
}
