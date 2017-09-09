<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IncreaseMediableTypeCharNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mediables', function (Blueprint $table) {
            $table->dropColumn('mediable_type');
        });
        Schema::table('mediables', function (Blueprint $table) {
            $table->char('mediable_type', 20)->after('mediable_id');
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
            $table->dropColumn('mediable_type');
        });
        Schema::table('mediables', function (Blueprint $table) {
            $table->char('mediable_type', 10)->after('mediable_id');
        });
    }
}
