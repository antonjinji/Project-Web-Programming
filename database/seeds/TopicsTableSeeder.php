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
            ]
        ]);
    }
}
