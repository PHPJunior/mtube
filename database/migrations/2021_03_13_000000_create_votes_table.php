<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(config('vote.votes_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger(config('vote.user_foreign_key'))->index();
            $table->morphs('votable');
            $table->string('vote_type', 16)->default('up_vote'); // 'up_vote'/'down_vote'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists(config('vote.votes_table'));
    }
}
