<?php

use Illuminate\Database\Seeder;
use App\Feedback;

class FeedbacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedbacks')->truncate();

        factory(Feedback::class, 50)->create();
    }
}
