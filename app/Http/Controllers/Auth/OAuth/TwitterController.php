<?php

namespace App\Http\Controllers\Auth\OAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TwitterCallbackRequest;

class TwitterController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallback(TwitterCallbackRequest $request)
    {
        try {
            $user = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('auth/twitter');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect()->route('index');
    }

    public function findOrCreateUser($user, $provider = null)
    {
        $authUser = User::where('email', $user->email)->first();
        if ($authUser) {
            $authUser->twitter_id = $user->id;
            $authUser->save();
            return $authUser;
        }

        $userData = [
            'twitter_id'    => $user->id,
            'email'         => $user->email,
            'name'          => $user->name,
            'slug'          => str_slug($user->name),
            'password'      => bcrypt(time().rand())
        ];

        return User::create($userData);
    }
}
