<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewsLanguage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_language', function (Blueprint $table) {
            $table->integer('news_id')->unsigned();
            $table->integer('language_id')->unsigned();

            $table->string('title', 100);
            $table->text('description');
            
            $table->primary(['news_id', 'language_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_language');
    }
}
