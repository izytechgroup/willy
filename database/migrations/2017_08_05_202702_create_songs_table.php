<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('playlist_id')->unsigned();
            $table->string('title');
            $table->string('artist')->nullable();
            $table->string('genre')->nullable();
            $table->integer('number');
            $table->string('link');
            $table->string('duration')->nullable();
            $table->string('size')->nullable();
            $table->integer('plays')->default(0);
            $table->integer('downloads')->default(0);
            $table->boolean('can_download')->default(true);
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
        Schema::dropIfExists('songs');
    }
}
