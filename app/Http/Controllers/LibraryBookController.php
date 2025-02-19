<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibraryBookController extends Controller
{
    public function getLibraryBookAvailability($isbn){

        try{
        $recode = DB::table("Library_book")->where('isbn',$isbn)->first();
        if($recode){
                return response()->json([
                    "isbn"=>$recode->isbn,
                    'title'=>$recode->title,
                    "available"=>(bool)$recode->copies_left>0,
                    'copies_left'=>$recode->copies_left
                ],200);
        }else{
            return response()->json([
                'data'=>"There is no Book With ISBN number $isbn"
            ],200);
        }

        }catch (Exception $e){
            return response()->json([
                $e
            ],500);
        }
    }
}
