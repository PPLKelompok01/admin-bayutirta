<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class addLowonganTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group addlowongan
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
                ->clickLink('Tambah lowongan')
                ->assertPathIs('/lowongan/add')
                ->assertSee('Detail Informasi Lowongan')
                ->attach('foto', 'C:\Users\faish\Downloads\LIVE REACTION TIMNAS DAY.png')
                ->type('judul', 'Lowongan Baru')
                ->type('cabang_perusahaan', 'Jakarta')
                ->type('posisi', 'Backend Developer')
                ->type('deskripsi', 'Ini adalah deskripsi untuk lowongan baru')
                ->press('Simpan')
                ->assertPathIs('/lowongan');
        });
    }
}
