<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            [
                'id' => 1,
                'topic_id' => 1,
                'question' => "What is the greatest paradox of becoming wealthy?",
                'user_id' => 1,
                'questionCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 2,
                'topic_id' => 2,
                'question' => "What do you regard as the most important way, in which a manager can use information technology?",
                'user_id' => 2,
                'questionCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 3,
                'topic_id' => 3,
                'question' => "What is HTTP middleware?",
                'user_id' => 3,
                'questionCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 4,
                'topic_id' => 4,
                'question' => "What are the activation functions?",
                'user_id' => 4,
                'questionCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 5,
                'topic_id' => 5,
                'question' => "There are Challenges in Computer Vision?",
                'user_id' => 5,
                'questionCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 6,
                'topic_id' => 6,
                'question' => "I wish to know more about the data set. I extract features for character and wish to see that if my data comes under the linear or non-linear category. Ho can I find this?",
                'user_id' => 6,
                'questionCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 7,
                'topic_id' => 7,
                'question' => "Why MySQL is used?",
                'user_id' => 7,
                'questionCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 8,
                'topic_id' => 8,
                'question' => "What is Docker?",
                'user_id' => 8,
                'questionCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 9,
                'topic_id' => 9,
                'question' => "Apakah kamu cinta saya?",
                'user_id' => 9,
                'questionCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 10,
                'topic_id' => 10,
                'question' => "Kenapa kamu mau selingkuh?",
                'user_id' => 10,
                'questionCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 11,
                'topic_id' => 11,
                'question' => "Kapan kita nikah sayang?",
                'user_id' => 11,
                'questionCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ]
        ]);
    }
}
