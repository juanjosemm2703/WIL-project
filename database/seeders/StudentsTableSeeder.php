<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            'user_id' => 12,
            'GPA' => 6.1,
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('students')->insert([
            'user_id' => 13,
            'GPA' => 5,
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('students')->insert([
            'user_id' => 14,
            'GPA' => 7,
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('students')->insert([
            'user_id' => 15,
            'GPA' => 5,
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
