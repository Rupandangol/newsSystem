<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('news_id')->unsigned();
            $table->integer('sub_id')->unsigned();
            $table->integer('rating');
            $table->timestamps();
            $table->foreign('news_id')->references('id')->on('news')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sub_id')->references('id')->on('subscribers')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_ratings');
    }
}
