@extends('layouts.app')
@section('content')
<?php
    /**
     * Created by PhpStorm.
     * User: Kyle_Staples
     * Date: 4/11/19
     * Time: 12:55 PM
     */
?>
    <br/>
    <br/>

@if($class->can_view_points == 1)
    <h1>My Points:
        <br/>
        {{$points->class_points}}
    </h1>

@else
    <h1>My Points:
        <br/>
    </h1>
    <h2 class="text-danger">
        ** Points hidden by professor
    </h2>

@endif

    <br/>
    <br/>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Quiz Id</th>
            <th scope="col">Quiz Title</th>
            <th scope="col">Quiz Status</th>
            <th scope="col">Options</th>
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
                        <a class="btn btn-success" href="#">View answer</a>
                    @else
                        <a class="btn btn-primary" href="/student/courses/{{$quiz->id_section}}/quiz/{{$quiz->id_quiz}}">Take Quiz</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop
