<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthTest extends TestCase
{
    use DatabaseMigrations;

    public function test_login_user()
    {
        $user = factory(App\Models\User::class)->create([
            'password' => 'password'
        ]);

        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('password', 'password')
            ->press('Login')
            ->seePageIs('/')
            ->isAuthenticated();
    }

    public function test_login_user_and_fails()
    {
        $user = factory(App\Models\User::class)->create([
            'password' => 'password'
        ]);

        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('wrongpassword', 'password')
            ->press('Login')
            ->seePageIs('/login')
            ->see('Estas credenciales no coinciden con nuestros registros.')
            ->dontSeeIsAuthenticated();
    }

    public function test_register_a_new_user()
    {
        $user = factory(App\Models\User::class)->make();

        $this->visit('/register')
            ->type($user->name, 'name')
            ->type($user->email, 'email')
            ->type('secret', 'password')
            ->type('secret', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/')
            ->see($user->name)
            ->isAuthenticated();
    }

    public function test_register_a_new_user_and_fails()
    {
        $user = factory(App\Models\User::class)->make();

        $this->visit('/register')
            ->type($user->name, 'name')
            ->type('invalidemail', 'email')
            ->type('secret', 'password')
            ->type('secret', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/register')
            ->see('correo electrónico no es un correo válido');
    }

    public function test_password_reset()
    {
        $user = factory(App\Models\User::class)->create();

        $this->visit('/password/reset')
            ->type($user->email, 'email')
            ->press('Send Password Reset Link')
            ->see('¡Te hemos enviado por correo el enlace para restablecer tu contraseña!');

        $token = \DB::table('password_resets')
            ->where('email', $user->email)
            ->first()
            ->token;

        $this->visit('/password/reset/' . $token)
            ->type($user->email, 'email')
            ->type('newpassword', 'password')
            ->type('newpassword', 'password_confirmation')
            ->press('Reset Password')
            ->seePageIs('/');
    }

    public function test_logout()
    {
        $user = factory(App\Models\User::class)->create();

        \Auth::login($user);

        $this->call('POST', '/logout')
            ->isRedirect('/');
    }
}
