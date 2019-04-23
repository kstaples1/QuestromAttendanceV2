<?php

namespace App\Http\Middleware;

use App\global_user_group;
use Closure;
use Illuminate\Support\Facades\Auth;


class CheckAdmin
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
        $user = Auth::id();
        $userGroup = global_user_group::where('id_user','=',$user)
            ->join('user_groups','global_user_group.id_userGroup','=','user_groups.id_userGroup')
            ->where('groupName','=','Admin')
            ->get();
        if($userGroup->isEmpty())
        {
            return redirect('/login');
        }
        return $next($request);

    }
}
