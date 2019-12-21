<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreadsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('threads', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->timestamps();
         $table->unsignedBigInteger('author_id');
         $table->foreign('author_id')->references('id')->on('users');
         $table->string('title'); 
         $table->text('body'); 
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::table('threads', function (Blueprint $table) {
         $table->dropForeign('threads_author_id_foreign');
      });

      Schema::dropIfExists('threads');
   }
}
