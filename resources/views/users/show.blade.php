@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 m-auto">
                <div class="user">
                    <div class="user-header text-center">
                        <h1 class="h1">{{$user->name}}</h1>
                        <h3 class="h3">{{ __('users.job_roles.'.$user->job_role) }}</h3>
                    </div>
                    <div class="user-block text-center">
                        {{ $user->body }}
                        <h4 class="h4">{{ __('users.lookingfor') }}</h4>
                        {{ $user->lookingfor }}
                    </div>
                    <div class="user-footer text-center p-0">
                        <div class="row no-gutters">
                            <div class="col-6">
                                <small>{{ __('users.followers') }}</small><br>
                                <!-- TODO: Add getFollowers() Method-->
                                {{ $user->followers()->count() > 0 ? '<a class="user-followers-link" href="">': '' }}
                                    {{ $user->followers()->count() }}
                                {{ $user->followers()->count() > 0 ? '</a>': '' }}
                            </div>
                            <div class="col-6">
                                <small>{{ __('users.following') }}</small><br>
                                <!-- TODO: Add getFollowing() Method-->
                                {!! $user->following()->count() > 0 ? '<a class="user-followers-link" href="">': '' !!}
                                    {{ $user->following()->count() }}
                                {!! $user->following()->count() > 0 ? '</a>': '' !!}
                            </div>
                            <div class="col-12">
                                <a href="#" class="follow btn btn-success btn-block" data-user-id="{{ $user->id }}">
                                    {{ __('users.follow') }}
                                </a>
                                <a href="#" class="btn btn-danger btn-block">
                                    {{ __('users.unfollow') }}
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        jQuery('.follow').click(function(e){
            var $data = {}
                $data.followerId = {{ Auth::user()->id }};
                $data.userId = jQuery(this).data('user-id');

            e.preventDefault();

            jQuery.ajax({
               url: '{{ route('api.v1.user_follow') }}',
               method: 'post',
               data: {
                   'from_id': $data.followerId,
                   'to_id': $data.userId,
               },
               success: function(response){
                   console.log('response');
                   alert('user followed')
               },
               error: function(response){
                   console.log(response);
                   alert('error')
               }
           });
        });
    </script>
@endsection
