<?php

namespace App\Http\Controllers\professor;


use App\options;
use App\question;
use App\quiz;
use Illuminate\Http\Request;
use App\semester_courses;
use App\Http\Controllers\Controller;

class quizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Returns file: resources/views/professor/quiz/index.blade.php
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_section)
    {
        $courseData = semester_courses::where('id_section','=',$id_section)->with('master_courses')->first();
        $quizes = quiz::where('id_section','=',$id_section)->get();
        $course = $courseData->master_courses->courseDepartment." ".$courseData->master_courses->courseNumber." ".$courseData->courseSection;
        return view('professor.quiz.index')->with('quizes',$quizes)->with('id_section',$id_section)->with('course',$course);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_section)
    {
        $quiz = new quiz;
        $quiz->title = $request->title;
        $quiz->id_section = $id_section;
        $quiz->can_bet = 1;
        $quiz->isOpen = 0;
        if($quiz->save()){
            return redirect()->to('professor/courses/'.$id_section.'/quiz');
        }else{
            return "Failed";
        }
    }

    /**
     * Display the specified resource.
     *
     * Returns file: resources/views/professor/quiz/show.blade.php
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_section, $id_quiz)
    {
        $quiz = quiz::find($id_quiz)->master_courses();
        $quizName = quiz::find($id_quiz);
        $questions = question::where('id_quiz','=',$id_quiz)->get();
        $options = question::where('id_quiz','=',$id_quiz)
            ->leftjoin('options','question.id_question','=','options.id_question')
            ->get();
        return view('professor.quiz.show')->with('quiz',$quiz)
            ->with('quizName',$quizName)
            ->with('questions',$questions)
            ->with('id_section',$id_section)
            ->with('id_quiz',$id_quiz)
            ->with('options', $options);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('professor.quiz.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_section, $id_quiz)
    {
        $quiz = quiz::find($id_quiz);
        $quiz->title = $request->title;
        $quiz->can_bet = $request->can_bet;
        $quiz->isOpen = $request->isOpen;
        if($quiz->update()){
            return redirect()->to('professor/courses/'.$id_section.'/quiz');
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
    public function destroy($id_section, $id_quiz)
    {
        $quiz = quiz::find($id_quiz);
        $quiz->delete();
        return redirect()->to('professor/courses/'.$id_section.'/quiz');
    }
}

