<?php

namespace App\Http\Middleware;

use App\global_user_group;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CheckStudent
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
        $userGroup = \App\global_user_group::where('id_user','=',$user)
            ->join(

                DB::raw('(SELECT * FROM user_groups WHERE groupName = "Admin" OR groupName = "Professor" OR groupName = "Student") as user_groups'),
                function($join){
                    $join->on('user_groups.id_userGroup','=','global_user_group.id_userGroup');
                })

            ->get();
        if($userGroup->isEmpty())
        {
            return redirect('/login');
        }
        return $next($request);
    }
}
