<?php

namespace App\Http\Controllers;

use Fractal;
use App\Models\User;
use Illuminate\Http\Request;
use App\Transformers\UserTransformer;

class UsersController extends Controller
{
    /*
     * @var User
     */
    protected $user;

    /**
     * UsersController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->middleware('auth');

        $this->user = $user;
    }

    /**
     * Display the specified user.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     * @internal param $name
     */
    public function show(Request $request)
    {
        $user = $request->user();

        if ($request->isJson()) {
            return Fractal::item($user, new UserTransformer);
        }

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = $request->user();

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = $request->user();
        $user->update($request->all());

        if ($request->isJson()) {
            return Fractal::item($user, new UserTransformer);
        }

        return redirect()->route('users.show', ['slug' => $user->slug, 'id' => $user->id]);
    }

    /**
     * Remove the specified user from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Request $request)
    {
        $request->user()->delete();

        return redirect()->route('index');
    }
}
