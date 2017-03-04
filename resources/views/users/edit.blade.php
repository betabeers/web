@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-4 hidden-sm-down">
            @include('users.edit.sidebar')
        </div>
        <div class="col-12 col-md-8">
            <form id="users-edit-form edit" role="form" method="POST" action="{{ route('users.update') }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="card">
                    <div id="edit-general" class="edit-general">
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
                                            <textarea id="body" class="form-control" name="body">{{ $user->body }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="lookingfor" class="control-label">What do you expect from ßetabeers?</label>
                                            <textarea id="lookingfor" class="form-control" name="lookingfor">{{ $user->lookingfor }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="profile_image" class="control-label">
                                            Your photo
                                        </label>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                {{--<input type="file" name="profile_image" id="js-upload-files" class="form-control hidden-sm-up">--}}
                                                <div class="droppable hidden-sm-down">
                                                    Just Drag and Drop your files here
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 hidden-sm-down">
                                                <img src="https://placehold.it/400x400" width="100%" style="border-radius: 50%;">
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
                </div>
                <br>
                <div class="card">
                    <div id="edit-social" class="edit-social">
                        <div class="card-header">
                            Contact Information
                        </div>
                        <div class="card-block">
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
                                    </div><div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="github_url" class="control-label">Github:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-github"></i>
                                                </div>
                                                <input type="text" class="form-control" id="github-url" name="github_url" placeholder="http://github.com/betabeers" value="{{ $user->facebook_url }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="linkedin_url" class="control-label">Linkedin:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-linkedin"></i>
                                                </div>
                                                <input type="text" class="form-control" id="linkedin-url" name="linkedin_url" placeholder="http://linkedin.com/in/betabeers" value="{{ $user->linkedin_url }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="youtube_url" class="control-label">YouTube:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-youtube"></i>
                                                </div>
                                                <input type="text" class="form-control" id="youtube-url" name="youtube_url" placeholder="http://youtube.com/betabeers" value="{{ $user->youtube_url }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="dribbble_url" class="control-label">Dribbble:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-dribbble"></i>
                                                </div>
                                                <input type="text" class="form-control" id="dribbble-url" name="dribbble_url" placeholder="http://dribbble.com/betabeers" value="{{ $user->dribbble_url }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="stackoverflow_url" class="control-label">Stackoverflow:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-stack-overflow"></i>
                                                </div>
                                                <input type="text" class="form-control" id="stackoverflow-url" name="stackoverflow_url" placeholder="http://stackoverflow.com/users/0000000/betabeers" value="{{ $user->linkedin_url }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="url" class="control-label">Web / Blog:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-chrome"></i>
                                                </div>
                                                <input type="text" class="form-control" id="url" name="url" placeholder="http://betabeers.com" value="{{ $user->url }}">
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
                </div>
                <br>
                <div class="card">
                    <div id="edit-skills" class="edit-skills">
                        <div class="card-header">
                            Skills and challenges
                        </div>
                        <div class="card-block">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <p class="h4">I'm the best in:</p>
                                        <select id="category-id" name="job_role" class="form-control">
                                            @foreach(config('betabeers.users.job_roles') as $job_role):
                                                <option value="{{ $job_role }}" {{ $user->job_role === $job_role ? 'selected' : '' }}>{{ trans('users.job_roles.'.$job_role) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <p class="h4">I want to learn </p>
                                        <textarea name="txt_tags" class="form-control"></textarea>
                                    </div>
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
