@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <form id="users-edit-form edit" role="form" method="POST" action="{{ route('users.update') }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="card">
                    <div class="edit-general">
                        <div class="card-header">
                            General Information
                        </div>
                        <div class="card-block">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="control-label">Name</label>
                                            <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="control-label">E-Mail Address</label>
                                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="slug" class="control-label">Slug</label>
                                            <input id="slug" type="text" class="form-control" name="slug" value="{{ $user->slug }}" required>
                                            @if ($errors->has('slug'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('slug') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="location" class="control-label">City</label>
                                            <input id="location" type="text" class="form-control" name="location" value="{{ $user->location }}" required>
                                            @if ($errors->has('city'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('city') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="body" class="control-label">Description</label>
                                            <textarea id="body" class="form-control" name="body">
                                                {{ $user->body }}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="lookingfor" class="control-label">What do you expect from ßetabeers?</label>
                                            <textarea id="lookingfor" class="form-control" name="lookingfor">
                                                {{ $user->lookingfor }}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">
                                            <span>Submit</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="edit-social">
                        <div class="card-header">
                            Contact Information
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="twitter_url" class="control-label">Twitter:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-twitter"></i>
                                            </div>
                                            <input type="text" class="form-control" id="twitter-url" name="twitter_url" placeholder="http://twitter.com/betabeers" value="{{ $user->twitter_url }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="facebook_url" class="control-label">Facebook:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-facebook"></i>
                                            </div>
                                            <input type="text" class="form-control" id="facebook-url" name="facebook_url" placeholder="http://facebook.com/betabeers" value="{{ $user->facebook_url }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">
                                        <span>Submit</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
