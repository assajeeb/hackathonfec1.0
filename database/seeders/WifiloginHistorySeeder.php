<?php

namespace Database\Seeders;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WifiloginHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i <1000; $i++){
            DB::table('wifi_login_history')->insert([
                'student_id'=> random_int(100000,999999),
               'last_login_timestamp'=> now(),
               'login_count'=>0

            ]);
        }
    }
}
