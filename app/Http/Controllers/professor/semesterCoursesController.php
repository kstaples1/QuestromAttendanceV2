<?php

namespace App\Http\Controllers\professor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\enrollment;
use App\master_courses;
use App\semester_courses;
use App\user_groups;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\quiz;

class semesterCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Returns file: resources/views/professor/semester_courses/index.blade.php
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = semester_courses::query()->join('master_courses','semester_courses.id_master','=','master_courses.id_master')->where('id_creator','=',Auth::user()->id_user)->get();
        return view('professor.semester_courses.index')->with('courses',$courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * Returns file: resources/views/professor/semester_courses/create.blade.php
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = master_courses::select('id_master', DB::raw("concat(courseDepartment, ' ',courseNumber) as courseName"))->pluck('courseName', 'id_master');
        return view('professor.semester_courses.create')->with('courses', $courses);
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
            'id_master' => Rule::unique('semester_courses')->where('semester', $request->semester)->where('year',$request->year)->where('courseSection', $request->courseSection)
        ));

        $course = new semester_courses;
        $course->id_master = $request->id_master;
        $course->id_creator = Auth::user()->id_user;
        $course->courseSection = $request->courseSection;
        $course->defaultPoints = $request->defaultPoints;
        $course->semester = $request->semester;
        $course->can_view_points = 0;
        $course->year = $request->year;
        $course->save();

        return redirect()->to('professor/courses') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->to('professor/courses/'.$id.'/enrollment');
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
        $course = semester_courses::find($id);
        $course->courseSection = $request->courseSection;
        $course->defaultPoints = $request->defaultPoints;
        $course->semester = $request->semester;
        $course->year = $request->year;
        $course->isActive = $request->isActive;
        $course->can_view_points = $request->can_view_points;

        if($course->update()){
            return redirect()->to('professor/courses');
        }else{
            return "Failed";
        }
    }

    public function viewClass($id_section)
    {
        $courseData = semester_courses::where('id_section','=',$id_section)->with('master_courses')->first();
        $course = $courseData->master_courses->courseDepartment." ".$courseData->master_courses->courseNumber." ".$courseData->courseSection;
        $quizes = quiz::where('id_section','=',$id_section)->get();
        $students = enrollment::where('id_section','=',$id_section)->with('users')->with('userGroup')->get();
        $roles = user_groups::pluck('groupName','id_userGroup');

        return view('professor.semester_courses.class')->with('students', $students)->with('roles',$roles)->with('course',$course)->with('quizes',$quizes)->with('id_section',$id_section);
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
