<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\enrollment;
use App\semester_courses;
use App\student_answers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Returns file: resources/views/student/courses/index.blade.php
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = enrollment::where('id_user','=', Auth::user()->id_user)
            ->join('semester_courses','enrollment.id_section','=','semester_courses.id_section')
            ->join('master_courses','semester_courses.id_master','=','master_courses.id_master')->get();

        return view('student.courses.index')->with('classes',$classes);
    }

    public function dashboard()
    {
        return view('student.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * Returns file: resources/views/student/courses/create.blade.php
     *
     * This is what is used to join a class
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = semester_courses::query()
            ->leftJoin('master_courses','semester_courses.id_master','=','master_courses.id_master')
            ->whereNotIn('id_section',function($query){
                $query->select('id_section')->from('enrollment')->where('id_user','=', Auth::user()->id_user);
            })
            ->where('isActive','=','1')
            ->get();
        $open = semester_courses::query()
            ->leftJoin('master_courses','semester_courses.id_master','=','master_courses.id_master')
            ->whereNotIn('id_section',function($query){
                $query->select('id_section')->from('enrollment')->where('id_user','=', Auth::user()->id_user);
            })
            ->count();

        return view('student.courses.create')->with('classes',$classes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * Returns file: resources/views/student/courses/show.blade.php
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $points = enrollment::select('class_points')->where('id_user','=',auth::user()->id_user)->where('id_section','=', $id)->first();
        $quizes = enrollment::where('enrollment.id_user','=', auth::user()->id_user)
            ->join('semester_courses','enrollment.id_section','=','semester_courses.id_section')
            ->join('quiz','semester_courses.id_section','=','quiz.id_section')
            ->where('quiz.id_section','=', $id)
            ->where('isOpen','=','1')
            ->get();
        $class = semester_courses::find($id);
        foreach($quizes as $quiz){
            $take = student_answers::where('id_user','=',Auth::user()->id_user)
                ->leftJoin('question','student_answers.id_question','=','question.id_question')
                ->where('id_quiz','=',$quiz->id_quiz)->count();
            $quiz->taken = $take;
        }
        return view('student.courses.show')->with('quizes',$quizes)->with('points',$points)->with('class',$class);
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
        //
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