<?php

namespace App\Http\Controllers;

use App\global_user_group;
use App\User;
use Illuminate\Http\Request;
use App\semester_courses;
use App\enrollment;
use App\user_groups;
use App\quiz;

class dashboardController extends Controller
{
    public function admin()
    {
        $admins = global_user_group::where('groupName','=','Admin')->join('user_groups','global_user_group.id_userGroup','=','user_groups.id_userGroup')->join('users','global_user_group.id_user','=','users.id_user')->get();
        $users = User::all();
        return view('admin.index')->with('admins',$admins)->with('users',$users);
    }

    public function professor()
    {
        return redirect('/professor/courses');
    }

    public function student()
    {
        return redirect('/student/courses');
    }

}
