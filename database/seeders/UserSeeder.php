<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'John Doe',
                'email' => 'admin@hostbala.com',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'role' => 'admin',
                'email_verified_at' => Carbon::now(),
            ]
        );
        DB::table('users')->insert(

            [
                'name' => 'Subhash Yadav',
                'email' => 'subhash@hostbala.com',
                'username' => 'user',
                'password' => Hash::make('user'),
                'role' => 'user',
                'email_verified_at' => Carbon::now(),
            ]
        );
    }
}
