<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Tests\Browser\Pages\Auth\LoginPage;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @group auth
     */
    public function test_login_page()
    {
        factory(User::class)->create([
            'email' => 'user@betabeers.com',
            'password' => 'secret'
        ]);

        $this->browse(function ($browser) {
            $browser->visit(new LoginPage)
                    ->type('email', 'user@betabeers.com')
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/');
        });
    }

    /**
     * @group auth
     */
    public function test_login_page_and_fails()
    {
        factory(User::class)->create([
            'email' => 'user@betabeers.com',
            'password' => 'secret'
        ]);

        $this->browse(function ($browser) {
            $browser->visit(new LoginPage)
                    ->type('email', 'user@betabeers.com')
                    ->type('password', 'wrongpassword')
                    ->press('Login')
                    ->assertPathIs('/login')
                    ->assertSee('Estas credenciales no coinciden con nuestros registros.');
        });
    }
}
