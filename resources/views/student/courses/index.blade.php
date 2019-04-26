@extends('layouts.dashboard')
@section('breadcrumb')
    {{ Breadcrumbs::render('student courses')}}
    @stop
@section('content')
<?php
/**
 * Created by PhpStorm.
 * User: Kyle_Staples
 * Date: 4/2/19
 * Time: 6:52 PM
 */

/**
 * Route: /student/courses
 *
 * Controller: /app/Http/Controllers/student/studentController.php
 *
 * Function: studentController@index
 *
 * Variables:
 *      $classes
 *          - All the classes the student is enrolled in
 */
?>

<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">My Courses</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <a href="/student/courses/create" class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Join
                </a>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                <tr>
                    <th>Course</th>
                    <th>Section</th>
                    <th>Course Title</th>
                    <th>Class Points</th>
                    <th>Semester</th>
                    <th>Year</th>
                    <th>View</th>
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
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>

@stop
