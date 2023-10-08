<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('files')->insert([
            'project_id' => 1,
            'type' => 'image',
            'file_path'=>'files/default.jpg',
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('files')->insert([
            'project_id' => 1,
            'type' => 'image',
            'file_path'=>'files/default2.jpeg',
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('files')->insert([
            'project_id' => 1,
            'type' => 'image',
            'file_path'=>'files/default3.jpeg',
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('files')->insert([
            'project_id' => 1,
            'type' => 'pdf',
            'file_path'=>'files/default.pdf',
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('files')->insert([
            'project_id' => 1,
            'type' => 'pdf',
            'file_path'=>'files/default2.pdf',
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
