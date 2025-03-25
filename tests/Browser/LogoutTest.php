<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use \App\Models\Login;

class LogoutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testLogout001(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->driver->manage()->deleteAllCookies();
            $browser->visit('/')
                    ->assertSee('Masuk Akun')
                    ->type('username', 'admin')
                    ->type('password', 'admin')
                    ->press('Masuk')
                    ->assertPathIs('/dashboard')
                    ->visit('/logout')
                    ->assertPathIsNot('/dashboard');
        });
    }
}
