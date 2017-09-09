<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mediables', function (Blueprint $table) {
            $table->integer('media_id')->unsigned();
            $table->integer('mediable_id')->unsigned();
            $table->char('mediable_type', 10);

            $table->integer('sort')->unsigned();
            $table->boolean('main')->default(false);
            $table->boolean('cover')->default(false);
            
            $table->timestamps();

            $table->primary(['media_id', 'mediable_id', 'mediable_type']);
            $table->index('sort');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mediables', function (Blueprint $table) {
            Schema::dropIfExists('mediables');
        });
    }
}
