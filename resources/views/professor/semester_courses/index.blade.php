@extends('layouts.dashboard')
@section('breadcrumb')
    {{ Breadcrumbs::render('courses')}}
@stop
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

    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">My Courses</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                    <a href="/professor/courses/create" class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Create
                    </a>
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                    <tr>
                        <th>Course</th>
                        <th>Course Title</th>
                        <th>Course Section</th>
                        <th>Semester</th>
                        <th>Year</th>
                        <th>Default Points</th>
                        <th>Class Points</th>
                        <th>Is Active</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                        {!! Form::model($course, array('route' => ['professor.courses.update', $course->id_section], 'method'=>'put')) !!}
                        <tr class="tr-shadow">
                            <td style="display:none"></td>
                            <td>{{$course->courseDepartment}} {{$course->courseNumber}}</td>
                            <td>{{$course->classTitle}}</td>

                            <td style="display:none" class="full_{{$course->id_master}}"> {{Form::text('courseSection', $course->courseSection,array('class'=>'form-control'))}}</td>
                            <td class="summary_{{$course->id_master}}">{{$course->courseSection}}</td>

                            <td style="display:none" class="full_{{$course->id_master}}" style="">{{Form::select('semester', array('Fall' => 'Fall', 'Spring' => 'Spring', 'Summer' => 'Summer'),$course->semester)}}</td>
                            <td class="summary_{{$course->id_master}}" >{{$course->semester}}</td>

                            <td style="display:none" class="full_{{$course->id_master}}" style="">{{Form::number('year', $course->year,array('class'=>'input-form-number','style'=>'width:200%'))}}</td>
                            <td class="summary_{{$course->id_master}}" >{{$course->year}}</td>

                            <td style="display:none" class="full_{{$course->id_master}}" style=""> {{Form::number('defaultPoints', $course->defaultPoints,array('class'=>'input-form-number'))}}</td>
                            <td class="summary_{{$course->id_master}}" >{{$course->defaultPoints}}</td>

                            <td style="display:none" class="full_{{$course->id_master}}" style=""> {{Form::select('can_view_points', array('1' => 'Visible', '0' => 'Hidden'),$course->can_view_points)}}</td>
                            <td class="summary_{{$course->id_master}}" >@if($course->can_view_points == 1)Visible @else Hidden @endif</td>

                            <td style="display:none" class="full_{{$course->id_master}}" style=""> {{Form::select('isActive', array('1' => 'Active', '0' => 'Not Active'),$course->isActive)}}</td>
                            <td class="summary_{{$course->id_master}}" >@if($course->isActive == 1)Active @else Not Active @endif</td>

                            <td style="display:none" class="full_{{$course->id_master}}">
                                {{Form::button("Update", array('class'=>'btn btn-success', 'type'=>'submit', 'title'=>'Update', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}
                                <br/><br/><a href="#" id="toggle" style="color:#FFF" class="btn btn-danger" onclick="toggleDisplay({{$course->id_master}})">Cancel</a>
                            </td>

                            <td class="summary_{{$course->id_master}}">
                                <a href="#" id="toggle" style="color:#FFF" class="btn btn-primary" onclick="toggleDisplay({{$course->id_master}})">Edit</a>
                                <br/><br/><a href="/professor/courses/{{$course->id_section}}/view" class="btn btn-secondary">View</a>
                            </td>
                        </tr>
                        {!! Form::close() !!}
                        <tr class="spacer"></tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
    <script>
        function toggleDisplay(id){
            if($(".summary_"+id).css('display') == 'none'){
                $(".summary_"+id).show();
                $(".full_"+id).hide();
            }else{
                $(".summary_"+id).hide();
                $(".full_"+id).show();
            }
        }
    </script>
@stop
