<?php

namespace App\Http\Controllers\admin;

use App\global_user_group;
use App\user_groups;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class globalUserGroupController extends Controller
{
    /**
     * Displays the main page of the global user group
     *
     * Returns file: resources/views/admin/userGroup/globalUserGroup.blade.php
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $globalUsers = DB::table('global_user_group')->join('user_groups','global_user_group.id_userGroup','=','user_groups.id_userGroup')->join('users','global_user_group.id_user','=','users.id_user')->get();
        return view('admin.userGroup.globalUserGroup')->with('globalUsers', $globalUsers);
    }

    /**
     * Shows the page to create a global user group
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('userName','id_user');
        $user_group = user_groups::pluck('groupName','id_userGroup');
        return view('admin.userGroup.globalUserCreate')->with('users', $users)->with('user_group',$user_group);
    }

    /**
     * Stores a new created global user group
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, array(
            'id_user'=>"uniqueGlobalUserGroup:{$request->id_userGroup}"
        ));
        $userGroup = new global_user_group;
        $userGroup->id_user = $request->id_user;
        $userGroup->id_userGroup = $request->id_userGroup;
        $userGroup->save();

        return redirect()->to('admin/global');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_user, $id_userGroup)
    {
        $globalUser = global_user_group::query()->where('id_user',$id_user)->where('id_userGroup',$id_userGroup);
        $globalUser->delete();

        return redirect()->to('/admin/global');

    }
}

