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
    <table class="table table-responsive" >
        <thead>
        <tr>

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
                <td style="display:none" class="full_{{$course->id_master}}" >{{Form::text('courseDepartment', $course->courseDepartment,array('class'=>'form-control'))}}</td>
                <td class="summary_{{$course->id_master}}">{{$course->courseDepartment}}</td>

                <td style="display:none" class="full_{{$course->id_master}}">{{Form::number('courseNumber', $course->courseNumber,array('class'=>'form-control'))}}</td>
                <td class="summary_{{$course->id_master}}">{{$course->courseNumber}}</td>

                <td style="display:none" class="full_{{$course->id_master}}"> {{Form::text('classTitle', $course->classTitle,array('class'=>'form-control'))}}</td>
                <td class="summary_{{$course->id_master}}">{{$course->classTitle}}</td>

                <td style="display:none" class="full_{{$course->id_master}}" style="">{{Form::textarea('description', $course->description,array('class'=>'form-control'))}}</td>
                <td class="summary_{{$course->id_master}}" >{{$course->description}}</td>

                <td>{{$course->created_at}}</td>
                <td>{{$course->updated_at}}</td>

                <td style="display:none" class="full_{{$course->id_master}}">
                            {{Form::button("Update", array('class'=>'btn btn-success', 'type'=>'submit', 'title'=>'Update', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}
                            <br/><br/><a id="toggle" style="color:#FFF" class="btn btn-danger" onclick="toggleDisplay({{$course->id_master}})">Cancel</a>
                </td>

                <td class="summary_{{$course->id_master}}"><a id="toggle" style="color:#FFF" class="btn btn-primary" onclick="toggleDisplay({{$course->id_master}})">Edit</a></td>
            </tr>
            {!! Form::close() !!}
        @endforeach
        </tbody>
    </table>
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

