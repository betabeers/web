<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        View::share('cssClass', $this->getCssClassFromRouteName(Route::currentRouteName()));
    }

    private function getCssClassFromRouteName($routeName)
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
