<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('partners')->insert([
            'user_id' => 2,
            'approved' => FALSE,
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('partners')->insert([
            'user_id' => 3,
            'approved' => FALSE,
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),            
        ]);
        DB::table('partners')->insert([
            'user_id' => 4,
            'approved' => FALSE,
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('partners')->insert([
            'user_id' => 5,
            'approved' => FALSE,
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]); 
        DB::table('partners')->insert([
            'user_id' => 6,
            'approved' => FALSE,
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('partners')->insert([
            'user_id' => 7,
            'approved' => FALSE,
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('partners')->insert([
            'user_id' => 8,
            'approved' => FALSE,
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('partners')->insert([
            'user_id' => 9,
            'approved' => FALSE,
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('partners')->insert([
            'user_id' => 10,
            'approved' => FALSE,
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('partners')->insert([
            'user_id' => 11,
            'approved' => FALSE,
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);  
    }
}
