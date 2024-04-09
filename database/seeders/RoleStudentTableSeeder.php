<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleStudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role_student')->insert([
            'student_id' => 12,
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('role_student')->insert([
            'student_id' => 13,
            'role_id' => 2,
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('role_student')->insert([
            'student_id' => 14,
            'role_id' => 5,
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('role_student')->insert([
            'student_id' => 15,
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('role_student')->insert([
            'student_id' => 13,
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('role_student')->insert([
            'student_id' => 14,
            'role_id' =>3,
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
