<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\BaseApiController;
use App\Models\User;
use Exception;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Notification;
use Validator;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
            return $this->errorResponse(
                $validator->messages()->first(),
                422,
                $validator->messages()->all()
            );
        }

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return response([], 204);
    }

    public function broker()
    {
        return Password::broker();
    }
}