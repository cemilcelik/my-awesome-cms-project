<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_id')->unsigned()->foreign('id')->on('news');
            $table->string('locale', 5)->index();
            $table->string('title', 250);
            $table->string('slug', 100)->unique();
            $table->text('description');
            $table->unique(['news_id', 'locale']);
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_translations');
    }
}
