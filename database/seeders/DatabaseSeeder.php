<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(PartnersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleStudentTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(ApplicationsTableSeeder::class);
        $this->call(FilesTableSeeder::class);
    }
}
