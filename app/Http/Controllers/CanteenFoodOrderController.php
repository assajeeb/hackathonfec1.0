<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CanteenFoodOrderController extends Controller
{
    public function insertCanteenFoodOrder(Request $request){
       if(empty($request->items)){
        return response()->json('Items can not be empty',200);
       }
       $validator = Validator::make($request->all(),[
        'order_time' => 'required|regex:/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}Z$/',
    ]);
    if ($validator->fails()) {
        return response()->json(['data' => 'Invalid UTC format'], 400);
    }
       try{
        $order_id = random_int(10000,99999);
        $order_time = Carbon::parse($request->order_time)->toDateTimeString();
        $total_price = 0;
        $items = $request->items;
        for($i = 0;$i<count($items);$i++){
            $total_price = $total_price+ ($items[$i]['price']*$items[$i]['quantity'] );
        }
        DB::table('canteen_food_orders')->insert([
            'student_id'=>$request->student_id,
            'order_id'=>$order_id,
            'total_price'=>$total_price,
            'items'=>json_encode($request->items),
            'order_time'=> $order_time

        ]);
        

        return response()->json([
            'order_id'=>$order_id,
            'status'=>"Order placed",
            'total_price'=>$total_price
        ],200);
       }catch (Exception $e){
        DB::rollBack();
        return response( )->json($e,500);
       }
    }
}
