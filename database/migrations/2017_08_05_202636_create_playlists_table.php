<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaylistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('number');
            $table->string('cover')->nullable();
            $table->string('cover_md')->nullable();
            $table->string('cover_sm')->nullable();
            $table->enum('type', ['audio', 'video'])->default('audio');
            $table->enum('status', ['published', 'unpublished'])->default('unpublished');
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
        Schema::dropIfExists('playlists');
    }
}
