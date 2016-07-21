<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_id')->unsigned()->index();
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title_az');
            $table->string('title_en');
            $table->string('title_ru');
            $table->string('path_large');
            $table->string('path_small');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gallery');
    }
}
