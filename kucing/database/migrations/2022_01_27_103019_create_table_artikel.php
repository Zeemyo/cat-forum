<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArtikel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 200);
            $table->integer('id_Category')->unsigned();
            $table->string('description', 1000);
            $table->string('image', 200)->default(null);
            $table->timestamps();
        });
        Schema::table('artikel', function(Blueprint $table){
            $table->foreign('id_Category')->references('id')->on('Category')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artikel', function(Blueprint $table){
            $table->dropForeign('artikel_id_Category_foreign');
        });
        Schema::dropIfExists('artikel');
    }
}
