@extends('layouts.app')
@section('content')
    <?php
    /**
     * Created by PhpStorm.
     * User: Kyle_Staples
     * Date: 4/3/19
     * Time: 1:11 PM
     */

    /**
     * Route: /student/enroll
     *
     * Controller: /app/Http/Controllers/student/studentController.php
     *
     * Function: studentController@create
     *
     * Variables:
     *      $classes
     *          - All the classes the student is not enrolled in
     *
     * Form: Adds a student to a class
     *      Call: POST
     *      Route: /students/enroll
     *      Controller: /app/Http/Controllers/enrollmentController.php
     *      Function: enrollmentController@store
     *
     */
    ?>

    {{ Breadcrumbs::render('student enroll')}}

    <br/>
    <br/>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Course</th>
            <th scope="col">Section</th>
            <th scope="col">Course Title</th>
            <th scope="col">Semester</th>
            <th scope="col">Year</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($classes as $class)
            <tr>
                <td>{{$class->courseDepartment}} {{$class->courseNumber}}</td>
                <td>{{$class->courseSection}}</td>
                <td>{{$class->classTitle}}</td>
                <td>{{$class->semester}}</td>
                <td>{{$class->year}}</td>
                <td>
                    {!! Form::open (['method'=>'POST','action'=>['enrollmentController@store', $class->id_section]]) !!}
                    {{Form::hidden('id_section',$class->id_section)}}
                    {{Form::button("Join",array('class'=>'btn btn-success', 'type'=>'submit', 'title'=>'Create', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop
