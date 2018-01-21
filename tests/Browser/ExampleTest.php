<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testHomePageLoad()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Featured')
            ;
        });
    }

    public function testAboutUsPageLoad()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/en/about')
                ->assertSee('about us')
            ;
        });
    }

    public function testContactPageLoad()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/en/contact')
                ->assertSee('Contact')
            ;
        });
    }
    
}
