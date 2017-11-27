<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Language;
use App\News;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->truncate();
        DB::table('news_language')->truncate();
        
        factory(News::class, 5)
            ->create()
            ->each(function($news) {
                $faker = Factory::create();

                foreach (Language::all() as $key => $language) {
                    $news->languages()->attach(
                        $language->id, 
                        [
                            'title' => $faker->sentence, 
                            'description' => $faker->paragraph
                        ]
                    );
                }
            });
    }
}
