<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'test_name',
            'email' => 'test_email',
            'email_verified_at' => 'test_value',
            'password' => 'test_value',
        ]);
    }
}
