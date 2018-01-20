<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Feedback;
use Carbon\Carbon;
use DB;

class NewExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFeedbackAssertCount()
    {
        factory(Feedback::class, 5)->create();

        $feedbacks = Feedback::all();
        
        $this->assertCount(5, $feedbacks);
    }

    public function testFeedbackAssertOrder()
    {
        DB::table('feedbacks')->truncate();

        $feedback1 = factory(Feedback::class)->create();
        $feedback2 = factory(Feedback::class)->create([
            'created_at' => Carbon::now()->subMonth()
        ]);
        
        $feedbacks = Feedback::get()->toArray();

        $this->assertEquals([
            [
                "id" => $feedback1->id,
                "name_surname" => $feedback1->name_surname,
                "email" => $feedback1->email,
                "message" => $feedback1->message,
                "created_at" => $feedback1->created_at,
                "updated_at" => $feedback1->updated_at,
                "deleted_at" => $feedback1->deleted_at
            ],
            [
                "id" => $feedback2->id,
                "name_surname" => $feedback2->name_surname,
                "email" => $feedback2->email,
                "message" => $feedback2->message,
                "created_at" => $feedback2->created_at,
                "updated_at" => $feedback2->updated_at,
                "deleted_at" => $feedback2->deleted_at                
            ]
        ], $feedbacks);
    }
}
