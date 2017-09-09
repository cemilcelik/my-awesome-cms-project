<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditMediasFilenameLength extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medias', function (Blueprint $table) {
            $table->dropColumn('filename');
        });
        Schema::table('medias', function (Blueprint $table) {
            $table->string('filename', 100)->after('id');
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
            $table->dropColumn('filename');
        });
        Schema::table('medias', function (Blueprint $table) {
            $table->string('filename', 50)->after('id');
        });
    }
}
