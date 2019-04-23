@extends('layouts.app')
@section('content')
    <?php
/**
 * Created by PhpStorm.
 * User: Kyle_Staples
 * Date: 4/9/19
 * Time: 3:53 PM
 */

    /**
     * Route: /professor/courses/{id_section}/quiz
     *
     * Controller: /app/Http/Controllers/professor/quizController.php
     *
     * Function: quizController@show
     *
     * Variables:
     *      $quizName
     *          - Name of the quiz
     *
     *      $questions
     *          - Get all questions that belong to the quiz
     *
     *      $id_section
     *          - class section id
     *
     *      $id_quiz
     *          - Quiz id
     *
     *      $options
     *          - All options that belong to the quiz
     *
     * Form: Creates a question for the quiz
     *      Call: POST
     *      Route: /professor/courses/{id_section}/question/{id_quiz}
     *      Controller: /app/Http/Controllers/professor/questionController.php
     *      Function: questionController@create
     *
     * Form: Updates a question for the quiz
     *      Call: PUT
     *      Route: /professor/courses/{id_section}/question/{id_quiz}
     *      Controller: /app/Http/Controllers/professor/questionController.php
     *      Function: questionController@update
     *
     * Form: Creates an option for the question in the quiz
     *      Call: POST
     *      Route: /professor/courses/{id_section}/option/{id_option}
     *      Controller: /app/Http/Controllers/professor/optionsController.php
     *      Function: optionsController@store
     *
     * Form: Updates an option for the question in the quiz
     *      Call: PUT
     *      Route: /professor/courses/{id_section}/option/{id_option}
     *      Controller: /app/Http/Controllers/professor/optionsController.php
     *      Function: optionsController@update
     *
     */

?>

<div class="jumbotron">
    <small>
        {{$quiz->courseDepartment}} {{$quiz->courseNumber}} {{$quiz->courseSection}} {{$quiz->semester}} {{$quiz->year}}
    </small>
    <div class="h1">
        {{$quizName->title}}
    </div>
    <div class="row">
        <div class="col-5">
            {!! Form::model($id_section, array('route' => ['professor.question.store', $id_section], 'method'=>'POST', 'id'=>'create')) !!}
            {{Form::text('question_label',$quiz->title, array('class'=>'form-control'))}}
            {{Form::hidden('id_quiz',$id_quiz)}}
        </div>
        <div class="col-2">
            {{Form::select('question_type', array('multiple choice' => 'Multiple Choice', 'multiple answer' => 'Multiple Answer', 'short answer'=>'Short Answer'), null,array('class'=>'form-control'))}}
        </div>
        <div class="col-3">
            {{Form::button("Add Question",array('class'=>'btn btn-primary', 'type'=>'submit', 'title'=>'Create', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}

            {!! Form::close() !!}
        </div>

            <div class="col-12" style="padding-top:5%;">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Question</th>
                        <th scope="col">Question Type</th>
                        <th scope="col">Update/Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questions as $question)
                        {!! Form::model($question, array('route' => ['professor.question.update', $id_section, $question->id_question], 'method'=>'put')) !!}
                        <tr>
                            <td>{{Form::text('question_label',$question->question_label, array('class'=>'form-control'))}}</td>
                            <td>{{Form::select('question_type', array('multiple choice' => 'Multiple Choice', 'multiple answer' => 'Multiple Answer', 'short answer'=>'Short Answer'), null,array('class'=>'form-control'))}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-4">
                                        {{Form::button("Update", array('class'=>'btn btn-success', 'type'=>'submit', 'title'=>'Update', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}
                                        {!! Form::close() !!}
                                    </div>
                                    <div class="col-6">
                                        {!! Form::model($question, array('route' => ['professor.question.destroy', $id_section, $question->id_question], 'method'=>'DELETE')) !!}
                                        {{Form::button("Delete", array('class'=>'btn btn-danger', 'type'=>'submit', 'title'=>'Delete', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!------========== CHECKS IF THERE IS SHORT ANSWER =============----->
                        @if($question->question_type != "short answer")
                        <tr>
                            <td style="text-align: center;">
                                <strong>Options</strong>
                            </td>
                        </tr>
                        <!------========== NEW ROW FOR OPTIONS =============----->
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="offset-2 col-10">
                                        {!! Form::model($id_section, array('route' => ['professor.option.store', $id_section, $question->id_question], 'method'=>'POST', 'id'=>'create')) !!}
                                        {{Form::text('option',null, array('class'=>'form-control'))}}
                                        {{Form::hidden('id_question',$question->id_question)}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{Form::button("Add Option",array('class'=>'btn btn-primary', 'type'=>'submit', 'title'=>'Create', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}
                                {!! Form::close() !!}
                            </td>

                            @foreach($options as $option)
                                @if($option->id_question == $question->id_question)
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="offset-3 col-6">
                                                    {!! Form::model($option, array('route' => ['professor.option.update', $id_section, $option->id_option], 'method'=>'put')) !!}
                                                    {{Form::text('option',$option->option, array('class'=>'form-control'))}}
                                                </div>
                                                <div class="col-3">
                                                    {{Form::select('isCorrect', array('1'=>'Correct','0'=>'Wrong'), null,array('class'=>'form-control'))}}

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-5">
                                                    {{Form::button("Update Option",array('class'=>'btn btn-success', 'type'=>'submit', 'title'=>'Create', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}
                                                    {{Form::hidden('id_question',$question->id_question)}}
                                                    {!! Form::close() !!}
                                                </div>
                                                <div class="col-3">
                                                    {!! Form::model($option, array('route' => ['professor.option.destroy', $id_section, $option->id_option], 'method'=>'DELETE')) !!}
                                                    {{Form::button("Delete", array('class'=>'btn btn-danger', 'type'=>'submit', 'title'=>'Delete', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <br/>
                                        </td>
                                    </tr>
                                    @else

                                @endif <!------========== CHECKS IF option belongs to question =============----->
                            @endforeach
                        @endif <!------========== END CHECKS IF THERE IS SHORT ANSWER =============----->
                    @endforeach
                    </tbody>
                </table>
            </div>



    </div><!------========== END ROW =============----->
    <a href="/professor/courses/{{$id_section}}/quiz" class="btn btn-secondary">Back</a>
</div>



@stop
