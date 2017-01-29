@extends('layouts.empty')

@section('content')
        <div class="login">
            <h1 class="login-title text-center">ßetabeers</h1>
            <div class="login-container">
                <form class="form-horizontal login-form" role="form" method="POST" action="/login">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? 'has-herror' : '' }}">
                        <label for="email" class="login-form-label login-form-label_email form-control-label">
                            E-mail Address
                        </label>
                        <input name="email" type="email" id="login-form-email" class="form-control login-form-input login-form-input_email" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="login-form-label login-form-label_password form-control-label">
                            Password
                        </label>
                        <input name="password" type="password" id="login-form-email" class="form-control login-form-input login-form-input_password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            {{ trans('users.login') }}
                        </button>
                        <a href="" class="btn btn-secondary">
                            {{ trans('users.register') }}
                        </a>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-link" href="#" data-toggle="modal" data-target="#modal-password-reset" aria-hidden="true">
                            {{ __('users.forgotPassword') }}
                        </a>
                    </div>
                </form>
            </div>
            <div class="text-center">
                <a href="/" class="login-back">
                    Home
                </a>
            </div>
        </div>

        <div class="modal fade" id="modal-password-reset" aria-hidden="true">

            <div class="modal-dialog" role="form">

                <div class="modal-content">

                    <div class="modal-header">
                        {{ trans('users.passwordRecovery') }}
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <form method="POST" action="{{ route('api.v1.password_reset') }}" id="modal-password-reset-form">
                            <div class="form-group">
                                <label for="email" class="form-control-label">
                                    Email
                                </label>
                                <input type="email" name="email" placeholder="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary">
                                    <span>Recuperar Contraseña</span>
                                </button>
                            </div>
                            <div class="messages" style="display: none"></div>
                        </form>

                    </div>

                </div>

            </div>

        </div>
@endsection
