<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('comments', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->text('comment');
          $table->integer('id_user')->unsigned();
          $table->integer('id_postingan')->unsigned();
          $table->timestamps();
    });
    Schema::table('comments', function(Blueprint $table){
        $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
    });
    Schema::table('comments', function(Blueprint $table){
        $table->foreign('id_postingan')->references('id')->on('postingan')->onDelete('cascade')->onUpdate('cascade');
    });
    }
    public function down()
    {
        Schema::table('comments', function(Blueprint $table){
            $table->dropForeign('comments_id_user_foreign');
        });
        Schema::table('comments', function(Blueprint $table){
            $table->dropForeign('comments_id_postingan_foreign');
        });
        Schema::dropIfExists('comments');
    }
}
