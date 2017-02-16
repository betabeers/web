<?php
/**
 * Created by PhpStorm.
 * User: fcarrascosa
 * Date: 28/01/17
 * Time: 20:21
 */
?>

<header id="header" class="header">
    <nav class="navbar navbar-toggleable-sm">
        <div class="container">
            <div class="header-navigation">
                <div class="row">
                    <div class="col-12 col-lg-3 d-flex justify-content-start justify-content-md-center justify-content-lg-start">
                        <button class="navbar-toggler navbar-toggler-right align-self-center" type="button" data-toggle="collapse" data-target="#header-navigation-menu" aria-controls="header-navigation-menu" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="header-navigation-brand">
                            @if (Route::getCurrentRoute()->uri() == '/')
                                <h1 class="header-navigation-brand_title">
                                    <a class="navbar-brand" href="#">
                                        ßetabeers
                                    </a>
                                </h1>
                            @else
                                <div class="header-navigation-brand_title">
                                    <a class="navbar-brand" href="#">
                                        ßetabeers
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-lg-9 d-flex align-items-center justify-content-center justify-content-lg-end">
                        <div class="header-navigation-menu">
                            <div class="navbar-collapse collapse" id="header-navigation-menu">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link btn btn-link">
                                            Menu item 1
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle btn btn-link" id="header-navigation-menu_services" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Menu item 2
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="header-navigation-menu_services">
                                            <a class="dropdown-item" href="#">
                                                Submenu item 1
                                            </a>
                                        </div>
                                    </li>

                                    @if( Auth::guest() )

                                        <li class="nav-item">
                                            <a href="#" class="nav-link btn btn-link">
                                                Log in
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link btn btn-primary">
                                                Register
                                            </a>
                                        </li>

                                    @else

                                        <li class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle btn btn-link" id="header-navigation-menu_user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="header-navigation-menu_user" aria-expanded="false">
                                                <a class="dropdown-item" href="{{ route('users.edit') }}">Edit Account</a>
                                                <a class="dropdown-item" href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </ul>
                                        </li>

                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
