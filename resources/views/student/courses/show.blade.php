@extends('layouts.dashboard')
@section('breadcrumb')
    {{ Breadcrumbs::render('student course', $class->master_courses->courseDepartment." ".$class->master_courses->courseNumber." ".$class->courseSection)}}
@stop
@section('content')
<?php
    /**
     * Created by PhpStorm.
     * User: Kyle_Staples
     * Date: 4/11/19
     * Time: 12:55 PM
     */
/**
 * Route: /student/courses/{id_section}
 *
 * Controller: /app/Http/Controllers/student/studentController.php
 *
 * Function: studentController@show
 *
 * Variables:
 *      $quizzes
 *          - Json of all the quizes for the enrolled class
 *
 *      $points
 *          - User class points from enrollment table
 *
 *      $class
 *          - The course details in a json
 */
?>


<div class="user-data m-b-30">
    <h3 class="title-3 m-b-30">
        <i class="zmdi zmdi-assignment"></i>{{$class->master_courses->courseDepartment}} {{$class->master_courses->courseNumber}} {{$class->courseSection}}</h3>
    <div class="filters m-b-45">
        @if($class->can_view_points == 1)
            <h5>My Points:
                <br/>
                {{$points->class_points}}
            </h5>

        @else
            <h5 class="title-5">My Points:
                <br/>
            </h5>
            <p class="text-danger">
                ** Points hidden by professor
            </p>

        @endif
    </div>
    <div class="table-responsive table-data" style="height:auto;">
        <table class="table">
            <thead>
            <tr>
                <td>Quiz Id</td>
                <td>Quiz Title</td>
                <td>Quiz Status</td>
                <td>Options</td>
            </tr>
            </thead>
            <tbody>
            @foreach($quizes as $quiz)
                <tr>
                    <td>{{$quiz->id_quiz}}</td>
                    <td>{{$quiz->title}}</td>
                    <td>@if($quiz->isOpen == 1)
                            Open
                        @else
                            Closed
                        @endif
                    </td>
                    <td>
                        @if($quiz->taken > 0)
                            <a class="btn btn-success" href="/student/courses/{{$quiz->id_section}}/quiz/view/{{$quiz->id_quiz}}">View answer</a>
                        @else
                            <a class="btn btn-primary" href="/student/courses/{{$quiz->id_section}}/quiz/{{$quiz->id_quiz}}">Take Quiz</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


@stop
