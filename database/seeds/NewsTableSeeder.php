<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\News::class, 5)
            ->create()
            ->each(function($u) {
                // @todo Create NewsLang
                $u->languages()->save(factory(App\NewsLang::class)->make());
            });
    }
}
