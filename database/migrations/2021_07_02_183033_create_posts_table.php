<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title', 100);
            $table->longText('content');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');
     //1)quale dato sara foreign-k 2)A quale colonna si riferisce 3)Di quale tabella

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    
    }
}
