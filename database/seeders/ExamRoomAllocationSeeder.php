<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamRoomAllocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    for($i = 0; $i <1000; $i++){
        DB::table('exam_room_allocation')->insert([
            'student_id'=> random_int(100000,999999),
            'exam_room'=> "Room ".random_int(100,500),
            'seat_number'=>$i+1
        ]);
    }
    }
}
