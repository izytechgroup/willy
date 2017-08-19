<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('playlist_id')->unsigned();
            $table->string('title');
            $table->integer('number')->index();
            $table->enum('status', ['published', 'unpublished'])->default('published');
            $table->enum('origin', ['youtube', 'vimeo'])->default('youtube');
            $table->string('origin_id');
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
        Schema::dropIfExists('videos');
    }
}