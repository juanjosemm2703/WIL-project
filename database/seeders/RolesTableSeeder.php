<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert(
        [
            'name'=> "Software Developer",
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('roles')->insert(
        [
            'name'=> "Project Manager",
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('roles')->insert(
        [
            'name'=> "Business Analyst",
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('roles')->insert(
        [
            'name'=> "Tester",
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('roles')->insert(
        [
            'name'=> "Client Liaison",
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
