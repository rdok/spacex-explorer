<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChannelToThreadsTable extends Migration
{
    public function up()
    {
        Schema::table('threads', function (Blueprint $table) {
            $table->unsignedBigInteger('channel_id')->after('id')->nullable();
            $table->foreign('channel_id')->references('id')->on('channels');
        });
    }

    public function down()
    {
        Schema::table('threads', function (Blueprint $table) {
            $table->dropForeign('threads_channel_id_foreign');
            $table->dropColumn('channel_id');
        });
    }
}
