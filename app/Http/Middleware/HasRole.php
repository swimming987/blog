<?php

namespace App\Http\Middleware;

use App\Model\User;
use Closure;

class HasRole
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

//        1. 获取当前请求的路由 对应的控制器方法名
//        "App\Http\Controllers\Admin\LoginController@index"
        $route = \Route::current()->getActionName();
//        2. 获取当前用户的权限组
        $user = User::find(session()->get('user')->user_id);
//        2.1 获取当前用户的角色
        $roles = $user->role;
        $isSuperAdmin = false;  // 超级管理员无需权限验证
        $arr = [];
        foreach ($roles as $v){
            if ($v->id == 9) {
                $isSuperAdmin = true;
                break;
            }
            $perms =   $v->permission;
            foreach ($perms as $perm){
                $arr[] = $perm->per_url;
            }
        }
//        去掉重复的权限
        $arr = array_unique($arr);

//        判断当前请求的路由对应控制器的方法名是否在当前用户拥有的权限列表中也就是$arr中
        if($isSuperAdmin || in_array($route,$arr)){
            return $next($request);
        }else{
            return redirect('noaccess');
        }
    }
}
