<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditMediasTypeField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medias', function (Blueprint $table) {
            $table->dropColumn('type');
        });
        Schema::table('medias', function (Blueprint $table) {
            $table->enum('type', ['image', 'application', 'video', 'audio'])->after('ext');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medias', function (Blueprint $table) {
            $table->dropColumn('type');
        });
        Schema::table('medias', function (Blueprint $table) {
            $table->enum('type', ['image', 'file', 'video', 'audio'])->after('ext');
        });
    }
}
