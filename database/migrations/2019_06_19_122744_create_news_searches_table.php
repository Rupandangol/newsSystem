<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsSearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_searches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('news_id')->unsigned()->nullable();
            $table->string('metaKeywords');
            $table->timestamps();
            $table->foreign('news_id')->references('id')->on('news')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_searches');
    }
}
