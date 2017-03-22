<?php
/**
 * Created by PhpStorm.
 * User: fcarrascosa
 * Date: 27/02/17
 * Time: 0:56
 */

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use App\Models\UserFollow;
use App\Http\Controllers\Api\BaseApiController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Notification;
use Validator;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserFollowController extends BaseApiController
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function follow_user(Request $data)
    {

        UserFollow::create([
            'from_id' => $data['from_id'],
            'to_id' => $data['to_id'],
        ]);

        return response([
            'status' => 'success',
            'message' => __('userFollow.success')
        ], 200);

    }

    public function unfollowUser(Request $request)
    {

    }
}