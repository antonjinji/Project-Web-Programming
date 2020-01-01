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
                'question' => "What your name?",
                'questionStatus' => "Open",
                'user_id' => 1,
                'questionCreationDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ]
        ]);
    }
}
