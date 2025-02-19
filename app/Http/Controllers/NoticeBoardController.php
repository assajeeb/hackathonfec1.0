<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoticeBoardController extends Controller
{
    public function getNotice(){
        try{

            $notices = DB::table('Notice_board')->where('date', '<=', now()->toDateString()) 
            ->orderBy('date', 'desc') 
            ->get();
            $updatedNotice = [];
            foreach ($notices as $notice) {
                $updatedNotice[] = [
                    'id' => $notice->id,
                    'title' => $notice->title,
                    'date' => \Carbon\Carbon::parse($notice->date)->format('Y-m-d'), // Format the date
                ];
            }
        
            return response()->json(
                $updatedNotice
            ,200);
        }catch (Exception $e){
            return response()->json($e,500);
        }

        

    }
}
