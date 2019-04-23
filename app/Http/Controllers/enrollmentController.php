<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\quiz;
use App\semester_courses;
use App\enrollment;
use App\user_groups;
use Illuminate\Support\Facades\Auth;

class enrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Returns file: resources/views/professor/semester_courses/students.blade.php
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_section)
    {
        $courseData = semester_courses::where('id_section','=',$id_section)->with('master_courses')->first();
        $course = $courseData->master_courses->courseDepartment." ".$courseData->master_courses->courseNumber." ".$courseData->courseSection;

        $students = enrollment::where('id_section','=',$id_section)->with('users')->with('userGroup')->get();
        $roles = user_groups::pluck('groupName','id_userGroup');
        return view('professor.semester_courses.students')->with('students', $students)->with('roles',$roles)->with('course',$course);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * *********** This is from the STUDENTS side where they enroll in classes **************
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userGroup = user_groups::select('id_userGroup')->where('groupName','=','Student')->first();
        $points =  semester_courses::find($request->id_section);
        $enrollment = new enrollment;
        $enrollment->id_user = Auth::user()->id_user;
        $enrollment->id_section = $request->id_section;
        $enrollment->id_userGroup = $userGroup->id_userGroup;
        $enrollment->class_points = $points->defaultPoints;
        if($enrollment->save()){
            return redirect()->to('student/courses');
        }else{
            return "Failed";
        }
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
    public function update(Request $request, $id,$id_section)
    {

        $student = enrollment::find($id);
        $student->id_userGroup = $request->id_userGroup;
        $student->class_points = $request->class_points;
        if($student->save()){
            return redirect()->to('professor/courses/'.$id_section.'/enrollment');
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
    public function destroy($id, $id_section)
    {
        $student = enrollment::find($id);
        $student->delete();
        return redirect()->to('professor/courses/'.$id_section.'/enrollment');
    }
}
