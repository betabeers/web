<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public function test_user_profile()
    {
        $user = factory(App\Models\User::class)->create();

        $this->actingAs($user)
            ->visitRoute('users.show', ['slug' => $user->slug, 'id' => $user->id])
            ->see($user->name);
    }

    public function test_update_user()
    {
        $user = factory(App\Models\User::class)->create();

        $this->actingAs($user)
            ->visitRoute('users.edit')
            ->type('New name', 'name')
            ->press('Update')
            ->seeInDatabase('users', [
                'name' => 'New name'
            ]);
    }

    public function test_destroy_user()
    {
        $user = factory(App\Models\User::class)->create();

        $this->actingAs($user)
            ->call('DELETE', route('users.destroy'));

        $this->notSeeInDatabase('users', [
            'name' => $user->name
        ]);
    }
}
