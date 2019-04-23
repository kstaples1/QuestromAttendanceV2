@extends('layouts.app')
@section('content')
<?php
/**
 * Created by PhpStorm.
 * User: Kyle_Staples
 * Date: 4/2/19
 * Time: 4:48 PM
 */

/**
 * Route: /professor/courses/{id_section}/enrollment
 *
 * Controller: /app/Http/Controllers/enrollmentController.php
 *
 * Function: masterCourseController@index
 *
 * Variables:
 *      $course
 *          - The course name formatted
 *              * this is for the bread crumb
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
 */
?>
{{ Breadcrumbs::render('course name', $course)}}
<table class="table">
    <thead>
    <tr>
        <th scope="col">BUID</th>
        <th scope="col">User Type</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Class Points</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th>Update User</th>
        <th scope="col">Remove From Class</th>
    </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
        {!! Form::model($student, array('route' => ['professor.enrollment.update', $student->id_enrollment, $student->id_section], 'method'=>'put')) !!}
        <tr>
            <td scope="row">{{$student->users->BUID}}</td>
            <td scope="row">{{Form::select('id_userGroup', array($roles), $student->userGroup->id_userGroup)}}</td>
            <td>{{$student->users->firstName}}</td>
            <td>{{$student->users->lastName}}</td>
            <td>{{Form::number('class_points', $student->class_points)}}</td>
            <td>{{$student->created_at}}</td>
            <td>{{$student->updated_at}}</td>
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


@stop
