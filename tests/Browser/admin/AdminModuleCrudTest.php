<?php

namespace Tests\Browser\admin;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Admin;

class AdminModuleCrudTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** 
     * @test 
     * @group login_as_admin
     */
    public function store_an_admin_user_record()
    {
        $admin = Admin::create([
            'name' => 'John',
            'surname' => 'Doe',
            'email' => 'john@doe.com',
            'password' => bcrypt('secret')
        ]);

        $this->browse(function (Browser $browser) use ($admin) {
            $browser
                ->loginAs($admin, 'admin')
                ->visit('/admin/admin/create')
                ->type('name', 'Jane')
                ->type('surname', 'Doe')
                ->type('email', 'jane@doe.com')
                ->type('password', 'secret')
                ->press('Save')
                ->assertSee('Admin is successfully create!')
            ;
        });
    }
}
