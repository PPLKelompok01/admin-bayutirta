<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ArtikelTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
    @group ViewArtikel
     */
    
    public function testArtikel(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') 
                ->type('username', 'admin')
                ->type('kata sandi', 'admin')
                ->press('Masuk')
                ->assertPathIs('/dashboard')
                ->clickLink('Artikel')
                ->assertPathIs('artikel')
                ->assertSee('Artikel');
        });
    }
}
