<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBannedAtColumnToVideosUsersChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('banned_at')->nullable();
        });
        Schema::table('channels', function (Blueprint $table) {
            $table->timestamp('banned_at')->nullable();
        });
        Schema::table('videos', function (Blueprint $table) {
            $table->timestamp('banned_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('banned_at');
        });
        Schema::table('channels', function (Blueprint $table) {
            $table->dropColumn('banned_at');
        });
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('banned_at');
        });
    }
}
