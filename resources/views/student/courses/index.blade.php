@extends('layouts.app')
@section('content')
<?php
/**
 * Created by PhpStorm.
 * User: Kyle_Staples
 * Date: 4/2/19
 * Time: 6:52 PM
 */
?>

{{ Breadcrumbs::render('student courses')}}

<a href="/student/courses/create" class="btn btn-success">Join Class</a>
<br/>
<br/>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Course</th>
        <th scope="col">Section</th>
        <th scope="col">Course Title</th>
        <th scope="col">Class Points</th>
        <th scope="col">Semester</th>
        <th scope="col">Year</th>
        <th scope="col">View</th>
    </tr>
    </thead>
    <tbody>
    @foreach($classes as $class)
        <tr>
            <td>{{$class->courseDepartment}} {{$class->courseNumber}}</td>
            <td>{{$class->courseSection}}</td>
            <td>{{$class->classTitle}}</td>
            @if($class->can_view_points == 1)
            <td>{{$class->class_points}}</td>
            @else
                <td>Points hidden by professor</td>
            @endif
            <td>{{$class->semester}}</td>
            <td>{{$class->year}}</td>
            <td><a class="btn btn-primary" href="/student/courses/{{$class->id_section}}">View</a></td>
        </tr>

    @endforeach
    </tbody>
</table>

@stop
