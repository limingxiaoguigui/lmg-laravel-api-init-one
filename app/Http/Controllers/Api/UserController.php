<?php
/*
 * @Description:
 * @Author: LMG
 * @Date: 2020-01-03 22:02:45
 * @LastEditors  : LMG
 * @LastEditTime : 2020-01-04 15:57:36
 */

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Api\UserResource;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use App\Jobs\Api\SaveLastTokenJob;

class UserController extends Controller
{
    /**
     * 返回用户列表
     * @return void
     */
    public function index()
    {
        //3个用户为一页

        $users = User::paginate(3);
        return UserResource::collection($users);
    }

    /**
     *  返回单一用户信息
     * @param \App\Models\User $user
     * @return void
     */
    public function show(User $user)
    {

        return $this->success(new UserResource($user));
    }

    /**
     *返回当前登录用户信息
     * @return void
     */
    public function info()
    {
        $user = Auth::user();
        return $this->success(new UserResource($user));
    }

    /**
     * 用户登录
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function login(Request $request)
    {
        $token = Auth::attempt(['name' => $request->name, 'password' => $request->password]);
        if ($token) {
            //如果登陆，先检查原先是否有存token，有的话先失效，然后再存入最新的token
            $user = Auth::user();
            if ($user->last_token) {
                try {
                    Auth::setToken($user->last_token)->invalidate();
                } catch (TokenExpiredException $e) {
                    //因为让一个过期的token再失效，会抛出异常，所以我们捕捉异常，不需要做任何处理
                }
            }
            SaveLastTokenJob::dispatch($user, $token);
            return $this->setStatusCode(201)->success(['token' => 'bearer ' . $token]);
        }
    }

    /**
     * 用户退出
     * @return void
     */
    public function logout()
    {
        Auth::logout();
        return $this->success('退出成功...');
    }
}