<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentManagementSystemController extends Controller
{
    public function createStudent(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=> 'required|string|max:255',
            'student_id' => 'required|numeric|digits_between:5,10|unique:Student_Management_system,student_id',
            'department' => 'required|string|max:355',
        ]);

        if($validator->fails()){
            return response()->json([
                "data"=>"Data Input Error, Name(max 255), Student_id(5,10 and must be unique), department(max 355)"
            ],200);
        }

        try{

            DB::table('Student_Management_system')->insert([
                'name'=>$request->name,
                'student_id'=>$request->student_id,
                'department'=>$request->department
                
            ]);

            $data = DB::table('Student_Management_system')->where('student_id',$request->student_id)->get()->first();
            if($data){
                return response()->json([
                    'id'=>$data->id,
                    'name'=>$data->name,
                    "student_id"=>$data->student_id,
                    'department'=>$data->department,
                    'status'=> "Created"
                ],200);
            }else{
                return response()->json([
                  
                    'name'=>$request->name,
                    "student_id"=>$request->student_id,
                    'department'=>$request->department,
                    'status'=> "Failed To Created"
                ],200);
            }
        }catch (Exception $e){
            DB::rollBack();
            return response()->json($e,500);
        }

    }
    

    public function getStudent($Student_id){
        try{
            $data = DB::table('Student_Management_system')->where('student_id',$Student_id)->get()->first();    

            if($data){
                return response()->json($data,200);
            }else{
                return response()->json([
                    'data'=>"There is no Student with ID ".$Student_id
                ],200);
            }

        }catch (Exception $e){
            return response()->json($e,500);
        }
    }

    public function updateStudent(Request $request, $Student_id){


        $validator = Validator::make($request->all(),[
            'name'=> 'sometimes|string|max:255',
            'student_id' => 'sometimes|numeric|digits_between:5,10',
            'department' => 'sometimes|string|max:355',
        ]);

        if($validator->fails()){
            return response()->json([
                "data"=>"Data Input Error, Name(max 255), Student_id(5,10 and must be unique), department(max 355)"
            ],200);
        }

        $data = DB::table('Student_Management_system')->where('student_id',$Student_id)->get()->first();    

        if($data){
            try{
                $database = DB::table('Student_Management_system')->where('student_id',$Student_id);
            
                if($request->has('name')){
                    $database->update([
                        'name'=>$request->name
                    ]);
                }
                if($request->has('student_id')){
                    $Checkdatabase = DB::table('Student_Management_system')->where('student_id',$request->student_id)->get()->first();

                    if($Checkdatabase){
                        
                    }else{

                        $database->update([
                            'student_id'=>$request->student_id
                        ]);
                    }

                  
                }
                if($request->has('department')){
                    $database->update([
                        'department'=>$request->department
                    ]);
                }
                if($request->has('student_id')){
                    if($request->student_id != $Student_id){
                        $UpdateddatabaseRecode = DB::table('Student_Management_system')->where('student_id',$request->student_id)->get()->first();
                        return response()->json([
                            'id'=>$UpdateddatabaseRecode->id,
                            'name'=>$UpdateddatabaseRecode->name,
                            'student_id'=>$UpdateddatabaseRecode->student_id,
                            'department'=>$UpdateddatabaseRecode->department,
                            'status'=> "Updated"
                           ],200);
                    }
                   
                }
               $updatedData =  $database->get()->first();

               return response()->json([
                'id'=>$updatedData->id,
                'name'=>$updatedData->name,
                'student_id'=>$updatedData->student_id,
                'department'=>$updatedData->department,
                'status'=> "Updated"
               ],200);

            }catch (Exception $e){
                DB::rollBack();
                return response()->json($e,500);
            }

        }else{
            return response()->json([
                'data'=>"There is no Student with ID ".$Student_id
            ],200);
        }

       
    }

    public function deleteStudent($Student_id){
        try{
            $data = DB::table('Student_Management_system')->where('student_id',$Student_id)->get()->first();

            if($data){
                DB::table('Student_Management_system')->where('student_id',$Student_id)->delete();
                return response()->json([
                    'id'=>$data->id,
                    "name"=>$data->name,
                    "student_id"=>$data->student_id,
                    "department"=>$data->department,
                    'status'=>"Deleted"

                ],200);
            }else{
                return response()->json("There is no Student to Delete with ID ".$Student_id,200);
            }


        }catch (Exception $e){
            DB::rollBack();
            return response()->json($e,500);        }
    }
}
