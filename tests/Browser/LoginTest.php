<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @group user_login
     */
    public function login_page_login_and_redirect()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => bcrypt('secret')
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'secret')
                ->press('Login')
                ->assertPathIs('/en/home')
            ;
        });
    }

    /**
     * @test
     * @group login_as
     */
    public function login_as_function()
    {
        $user = factory(User::class)->create();

        $this->browse(function(Browser $browser) use ($user) {
            $browser
                ->loginAs($user)
                ->visit('/home')
                ->assertSee('Featured')
            ;
        });
    }
}
