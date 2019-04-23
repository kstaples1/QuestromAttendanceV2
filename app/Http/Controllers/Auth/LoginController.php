<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\global_user_group;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';
    public function redirectTo()
    {
        $id_user = Auth::id();
        $userGroup = global_user_group::where('id_user','=',$id_user)
            ->join('user_groups','global_user_group.id_userGroup','=','user_groups.id_userGroup')
            ->orderby('priorityLevel')
            ->first();

        $role = $userGroup->groupName;

        // Check user role
        switch ($role) {
            case 'Admin':
                return '/admin';
                break;
            case 'Professor':
                return '/professor';
                break;
            case 'Student':
                return '/student';
                break;
            default:
                return '/login';
                break;
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
