@extends('layouts.empty')

@section('content')
        <div class="login">
            <h1 class="login-title text-center">ßetabeers</h1>
            <div class="login-container">
                <form class="form-horizontal login-form" role="form" method="POST" action="{{ route('users.login.post') }}">
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
                            Login
                        </button>

                        <a class="btn btn-link" href="{{ route('users.password.email.form') }}">
                            Forgot Your Password?
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
@endsection
