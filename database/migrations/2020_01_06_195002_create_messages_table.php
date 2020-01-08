<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sender_id'); //user pengirim message-> akun sekarang, misal sekarang saya login sebagai Anton, jadi user pengirim adalah Anton.
            // $table->string('sender_name');
            // $table->string('sender_profile_picture');
            $table->integer('user_receive_id'); //user penerima message
            $table->string('message');
            $table->dateTime('messageCreationDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
