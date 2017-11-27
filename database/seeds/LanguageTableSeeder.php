<?php

use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('languages')->truncate();

        DB::table('languages')->insert([
            ['code' => 'tr', 'title' => 'Türkçe'],
            ['code' => 'en', 'title' => 'English'],
        ]);
    }
}
