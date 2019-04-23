<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\user_groups;

class userGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Returns file: resources/views/admin/userGroup/index.blade.php
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userGroups = user_groups::all();
        return view('admin.userGroup.index')->with(compact('userGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * Returns file: resources/views/admin/userGroup/create.blade.php
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.userGroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'groupName'=>'required|unique:user_groups,groupName',
            'priorityLevel'=>'required',
        ));

        $userGroup = new user_groups;
        $userGroup->groupName = $request->groupName;
        $userGroup->priorityLevel = $request->priorityLevel;
        $userGroup->save();

        return redirect()->to('admin/usergroup');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userGroup = user_groups::find($id);
        $userGroup->groupName = $request->groupName;
        $userGroup->priorityLevel = $request->priorityLevel;

        if($userGroup->save()){
            return redirect()->to('admin/usergroup');
        }else{
            return "Failed";
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
