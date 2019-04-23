<?php

namespace App\Http\Controllers\professor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\question;

class questionController extends Controller
{
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_section)
    {

        $question = new question;
        $question->id_quiz = $request->id_quiz;
        $question->question_label = $request->question_label;
        $question->question_type = $request->question_type;
        if($question->save()){
            return redirect()->to('professor/courses/'.$id_section.'/quiz/'.$request->id_quiz);
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
    public function update(Request $request, $id_section, $id_question)
    {
        $question = question::find($id_question);
        $question->question_label = $request->question_label;
        $question->question_type = $request->question_type;
        if($question->update()){
            return redirect()->to('professor/courses/'.$id_section.'/quiz/'.$question->id_quiz);
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
    public function destroy($id_section,$id_question)
    {
        $question = question::find($id_question);
        $question->delete();
        return redirect()->to('professor/courses/'.$id_section.'/quiz/'.$question->id_quiz);
    }
}
