<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Tests\Browser\Pages\User\Edit;
use Tests\Browser\Pages\User\Profile;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @group user
     */
    public function testProfilePage()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)
                    ->visit(new Profile($user))
                    ->assertSee($user->name);
        });
    }

    /**
     * @group user
     */
    public function testEditPageAndUpdateUser()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)
                    ->visit(new Edit)
                    ->assertInputValue('name', $user->name)
                    ->assertInputValue('email', $user->email)
                    ->type('name', 'Updated')
                    ->press('Update')
                    ->on(new Profile($user))
                    ->assertSee('Updated');
        });
    }
}
