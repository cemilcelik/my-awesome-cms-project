<?php

namespace Tests\Browser\admin;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Admin;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLoginPageLoginAndRedirect()
    {
        $admin = factory(Admin::class)->create();

        $this->browse(function (Browser $browser) use ($admin) {
            $browser
                ->visit('/admin/login')
                ->type('email', $admin->email)
                ->type('password', 'secret')
                ->press('Login')
                ->assertPathIs('/admin/dashboard')
            ;
        });
    }
}
