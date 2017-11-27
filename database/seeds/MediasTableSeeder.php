<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Media;
use App\Language;

class MediasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medias')->truncate();
        DB::table('media_language')->truncate();

        factory(Media::class, 10)
            ->create()
            ->each(function ($media) {
                foreach (Language::all() as $key => $language) {
                    $faker = Factory::create();

                    $media->languages()->attach($language->id, [
                        'title' => $faker->sentence
                    ]);
                }
            });
    }
}
