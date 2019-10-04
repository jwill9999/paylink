<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesTable extends Migration
{
 /**
  * Run the migrations.
  *
  * @return void
  */
 public function up()
 {
  Schema::create('replies', function (Blueprint $table) {
   $table->increments('id');
   $table->text('content');
   $table->datetime('posted_at');
   $table->timestamps();
   $table->integer('user_id')->unsigned();
   $table->integer('post_id')->unsigned();
  });
  
 }

 /**
  * Reverse the migrations.
  *
  * @return void
  */
 public function down()
 {
  Schema::dropIfExists('replies');
  
 }
}
