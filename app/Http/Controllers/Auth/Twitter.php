<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Twitter extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallback()
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
        $authUser = User::where('twitter_id', $user->id)->first();
        if ($authUser) {
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
