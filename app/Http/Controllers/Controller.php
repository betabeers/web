<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\{Route, View};
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        View::share('cssClass', $this->getCssClassFromRouteName(Route::currentRouteName()));
    }

    /**
     * Get route name and transform it in css classes
     *
     * @param $routeName
     * @return string
     */
    private function getCssClassFromRouteName($routeName) : string
    {
        foreach (explode('.', $routeName) as $key => $segment) {
            if ($key == 0) {
                $classArray[0] = $segment;
            } else {
                $classArray[$key] = $classArray[$key-1].'-'.$segment;
            }
        }

        return implode(' ', $classArray);
    }
}
