<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\options;
use App\question;
use App\quiz;
use App\semester_courses;
use App\student_answers;
use Illuminate\Support\Facades\Auth;
use App\enrollment;
use Illuminate\Support\Facades\DB;

class student_answersController extends Controller
{

    /**
     * Display the specified resource.
     *
     * Returns file: resources/views/student/quiz/show.blade.php
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_section, $id_quiz)
    {
        $quiz = quiz::find($id_quiz)->master_courses();
        $quizName = quiz::find($id_quiz);
        $questions = question::where('question.id_quiz','=',$id_quiz)->join('quiz','quiz.id_quiz','=','question.id_quiz')->where('quiz.id_section','=',$id_section)->get();
        $numQuestions = question::where('question.id_quiz','=',$id_quiz)->join('quiz','quiz.id_quiz','=','question.id_quiz')->where('quiz.id_section','=',$id_section)->count();
        $take = student_answers::where('id_user','=',Auth::user()->id_user)
            ->leftJoin('question','student_answers.id_question','=','question.id_question')
            ->join('quiz','quiz.id_quiz','=','question.id_quiz')
            ->where('quiz.id_section','=',$id_section)
            ->where('question.id_quiz','=',$quiz->id_quiz)
            ->count();
        $points = enrollment::select('class_points')->where('id_user','=',Auth::user()->id_user)->where('id_section','=',$id_section)->first();
        $options = question::where('id_quiz','=',$id_quiz)
            ->leftjoin('options','question.id_question','=','options.id_question')
            ->get();

        // Get the number of options per question.
        $optionNum = question::select(DB::Raw('question.id_question, count(*) as count'))->join('options','options.id_question','=','question.id_question')->groupby('question.id_question')->get();

        $points = $points->class_points/$numQuestions; // gets total points per question allowed
        if($take > 0 || !$this->isQuiz($id_section,$id_quiz))
        {
            return back();
        }
        else
        {
            return view('student.quiz.show')
                ->with('questions',$questions)
                ->with('quiz',$quiz)
                ->with('quizName',$quizName)
                ->with('options',$options)
                ->with('points',$points)
                ->with('optionNum',$optionNum);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Stores and grades the quiz taken
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, $id_quiz)
    {


        //Get the user Enrollment points
        $section = quiz::find($id_quiz)->with('semester_courses')->first();
        $userEnroll = enrollment::where('id_user','=',Auth::user()->id_user)->where('id_section','=',$section->id_section)->first();
        $user = enrollment::find($userEnroll->id_enrollment);

        //Get Quiz
        $quiz = quiz::find($id_quiz);

        //requests and stuff
        $req = $request->all();
        $keys = array_keys($req);
        $keys2 = $keys;
        $matches = $this->search_array($keys, "bet_");

        unset($keys[0]); // removes "_token"

        //Removes all Bet_ items
        foreach($matches as $match)
        {
            unset($keys[$match]);
        }
        //Set points
        $points = 0;
        foreach($keys as $key)
        {
            $answer = new student_answers;
            $answer->id_user = Auth::user()->id_user;

            //Appends bet to each question
            foreach($matches as $match=>$value){
                if($key == substr($keys2[$value],4)){
                    $answer->bet = $req[$keys2[$value]];
                }
            }

            //Checks if it is short answer
            if(substr($key,0,6)=="short_")
            {
                $answer->id_question = substr($key,6,7);
                $answer->answer = $req[$key];

            }elseif (substr($key,0,3)=="MC_"){
                $answer->id_question = substr($key,strpos($key,"_",3)+1);
                $answer->id_option = substr($key,strpos($key,"_")+1);
            }
            else{
                $answer->id_question = $key;
                $answer->id_option = $req[$key];

                //Get option answers
                $isCorrect = options::where('id_option','=',$answer->id_option)->first();

                //This is where scoring happens
                if($isCorrect->isCorrect == 1)
                {
                    $points = $points + $answer->bet;
                }else
                {
                    $points = $points - $answer->bet;
                }
            }


            $answer->save();
        }

        //Sets users total points
        $user->class_points = $user->class_points + $points;


        //Checks if you can bet
        if($quiz->can_bet == 1){
            if($user->update()){
                return redirect('/student/courses');
            }else{
                return "Failed";
            }

        }else{
            return redirect('/student/courses');
        }

        // return view('test2')->with('keys',$keys);
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

    public function isQuiz($id_section, $id_quiz)
    {
        $isQuiz = quiz::where('quiz.id_section','=',$id_section)
            ->where('quiz.id_quiz','=',$id_quiz)
            ->count();
        if($isQuiz>0)
        {
            return True;
        }
        else
        {
            return False;
        }
    }

    public function isEnrolled($id_section)
    {
        $enrolled = enrollment::where('enrollment.id_user','=', auth::user()->id_user)->where('id_section','=',$id_section)->count();
        return $enrolled;
    }

    public function search_array($arr, $term)
    {
        $matches = [];
        foreach ($arr AS $key =>$value) {
            if (stristr($value, $term) === FALSE) {
                continue;
            } else {
                array_push($matches, $key);
            }
        }
        return $matches;
    }
}
