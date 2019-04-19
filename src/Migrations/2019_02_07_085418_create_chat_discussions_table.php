<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatDiscussionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_discussions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            //$table->foreign("user_id")->references('id')->on('users')->onDelete('cascade');
            $table->text('message');
            $table->unsignedBigInteger('receiver');
            //$table->foreign('receiver')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('chat_discussions');
    }

}
