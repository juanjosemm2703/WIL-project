<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        DB::table('applications')->insert([
            'student_id' => 12, 
            'project_id' => 1, 
            'justification' => 'I am interested in Project 1 because...',
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('applications')->insert([
            'student_id' => 13, 
            'project_id' => 2, 
            'justification' => 'I would like to contribute to Project 2 because...',
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

       
    }
}
