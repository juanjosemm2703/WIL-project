<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Bob Johnson',
            'email' => 'bjohnson@example.com',
            'user_type' => 'Teacher',
            'email_verified_at' => now(),
            'password' => Hash::make('securepass'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        

        DB::table('users')->insert([
            'name' => 'Alice Smith',
            'email' => 'alicesmith@example.com',
            'user_type' => 'Industry Partner',
            'email_verified_at' => now(),
            'password' => Hash::make('securepass'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('users')->insert([
            'name' => 'Olivia Harris',
            'email' => 'olivia@example.com',
            'user_type' => 'Industry Partner',
            'email_verified_at' => now(),
            'password' => Hash::make('securepass'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('users')->insert([
            'name' => 'Ethan Johnson',
            'email' => 'ethan@example.com',
            'user_type' => 'Industry Partner',
            'email_verified_at' => now(),
            'password' => Hash::make('securepass'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('users')->insert([
            'name' => 'Ava Davis',
            'email' => 'ava@example.com',
            'user_type' => 'Industry Partner',
            'email_verified_at' => now(),
            'password' => Hash::make('securepass'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('users')->insert([
            'name' => 'Noah Wilson',
            'email' => 'noah@example.com',
            'user_type' => 'Industry Partner',
            'email_verified_at' => now(),
            'password' => Hash::make('securepass'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('users')->insert([
            'name' => 'Sophia Martinez',
            'email' => 'sophia@example.com',
            'user_type' => 'Industry Partner',
            'email_verified_at' => now(),
            'password' => Hash::make('securepass'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('users')->insert([
            'name' => 'Liam Anderson',
            'email' => 'liam@example.com',
            'user_type' => 'Industry Partner',
            'email_verified_at' => now(),
            'password' => Hash::make('securepass'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('users')->insert([
            'name' => 'Isabella Taylor',
            'email' => 'isabella@example.com',
            'user_type' => 'Industry Partner',
            'email_verified_at' => now(),
            'password' => Hash::make('securepass'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('users')->insert([
            'name' => 'Mason Brown',
            'email' => 'mason@example.com',
            'user_type' => 'Industry Partner',
            'email_verified_at' => now(),
            'password' => Hash::make('securepass'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('users')->insert([
            'name' => 'Charlotte Miller',
            'email' => 'charlotte@example.com',
            'user_type' => 'Industry Partner',
            'email_verified_at' => now(),
            'password' => Hash::make('securepass'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);


        DB::table('users')->insert([
            'name' => 'Sarah Johnson',
            'email' => 'sarah@example.com',
            'user_type' => 'Student',
            'email_verified_at' => now(),
            'password' => Hash::make('securepass'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'user_type' => 'Student',
            'email_verified_at' => now(),
            'password' => Hash::make('securepass'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Eleanor Rodriguez',
            'email' => 'eleanor@example.com',
            'user_type' =>'Student',
            'email_verified_at' => now(),
            'password' => Hash::make('securepass'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('users')->insert([
            'name' => 'Michael Clark',
            'email' => 'michael@example.com',
            'user_type' => 'Student',
            'email_verified_at' => now(),
            'password' => Hash::make('securepass'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
