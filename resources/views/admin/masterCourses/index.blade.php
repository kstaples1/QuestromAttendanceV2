@extends('layouts.app')
@section('content')
    <?php
    /**
     * Created by PhpStorm.
     * User: Kyle_Staples
     * Date: 4/2/19
     * Time: 2:01 PM
     */

    /**
     * Route: /admin/courses
     *
     * Controller: /app/Http/Controllers/admin/masterCourseController.php
     *
     * Function: masterCourseController@index
     *
     * Variables:
     *      $courses
     *          - Json from all master_courses
     *              * this is displayed in the table
     *
     * Form: Edits a master course entry and updates it to the database
     *      Call: Put
     *      Route: /admin/courses/{id_master}
     *      Controller: /app/Http/Controllers/admin/masterCourseController.php
     *      Function: masterCourseController@update
     *
     */
    ?>

    {{ Breadcrumbs::render('Master Courses')}}

    <a href="/admin/courses/create" class="btn btn-success">Create</a>
    <br/>
    <br/>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Master Course ID</th>
            <th scope="col">Department</th>
            <th scope="col">Course Number</th>
            <th scope="col">Course Title</th>
            <th scope="col">Course Description</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            {!! Form::model($course, array('route' => ['admin.courses.update', $course->id_master], 'method'=>'put')) !!}
            <tr>
                <td scope="row">{{$course->id_master}}</td>
                <td>{{Form::text('courseDepartment', $course->courseDepartment,array('class'=>'form-control'))}}</td>
                <td>{{Form::number('courseNumber', $course->courseNumber,array('class'=>'form-control'))}}</td>
                <td>{{Form::text('classTitle', $course->classTitle,array('class'=>'form-control'))}}</td>
                <td>{{Form::text('description', $course->description,array('class'=>'form-control'))}}</td>
                <td>{{$course->created_at}}</td>
                <td>{{$course->updated_at}}</td>
                <td>{{Form::button("Update", array('class'=>'btn btn-success', 'type'=>'submit', 'title'=>'Update', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}</td>
            </tr>
            {!! Form::close() !!}
        @endforeach
        </tbody>
    </table>
@stop

