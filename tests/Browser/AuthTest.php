<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Tests\Browser\Pages\Auth\Login;
use Tests\Browser\Pages\Auth\Register;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @group auth
     */
    public function testLoginPage()
    {
        $user = factory(User::class)->create([
            'email' => 'user@betabeers.com',
            'password' => 'secret'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit(new Login)
                    ->type('email', $user->email)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/');
        });
    }

    /**
     * @group auth
     */
    public function testLoginPageAndFails()
    {
        $user = factory(User::class)->create([
            'email' => 'user@betabeers.com'
        ]);

        $this->browse(function ($first, $second) use ($user) {
            $second->visit(new Login)
                    ->type('email', $user->email)
                    ->type('password', 'wrongpassword')
                    ->press('Login')
                    ->assertPathIs('/login')
                    ->assertSee(__('auth.failed'));
       });
    }

    /**
     * @group auth
     */
    public function testRegisterPage()
    {
        $this->browse(function ($browser) {
            $browser->visit(new Register)
                    ->type('name', 'Betabeers')
                    ->type('email', 'admin@betabeers.com')
                    ->type('password', 'secret')
                    ->type('password_confirmation', 'secret')
                    ->press('Register')
                    ->assertPathIs('/');
        });
    }

    /**
     * @group auth
     */
    public function testRegisterPageAndFails()
    {
        $this->browse(function ($browser) {
            $browser->visit(new Register)
                    ->type('name', 'Betabeers')
                    ->type('email', 'admin@betabeers.com')
                    ->type('password', 'secret')
                    ->type('password_confirmation', 'wrongpassword')
                    ->press('Register')
                    ->assertPathIs('/register')
                    ->assertSee(__('validation.confirmed', ['attribute' => __('validation.attributes.password')]));
        });
    }

    /**
     * @group auth
     */
    public function testLogout()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)
                    ->visit('/logout')
                    ->assertPathIs('/login');
        });
    }
}
