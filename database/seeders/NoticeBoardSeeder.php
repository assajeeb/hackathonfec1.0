<?php

namespace Database\Seeders;

use Carbon\Carbon;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoticeBoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startDate = Carbon::create(2025, 2, 10);
        $endDate = Carbon::create(2025, 2, 25);
        $notices = [];
        $id = 1;

        $noticeTitles = [
            "Exam Schedule Update",
            "Parent-Teacher Meeting",
            "Holiday Announcement",
            "School Sports Day",
            "Annual Science Fair",
            "Library Book Return Reminder",
            "Extracurricular Activity Registration",
            "School Maintenance Notice",
            "COVID-19 Safety Guidelines",
            "New School Policy Update",
            "Special Assembly Announcement",
            "Cultural Event Invitation",
            "Student Council Elections",
            "Scholarship Application Deadline",
            "Midterm Exam Preparation Tips",
            "New Teacher Introduction"
        ];

        while ($startDate <= $endDate) {
            DB::table('Notice_board')->insert([
            
                'title' => $noticeTitles[array_rand($noticeTitles)], 
                'date' => $startDate,
                
            ]);
            $startDate->addDay();
          
        }

    
    }
}
