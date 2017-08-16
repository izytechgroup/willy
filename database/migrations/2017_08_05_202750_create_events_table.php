<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('last_updated_by');
            $table->string('title');
            $table->string('slug');
            $table->string('flyer')->nullable();
            $table->string('type')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('organizer')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('events');
    }
}
