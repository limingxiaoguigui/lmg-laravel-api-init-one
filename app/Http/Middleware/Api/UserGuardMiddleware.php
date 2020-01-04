<?php
/*
 * @Description:
 * @Author: LMG
 * @Date: 2020-01-04 14:12:09
 * @LastEditors: LMG
 * @LastEditTime: 2020-01-04 14:12:34
 */

namespace App\Http\Middleware\Api;

use Closure;

class UserGuardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        config(['auth.defaults.guard' => 'api']);
        return $next($request);
    }
}