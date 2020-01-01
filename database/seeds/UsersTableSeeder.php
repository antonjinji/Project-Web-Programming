<?php

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
            [
                'id' => 1,
                'name' => 'rio rafe',
                'email' => 'riorafe99@gmail.com',
                'password' => bcrypt('rio12345'),
                'gender' => 'female',
                'address' => 'Binus square',
                'birthday' => '1999/06/28',
                'profile_picture' => 'manYu.jpg',
                'isAdmin' => 1,
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 2,
                'name' => 'hans micheal',
                'email' => 'hans99@gmail.com',
                'password' => bcrypt('admin'),
                'gender' => 'male',
                'address' => 'Pulang balik',
                'birthday' => '1999/05/20',
                'profile_picture' => 'manYu.jpg',
                'isAdmin' => 0,
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 3,
                'name' => 'anton',
                'email' => 'anton99@gmail.com',
                'password' => bcrypt('admin'),
                'gender' => 'male',
                'address' => 'Kost haji indra',
                'birthday' => '1999/10/25',
                'profile_picture' => 'manYu.jpg',
                'isAdmin' => 0,
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ]
        ]);
    }
}
