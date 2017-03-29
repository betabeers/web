@extends('layouts.empty')

@section('content')
<div class="register">
    <h1 class="register-title text-center">ßetabeers</h1>
    <div class="register-container">
        <div class="row">
            <div class="col-12 col-md-6">
                <form class="form-horizontal register-method register-method_form" role="form" method="POST" action="/register">
                    {{ csrf_field() }}
                    <h2 class="register-method-title">{{ trans('users.register_form') }}</h2>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-12 control-label">Name</label>

                        <div class="col-12">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-12 control-label">E-Mail Address</label>

                        <div class="col-12">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-12 control-label">Password</label>

                        <div class="col-12">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-12 control-label">Confirm Password</label>

                        <div class="col-12">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="job_role" class="col-12 control-label">What do you do?</label>
                        <div class="col-12">
                            <select id="job_role" name="job_role" class="form-control">
                                @foreach(config('betabeers.users.job_roles') as $job_role):
                                <option value="{{ $job_role }}">{{ trans('users.job_roles.'.$job_role) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                {{ trans('users.register') }}
                            </button>
                            <a href="{{ route('users.login') }}" class="btn btn-secondary">{{ trans('users.login') }}</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6">
                <div class="register-method register-method_social">
                    <div class="row">
                        <h2 class="register-method-title">{{ trans('users.register_social') }}</h2>
                        <div class="col-12">
                            <p class="register-method-legend">Es rápido y fácil</p>
                            <a href="{{ route('auth.oauth.twitter.redirect') }}" class="btn btn-twitter">
                                <i class="fa fa-twitter"></i> Twitter
                            </a>
                            <a href="{{ route('auth.oauth.linkedin.redirect') }}" class="btn btn-linkedin">
                                <i class="fa fa-linkedin"></i> LinkedIn
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
