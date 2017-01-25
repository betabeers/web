<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\BaseApiController;
use App\Models\User;
use Dingo\Api\Exception\ResourceException;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Notification;
use Validator;

class AuthController extends BaseApiController
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function password_reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email'
        ]);

        if ($validator->fails()) {
            throw new ResourceException("Error Processing Request", $validator->errors());
        }

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $this->response->noContent();
    }

    public function broker()
    {
        return Password::broker();
    }
}