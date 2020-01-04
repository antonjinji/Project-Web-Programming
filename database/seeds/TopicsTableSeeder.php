<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'nameTopic' => "Finance",
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'nameTopic' => "Information Technology",
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 3,
                'user_id' => 3,
                'nameTopic' => "Laravel",
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 4,
                'user_id' => 4,
                'nameTopic' => "Convolutional Neural Network",
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 5,
                'user_id' => 5,
                'nameTopic' => "Computer Vision",
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 6,
                'user_id' => 6,
                'nameTopic' => "Human and Computer Interaction",
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 7,
                'user_id' => 7,
                'nameTopic' => "MySQL",
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 8,
                'user_id' => 8,
                'nameTopic' => "Docker",
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 9,
                'user_id' => 9,
                'nameTopic' => "Cinta",
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 10,
                'user_id' => 10,
                'nameTopic' => "Selingkuh",
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 11,
                'user_id' => 11,
                'nameTopic' => "Pernikahan",
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],

        ]);
    }
}
