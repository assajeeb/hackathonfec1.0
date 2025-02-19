<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmergencyAlertController extends Controller
{
    public function InsertEmergencyAlert(Request $request){
        $AllTeams = [
            ["type" => "Medical", "team" => "Medical Unit"],
            ["type" => "Fire", "team" => "Firefighters"],
            ["type" => "Police", "team" => "Law Enforcement"],
            ["type" => "Rescue", "team" => "Search and Rescue"],
            ["type" => "Disaster Relief", "team" => "Disaster Response Unit"],
            ["type" => "Security", "team" => "Security Patrol"],
            ["type" => "Technical Rescue", "team" => "Urban Search and Rescue"],
            ["type" => "Flood Response", "team" => "Flood Control Unit"],
            ["type" => "Power Outage", "team" => "Electrical Repair Team"]
        ];
        $team = "";
        for($i = 0; $i<count($AllTeams);$i++){
            if($request->type == $AllTeams[$i]['type']){
                $team = $AllTeams[$i]['team'];
                break;
            }
        }

        if($team == ""){
            return response()->json("Can not find team for type".$request->type,200);
        }

        try{

            DB::table('emergency_alert')->insert([
                'type'=>$request->type,
                'location'=>$request->location,
                'details'=>$request->details,
                'team'=>$team,
                'time'=>now(),
                'created_at'=>now()
            ]);

            return response()->json([
                'message'=> "Emergency alert send",
                'response_team'=>$team
            ],200);

        }catch (Exception $e){
            DB::rollBack();
            return response()->json([
                'data'=>$e
            ],500);
        }
     

    }
}
