<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsXLangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_x_lang', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('news_id')->index()->unsigned()->foreign()->references('id', 'news');
            $table->tinyInteger('lang_id')->index()->unsigned()->foreign()->references('id', 'lang');
            $table->string('title', 100);
            $table->text('description');
            $table->engine = 'MyIsam';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_x_lang');
    }
}
