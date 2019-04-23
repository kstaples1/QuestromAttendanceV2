<?php

namespace App\Http\Controllers\professor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\options;
use App\question;
use App\quiz;

class optionsController extends Controller
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
        $this->validate($request, array(
            'option'=>'required',
            'id_question'=>'required',
        ));
        $quiz = question::find($request->id_question);
        $options = new options;
        $options->id_question = $request->id_question ;
        $options->option = $request->option;
        $options->isCorrect = 0;
        if($options->save()){
            return redirect()->to('professor/courses/'.$id_section.'/quiz/'.$quiz->id_quiz);
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
    public function update(Request $request, $id_section, $id_option)
    {


        $option = options::find($id_option);
        $question = question::find($request->id_question);
        $option->option = $request->option;
        $option->isCorrect = $request->isCorrect;
        if($option->update()){
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
    public function destroy($id_section, $id_option)
    {
        $option = options::find($id_option);
        if($option->delete()){
            return back();
        }else{
            return "Failed";
        }
    }
}
