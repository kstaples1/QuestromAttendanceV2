@extends('layouts.app')
@section('content')
    <?php
    /**
     * Created by PhpStorm.
     * User: Kyle_Staples
     * Date: 4/2/19
     * Time: 2:50 PM
     */

    /**
     * Route: /professor/courses
     *
     * Controller: /app/Http/Controllers/professor/semesterCoursesController.php
     *
     * Function: semesterCoursesController@index
     *
     * Variables:
     *      $courses
     *          - Json from all semester_courses joined with master_courses
     *              * this is displayed in the table
     *
     * Form: Edits a master course entry and updates it to the database
     *      Call: Put
     *      Route: /professor/courses/update
     *      Controller: /app/Http/Controllers/professor/semesterCoursesController.php
     *      Function: semesterCoursesController@update
     *
     */
    ?>

    {{ Breadcrumbs::render('courses')}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <a href="/professor/courses/create" class="btn btn-success">Create</a>
    <br/>
    <br/>
    <div class="row">
        <table class="table table-responsive">
            <thead>
            <tr>
                <th scope="col">Course</th>
                <th scope="col">Course Title</th>
                <th scope="col">Course Section</th>
                <th scope="col">Semester</th>
                <th scope="col">Year</th>
                <th scope="col">Default Points</th>
                <th scope="col">Class Points</th>
                <th scope="col">Is Cancelled</th>
                <th scope="col">Update Changes</th>
                <th scope="col">View Class</th>
                <th scope="col">View Quizes</th>
                <th scope="col">Updated At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                {!! Form::model($course, array('route' => ['professor.courses.update', $course->id_section], 'method'=>'put')) !!}
                <tr>
                    <td>{{$course->courseDepartment}} {{$course->courseNumber}}</td>
                    <td>{{$course->classTitle}}</td>
                    <td>{{Form::text('courseSection', $course->courseSection,array('class'=>'form-control'))}}</td>
                    <td>{{Form::select('semester', array('Fall' => 'Fall', 'Spring' => 'Spring', 'Summer' => 'Summer'),$course->semester)}}</td>
                    <td>{{Form::number('year', $course->year,array('class'=>'form-control'))}}</td>
                    <td>{{Form::number('defaultPoints', $course->defaultPoints,array('class'=>'form-control'))}}</td>
                    <td>{{Form::select('can_view_points', array('1' => 'Visible', '0' => 'Hidden'),$course->can_view_points)}}</td>
                    <td>{{Form::checkbox('isCancelled', $course->isCancelled)}}</td>
                    <td>{{Form::button("Update", array('class'=>'btn btn-success update', 'type'=>'submit', 'title'=>'Update', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}</td>
                    <td><a href="/professor/courses/{{$course->id_section}}/enrollment" class="btn btn-primary">View</a></td>
                    <td><a href="/professor/courses/{{$course->id_section}}/quiz" class="btn btn-primary">View</a></td>
                    <td>{{$course->updated_at}}</td>
                </tr>
                {!! Form::close() !!}
            @endforeach
            </tbody>
        </table>
    </div>


@stop
