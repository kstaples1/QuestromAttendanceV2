@extends('layouts.app')
@section('content')
<?php
/**
 * Created by PhpStorm.
 * User: Kyle_Staples
 * Date: 4/9/19
 * Time: 12:43 PM
 */

/**
 * Route: /professor/courses/{id_section}/quiz
 *
 * Controller: /app/Http/Controllers/professor/quizController.php
 *
 * Function: quizController@index
 *
 * Variables:
 *      $course
 *          - Course name formatted for breadcrumb
 *
 *      $id_section
 *          - Get the section of the class
 *
 *      $quizes
 *          - Json of all quizes for the section
 *
 * Form: Edits a quiz entry and updates it to the database
 *      Call: Put
 *      Route: /professor/courses/update
 *      Controller: /app/Http/Controllers/professor/quizController.php
 *      Function: quizController@update
 *
 * Form: Creates a quiz
 *      Call: Put
 *      Route: /professor/courses/update
 *      Controller: /app/Http/Controllers/professor/quizController.php
 *      Function: quizController@store
 *
 */
?>
{{ Breadcrumbs::render('course name', $course)}}
{!! Form::model($id_section, array('route' => ['professor.quiz.store', $id_section], 'method'=>'POST', 'id'=>'create')) !!}
{{Form::hidden('id_section',$id_section)}}
{{Form::hidden('title'," ", array('id'=>'title'))}}
<button class="btn btn-success" onclick="quiz()">Create</button>
{!! Form::close() !!}
<br/>
<br/>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Quiz Id</th>
        <th scope="col">Quiz Title</th>
        <th scope="col">Can Bet</th>
        <th scope="col">Is Open</th>
        <th scope="col">Updated At</th>
        <th scope="col">Created At</th>
        <th scope="col">Update/Edit</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($quizes as $quiz)
        {!! Form::model($quiz, array('route' => ['professor.quiz.update', $quiz->id_section, $quiz->id_quiz], 'method'=>'put')) !!}
        <tr>
            <td>{{$quiz->id_quiz}}</td>
            <td>{{Form::text('title',$quiz->title)}}</td>
            <td>{{Form::select('can_bet', array('1' => 'True', '0' => 'False'),$quiz->can_bet)}}</td>
            <td>{{Form::select('isOpen', array('1' => 'Open', '0' => 'Closed'),$quiz->isOpen)}}</td>
            <td>{{$quiz->updated_at}}</td>
            <td>{{$quiz->created_at}}</td>
            <td>{{Form::button("Update", array('class'=>'btn btn-success', 'type'=>'submit', 'title'=>'Update', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}
                <a href="/professor/courses/{{$quiz->id_section}}/quiz/{{$quiz->id_quiz}}" class="btn btn-primary">Edit</a>
            {!! Form::close() !!}
            </td>
            <td>
                {!! Form::model($quiz, array('route' => ['professor.quiz.destroy', $quiz->id_section, $quiz->id_quiz], 'method'=>'DELETE')) !!}
                {{Form::button("Delete", array('class'=>'btn btn-danger', 'type'=>'submit', 'title'=>'Delete', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<script>
    function quiz() {
        var title = prompt("Please enter a quiz name", "");
        if (title != null) {
            document.getElementById('title').value = title;
            document.getElementById("create").submit();
        }
    }
</script>

@stop
