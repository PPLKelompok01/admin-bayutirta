<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class deleteLowonganTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group deletelowongan
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Masuk dengan akun admin')
                ->type('username', 'admin')
                ->type('password', 'admin')
                ->press('Masuk')
                ->waitForLocation('/dashboard', 5)
                ->assertPathIs('/dashboard')
                ->clickLink('Lowongan')
                ->assertPathIs('/lowongan')
                ->press('Delete')
                ->assertPathIs('/lowongan');
        });
    }
}
