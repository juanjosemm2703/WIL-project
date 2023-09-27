<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('projects')->insert([
            'title' => 'Project 1',
            'students_needed' => 3,
            'description' => 'This is the description for Project 1.',
            'year' => 2023,
            'trimestre' => 2,
            'partner_id' => 2, 
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('projects')->insert([
            'title' => 'Project 2',
            'students_needed' => 2,
            'description' => 'This is the description for Project 2.',
            'year' => 2023,
            'trimestre' => 2,
            'partner_id' => 3, 
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
