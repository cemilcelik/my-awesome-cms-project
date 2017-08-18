<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', array('news', 'announcement' ,'fair'))->default('news');
            $table->date('date')->index();
            $table->enum('remove', array('0', '1'))->default('0')->index();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('news');
    }
}
