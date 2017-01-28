<?php

namespace Tests\Browser\Pages\User;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class Profile extends BasePage
{
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/user/' . $this->user->slug . '-' . $this->user->id;
    }

    /**
     * Assert that the browser is on the page.
     *
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
