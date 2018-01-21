<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Feedback;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    public function testAssertRedirect()
    {
        $this->get('/')->assertStatus(302)->assertRedirect('/en');
    }

    public function testAssertGetAdminLogin()
    {
        $this->get('/admin/login')->assertSee('Login');
    }

    public function testAssertGetHome()
    {
        $this->get('/home')->assertRedirect('/en/home');
    }
}
