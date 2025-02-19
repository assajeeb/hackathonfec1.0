<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamRoomController extends Controller
{
    public function getExamRoomAllocation($student_id){
        try{

          $data =  DB::table('exam_room_allocation')->where('student_id',$student_id)->first();
          if($data){
       
            return response()->json([
                'student_id'=>$data->student_id,
                'exam_room'=>$data->exam_room,
                'seat_number'=>$data->seat_number
            ]);
          }{
            return response()->json([
                'data'=>"There is no Student with id $student_id"
            ],200);
          }
        }catch (Exception $ex){
            return response()->json([
                "data"=>$ex
            ],500);
        }
       
    }
}
