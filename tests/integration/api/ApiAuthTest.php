<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ApiAuthTest extends TestCase
{
    use DatabaseMigrations;

    public function test_password_reset()
    {
        $user = factory(App\Models\User::class)->create();

        $this->json('POST', 'api/password/reset', ['email' => $user->email]);

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
}
