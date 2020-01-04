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
                'name' => 'Rio Rafelino',
                'email' => 'riorafe99@gmail.com',
                'password' => bcrypt('rio123'),
                'gender' => 'female',
                'address' => 'Binus square',
                'birthday' => '1999/06/28',
                'profile_picture' => 'rio.jpg',
                'isAdmin' => 0,
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 2,
                'name' => 'Hans Micheal',
                'email' => 'hans99@gmail.com',
                'password' => bcrypt('han123'),
                'gender' => 'male',
                'address' => 'Pulang balik',
                'birthday' => '1999/05/20',
                'profile_picture' => 'hans.jpg',
                'isAdmin' => 0,
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 3,
                'name' => 'Kelvin Supranata',
                'email' => 'kelvin99@gmail.com',
                'password' => bcrypt('kelvin123'),
                'gender' => 'male',
                'address' => 'Binus Square',
                'birthday' => '1999/10/16',
                'profile_picture' => 'yoga.jpg',
                'isAdmin' => 0,
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 4,
                'name' => 'Vanya',
                'email' => 'vanya00@gmail.com',
                'password' => bcrypt('admin123'),
                'gender' => 'female',
                'address' => 'Binus Square',
                'birthday' => '2000/10/16',
                'profile_picture' => 'vanya.jpg',
                'isAdmin' => 1,
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 5,
                'name' => 'Antonjinji',
                'email' => 'antonjinji99@gmail.com',
                'password' => bcrypt('admin123'),
                'gender' => 'male',
                'address' => 'Kost Haji Indra',
                'birthday' => '1999/12/28',
                'profile_picture' => 'antonjinji.jpg',
                'isAdmin' => 1,
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 6,
                'name' => 'Satria Wiro Agung',
                'email' => 'satriawz99@gmail.com',
                'password' => bcrypt('satria123'),
                'gender' => 'male',
                'address' => 'Binus Square',
                'birthday' => '1999/06/17',
                'profile_picture' => 'satria.jpg',
                'isAdmin' => 0,
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 7,
                'name' => 'Andy Surefor',
                'email' => 'andy99@gmail.com',
                'password' => bcrypt('andy123'),
                'gender' => 'male',
                'address' => 'Binus Square',
                'birthday' => '1999/10/18',
                'profile_picture' => 'yoga.jpg',
                'isAdmin' => 0,
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 8,
                'name' => 'Selly Glanandreahong',
                'email' => 'selly99@gmail.com',
                'password' => bcrypt('selly123'),
                'gender' => 'female',
                'address' => 'Taman Anggrek',
                'birthday' => '2000/05/17',
                'profile_picture' => 'selly.jpg',
                'isAdmin' => 0,
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 9,
                'name' => 'Veny Liana',
                'email' => 'veny99@gmail.com',
                'password' => bcrypt('admin123'),
                'gender' => 'female',
                'address' => 'Taman Anggrek',
                'birthday' => '2000/03/22',
                'profile_picture' => 'veny.jpg',
                'isAdmin' => 1,
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 10,
                'name' => 'Stendy Antonio',
                'email' => 'stendy99@gmail.com',
                'password' => bcrypt('stendy123'),
                'gender' => 'male',
                'address' => 'Binus Square',
                'birthday' => '1999/05/17',
                'profile_picture' => 'yoga.jpg',
                'isAdmin' => 0,
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 11,
                'name' => 'Yoga',
                'email' => 'yoga99@gmail.com',
                'password' => bcrypt('admin123'),
                'gender' => 'male',
                'address' => 'Central Park',
                'birthday' => '1999/10/29',
                'profile_picture' => 'yoga.jpg',
                'isAdmin' => 1,
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ]
        ]);
    }
}
