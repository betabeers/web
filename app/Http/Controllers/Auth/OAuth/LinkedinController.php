<?php

namespace App\Http\Controllers\Auth\OAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LinkedinCallbackRequest;

class LinkedinController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    public function handleProviderCallback(LinkedinCallbackRequest $request)
    {
        try {
            $user = Socialite::driver('linkedin')->user();
        } catch (Exception $e) {
            return redirect()->route('index')->with('error', 'Error on authentication process');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect()->route('index');
    }

    public function findOrCreateUser($user, $provider = null)
    {
        $authUser = User::where('email', $user->email)->first();
        if ($authUser) {
            $authUser->linkedin_id = $user->id;
            $authUser->name = $user->name;
            $authUser->save();
            return $authUser;
        }

        $userData = [
            'linkedin_id'    => $user->id,
            'email'         => $user->email,
            'name'          => $user->name,
            'slug'          => str_slug($user->name),
            'password'      => bcrypt(time().rand())
        ];

        return User::create($userData);
    }
}
