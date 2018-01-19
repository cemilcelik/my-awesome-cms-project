<?php

use Illuminate\Database\Seeder;
use App\Feedback;

class FeedbackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedback')->truncate();

        factory(Feedback::class, 50)->create();
    }
}
