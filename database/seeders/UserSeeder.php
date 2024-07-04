<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'=>'นพดล ริยะสาร',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111'),
                'created_at'=>Carbon::now(),
                'email_verified_at'=> Carbon::now()

            ],
            [
                'name'=>'นายสมน้ำหนัา ห่ากิน',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('111'),
                'created_at'=>Carbon::now(),
                'email_verified_at'=> Carbon::now()

            ],

        ]);
    }
}
