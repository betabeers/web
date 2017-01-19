<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        return view('users.show', ['user' => $request->user()]);
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return view('users.edit', ['user' => $request->user()]);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->user()->update($request->all());

        return redirect()->route('users.show', ['slug' => $request->user()->slug, 'id' => $request->user()->id]);
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
