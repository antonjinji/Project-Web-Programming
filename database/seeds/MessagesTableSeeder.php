<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            [
                'id' => 1,
                'sender_id' => 1,
                // 'sender_name' => 'Hans Micheal',
                // 'sender_profile_picture' => 'hans.jpg',
                'user_receive_id' => 2,
                'message' => 'Kenalan dong',
                'messageCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 2,
                'sender_id' => 2,
                // 'sender_name' => 'Kelvin Supranata',
                // 'sender_profile_picture' => 'yoga.jpg',
                'user_receive_id' => 3,
                'message' => 'Mau kenalan dong',
                'messageCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 3,
                'sender_id' => 3,
                // 'sender_name' => 'Vanya',
                // 'sender_profile_picture' => 'vanya.jpg',
                'user_receive_id' => 4,
                'message' => 'Ayo makan',
                'messageCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 4,
                'sender_id' => 4,
                // 'sender_name' => 'Antonjinji',
                // 'sender_profile_picture' => 'antonjinji.jpg',
                'user_receive_id' => 5,
                'message' => 'Haiii',
                'messageCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 5,
                'sender_id' => 5,
                // 'sender_name' => 'Satria W.A',
                // 'sender_profile_picture' => 'satria.jpg',
                'user_receive_id' => 6,
                'message' => 'Hallo',
                'messageCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 6,
                'sender_id' => 6,
                // 'sender_name' => 'Andy Surefor',
                // 'sender_profile_picture' => 'yoga.jpg',
                'user_receive_id' => 7,
                'message' => 'Ayo main mobile legend yuk',
                'messageCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 7,
                'sender_id' => 7,
                // 'sender_name' => 'Sellyhung',
                // 'sender_profile_picture' => 'selly.jpg',
                'user_receive_id' => 8,
                'message' => 'Siap siap ya aku dah mau kesana',
                'messageCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 8,
                'sender_id' => 8,
                // 'sender_name' => 'Veny Liana',
                // 'sender_profile_picture' => 'veny.jpg',
                'user_receive_id' => 9,
                'message' => 'Makan kintan yuk',
                'messageCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 9,
                'sender_id' => 9,
                // 'sender_name' => 'Stendy Antonio',
                // 'sender_profile_picture' => 'yoga.jpg',
                'user_receive_id' => 10,
                'message' => 'Mau kemana nih?',
                'messageCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 10,
                'sender_id' => 10,
                // 'sender_name' => 'Yoga',
                // 'sender_profile_picture' => 'yoga.jpg',
                'user_receive_id' => 11,
                'message' => 'Ayo KTV yuk',
                'messageCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 11,
                'sender_id' => 11,
                // 'sender_name' => 'Rio Rafelino',
                // 'sender_profile_picture' => 'rio.jpg',
                'user_receive_id' => 1,
                'message' => 'Kamu liburan pergi kemana',
                'messageCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 12,
                'sender_id' => 4,
                // 'sender_name' => 'Vanya',
                // 'sender_profile_picture' => 'vanya.jpg',
                'user_receive_id' => 5,
                'message' => 'Aku takut nanti aku gagal fokus',
                'messageCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 13,
                'sender_id' => 4,
                // 'sender_name' => 'Vanya',
                // 'sender_profile_picture' => 'vanya.jpg',
                'user_receive_id' => 5,
                'message' => 'Semangat ya',
                'messageCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 14,
                'sender_id' => 4,
                // 'sender_name' => 'Vanya',
                // 'sender_profile_picture' => 'vanya.jpg',
                'user_receive_id' => 5,
                'message' => 'Jaga kesehatan ya',
                'messageCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
