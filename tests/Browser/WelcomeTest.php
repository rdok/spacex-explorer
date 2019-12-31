<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class WelcomeTest extends DuskTestCase
{
    /** @test */
    public function landing_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('SpaceX Explorer');
        });
    }
}
