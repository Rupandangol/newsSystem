<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_categories', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('categories_id')->unsigned()->nullable();
            $table->integer('news_id')->unsigned()->nullable();

            $table->timestamps();

            $table->foreign('categories_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('news_categories');
    }
}
