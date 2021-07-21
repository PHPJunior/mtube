<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();

            $table->unsignedBigInteger('channel_id')->nullable();
            $table->foreign('channel_id')
                ->references('id')
                ->on('channels')
                ->onDelete('cascade');

            $table->string('tus_id')->nullable();
            $table->string('media_id')->nullable();

            $table->string('name')->nullable();
            $table->text('description')->nullable();

            $table->string('disk')->nullable();
            $table->string('path')->nullable();
            $table->string('thumbnail_url')->nullable();
            $table->string('streaming_url')->nullable();

            $table->string('file_size')->nullable();
            $table->string('file_type')->nullable();
            $table->string('duration')->nullable();
            $table->integer('progress')->default(0);

            $table->string('status')->nullable();

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
