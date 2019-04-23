<?php

namespace App\Http\Controllers\admin;


use App\master_courses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class masterCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Returns file: resources/views/admin/masterCourses/index.blade.php
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = master_courses::all();
        return view('admin.masterCourses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * Returns file: resources/views/admin/masterCourses/create.blade.php
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.masterCourses.create');
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
            'classTitle'=>'required',
            'courseDepartment'=>"uniqueMasterClass:{$request->courseNumber}| required",
            'courseNumber'=>'required',
            'description'=>'required',
        ));

        $masterCourse = new master_courses;
        $masterCourse->classTitle = $request->classTitle;
        $masterCourse->courseDepartment = $request->courseDepartment;
        $masterCourse->courseNumber = $request->courseNumber;
        $masterCourse->description = $request->description;
        $masterCourse->save();

        return redirect()->to('admin/courses');
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
        $masterCourse = master_courses::find($id);
        $masterCourse->classTitle = $request->classTitle;
        $masterCourse->courseDepartment = $request->courseDepartment;
        $masterCourse->courseNumber = $request->courseNumber;
        $masterCourse->description = $request->description;
        if($masterCourse->update()){
            return redirect()->to('admin/courses/');
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