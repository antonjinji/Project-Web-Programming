<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('topic_id');
            $table->string('question');
            $table->integer('user_id');
            $table->dateTime('questionCreationDate')->format('Y-m-d H:i:s');
            $table->timestamps();
        });

        // Schema::table('questions', function (Blueprint $table) {
        //     $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
        // });

        // Schema::table('questions', function (Blueprint $table) {
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
