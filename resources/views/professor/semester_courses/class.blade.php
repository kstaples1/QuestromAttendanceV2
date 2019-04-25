@extends('layouts.dashboard')
<?php
/**
 * Created by PhpStorm.
 * User: Kyle_Staples
 * Date: 4/25/19
 * Time: 3:47 PM
 */
/**
 * Route: /professor/courses/{id_section}/view
 *
 * Controller: /app/Http/Controllers/professor/semesterCoursesController.php
 *
 * Function: semesterCoursesController@viewClass
 *
 * Variables:
 *      $course
 *          - Course Data for bread crumb
 *      $id_section
 *          - Course section id
 *      $quizes
 *          - Json of all quizes for the section
 *
 *      $roles
 *          - Gets user_group for the select form
 *
 *      $students
 *          - Gets Json of all users in the class
 *
 * Form: Edits a student enrollment entry and updates it to the database
 *      Call: Put
 *      Route: /professor/courses/{id_section}/enrollment/{id_enrollment}
 *      Controller: /app/Http/Controllers/enrollmentController.php
 *      Function: enrollmentController@update
 *
 * Form: Deletes a student from the class
 *      Call: GET
 *      Route: /professor/courses/{id_section}/enrollment/{id_enrollment}/delete
 *      Controller: /app/Http/Controllers/enrollmentController.php
 *      Function: enrollmentController@delete
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
 *
 */
?>
@section('breadcrumb')
    {{ Breadcrumbs::render('course name', $course)}}
@stop
@section('content')
    <div class="user-data m-b-30">
        <h3 class="title-3 m-b-30">
            <i class="zmdi zmdi-assignment"></i>Quizes</h3>
        <div class="filters m-b-45">
            {!! Form::model($id_section, array('route' => ['professor.quiz.store', $id_section], 'method'=>'POST', 'id'=>'create')) !!}
            {{Form::hidden('id_section',$id_section)}}
            {{Form::hidden('title'," ", array('id'=>'title'))}}
            <button class="btn btn-success" onclick="quiz()"><i class="zmdi zmdi-plus"> Create</i></button>
            {!! Form::close() !!}
        </div>
        <div class="table-responsive table-data" style="height:auto;">
            <table class="table">
                <thead>
                <tr>
                    <td>Quiz Id</td>
                    <td style="width:20%;">Quiz Title</td>
                    <td>Can Bet</td>
                    <td>Is Open</td>
                    <td>Update</td>
                    <td>Edit Quiz</td>
                    <td>Delete</td>
                </tr>
                </thead>
                <tbody>
                @foreach($quizes as $quiz)
                    {!! Form::model($quiz, array('route' => ['professor.quiz.update', $quiz->id_section, $quiz->id_quiz], 'method'=>'put')) !!}
                    <tr>
                        <td>{{$quiz->id_quiz}}</td>
                        <td>{{Form::text('title',$quiz->title, array('class'=>'form-control'))}}</td>
                        <td>{{Form::select('can_bet', array('1' => 'True', '0' => 'False'),$quiz->can_bet, array('class'=>'form-control'))}}</td>
                        <td>{{Form::select('isOpen', array('1' => 'Open', '0' => 'Closed'),$quiz->isOpen, array('class'=>'form-control'))}}</td>
                        <td>{{Form::button("Update", array('class'=>'btn btn-success', 'type'=>'submit', 'title'=>'Update', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}</td>
                        <td><a href="/professor/courses/{{$quiz->id_section}}/quiz/{{$quiz->id_quiz}}" class="btn btn-primary">Edit</a>
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
        </div>
    </div>


    <div class="user-data m-b-30">
        <h3 class="title-3 m-b-30">
            <i class="zmdi zmdi-accounts"></i>Students</h3>
        <div class="table-responsive table-data"  style="height:auto;">
            <table class="table">
                <thead>
                <tr>
                    <td>BUID</td>
                    <td>User Type</td>
                    <td>Name</td>
                    <td>Class Points</td>
                    <td>Update User</td>
                    <td>Remove From Class</td>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    {!! Form::model($student, array('route' => ['professor.enrollment.update', $student->id_enrollment, $student->id_section], 'method'=>'put')) !!}
                    <tr>
                        <td scope="row">{{$student->users->BUID}}</td>
                        <td scope="row">{{Form::select('id_userGroup', array($roles), $student->userGroup->id_userGroup)}}</td>
                        <td>{{$student->users->firstName}} {{$student->users->lastName}}</td>
                        <td>{{Form::number('class_points', $student->class_points,array('class'=>'form-control'))}}</td>
                        <td>
                            {{Form::button('Update',array('class'=>'btn btn-success', 'type'=>'submit', 'title'=>'Delete', 'data-toggle'=>'tooltip'))}}
                            {!! Form::close() !!}
                        </td>
                        <td>
                            {!! Form::open(['url'=>['professor/courses/'.$student->id_section.'/enrollment/'.$student->id_enrollment.'/delete'],'method'=>'get'])!!}
                            {{Form::button('Delete',array('class'=>'btn btn-danger', 'type'=>'submit', 'title'=>'Delete', 'data-toggle'=>'tooltip'))}}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>




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
