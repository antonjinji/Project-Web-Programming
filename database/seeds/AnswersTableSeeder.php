<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->insert([
            [
                'id' => 1,
                'question_id' => 1,
                'answer' => "My name is Kelvin Supranata",
                'answerOwner' => "Kelvin Supranata",
                'answerCreateDate' => '2019-12-27 10:09:50',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ]
        ]);
    }
}
