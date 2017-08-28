<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameNewsLanguageLanguageIdField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('news_language');

        Schema::create('news_language', function (Blueprint $table) {
            $table->integer('news_id')->unsigned();
            $table->char('language_id', 5);

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
        Schema::drop('news_language');

        Schema::create('news_language', function (Blueprint $table) {
            $table->integer('news_id')->unsigned();
            $table->integer('language_id')->unsigned();

            $table->string('title', 100);
            $table->text('description');
            
            $table->primary(['news_id', 'language_id']);
        });
    }
}
