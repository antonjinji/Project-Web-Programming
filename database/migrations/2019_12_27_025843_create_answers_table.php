<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('question_id');
            $table->text('answer');
            $table->integer('user_id');
            $table->dateTime('answerCreateDate')->format('Y-m-d H:i:s');
            $table->timestamps();
        });

        // Schema::table('answers', function (Blueprint $table) {
        //     $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        // });

        // Schema::table('answers', function (Blueprint $table) {
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
        Schema::dropIfExists('answers');
    }
}
