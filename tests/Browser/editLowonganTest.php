<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class editLowonganTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group editlowongan
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
                ->Press('Edit')
                ->waitForLocation('/lowongan/9', 5) #9 karena id nya 9
                ->assertPathIs("/lowongan/9") #9 karena id nya 9
                ->attach('foto', 'C:\Users\faish\Downloads\LIVE REACTION TIMNAS DAY.png')
                ->type('judul', 'Lowongan Baru')
                ->type('cabang_perusahaan', 'Banjar')
                ->type('posisi', 'I phone Developer')
                ->type('deskripsi', 'Ini adalah deskripsi untuk lowongan Update')
                ->press('Simpan')
                ->assertPathIs('/lowongan');
        });
    }
}
