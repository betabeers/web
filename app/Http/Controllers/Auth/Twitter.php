<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

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

        $userData = [
            'email'         => $user->email,
            'twitter_id'    => $user->id
        ];

        $authUser = User::firstOrCreate($userData);

        Auth::login($authUser, true);

        return redirect()->route('index');
    }
}
