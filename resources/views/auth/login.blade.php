@extends('layouts.empty')

@section('content')
        <div class="login">
            <h1 class="login-title text-center">ßetabeers</h1>
            <div class="login-container">
                <form class="form-horizontal login-form" method="POST" action="/login">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? 'has-herror' : '' }}">
                        <label for="login-form-email" class="login-form-label login-form-label_email form-control-label">
                            {{ __('users.email') }}
                        </label>
                        <input name="email" type="email" id="login-form-email" class="form-control login-form-input login-form-input_email" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="login-form-password" class="login-form-label login-form-label_password form-control-label">
                            {{ __('users.password') }}
                        </label>
                        <input name="password" type="password" id="login-form-password" class="form-control login-form-input login-form-input_password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> {{ __('users.remember') }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            {{ trans('users.login') }}
                        </button>
                        <a href="{{ Route('users.register') }}" class="btn btn-secondary">
                            {{ trans('users.register') }}
                        </a>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-link pl-0" href="#" data-toggle="modal" data-target="#modal-password-reset" aria-hidden="true">
                            {{ __('users.forgotPassword') }}
                        </a>
                    </div>
                </form>
                <a href="{{ route('auth.twitter.redirect') }}" class="btn btn-primary">
                    <i class="fa fa-twitter"></i> {{ trans('users.login.twitter') }}
                </a>
            </div>
            <div class="text-center">
                <a href="" class="login-back">
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
                                <label for="modal-password-reset-form-email" class="form-control-label">
                                    {{__('users.email')}}
                                </label>
                                <input id="modal-password-reset-form-email" type="email" name="email" placeholder="{{ __('users.email') }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary">
                                    <span>{{ __('users.forgotPassword') }}</span>
                                </button>
                            </div>
                            <div class="messages" style="display: none"></div>
                        </form>

                    </div>

                </div>

            </div>

        </div>
@endsection
