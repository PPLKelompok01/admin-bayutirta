<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    // use DatabaseMigrations;
    /**
     * A Dusk test example.
     */
    public function testLogin001(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->driver->manage()->deleteAllCookies();
            $browser->visit('/')
                    ->assertSee('Masuk Akun')
                    ->type('username', 'admin')
                    ->type('password', 'admin')
                    ->press('Masuk')
                    ->assertPathIs('/dashboard');
        });
    }

    public function testLogin002(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->driver->manage()->deleteAllCookies();
            $browser->visit('/')
                    ->assertSee('Masuk Akun')
                    ->type('username', 'user')
                    ->type('password', 'user')
                    ->press('Masuk')
                    ->assertPathIs('/')
                    ->assertSee('login gagal');
        });
    }
}
