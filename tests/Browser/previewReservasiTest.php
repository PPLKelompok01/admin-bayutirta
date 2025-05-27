<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class previewReservasiTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group previewreservasi
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
                ->clickLink('Reservasi')
                ->assertPathIs('/reservasi')
                ->clickLink('Lihat Detail')
                ->waitFor('#confirm-detail', 10)
                ->whenAvailable('#confirm-detail', function ($modal) {
                    $modal->assertSee('Detail Reservasi')
                        ->assertSee('Nama Pemesan') // contoh field
                        ->assertSee('Tanggal Reservasi');
                });
        });
    }
}
