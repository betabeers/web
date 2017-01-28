<?php

namespace Tests\Browser\Pages\User;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class Edit extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/user/edit';
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
            '@name' => 'input[name=name]',
            '@email' => 'input[name=email]',
        ];
    }
}
