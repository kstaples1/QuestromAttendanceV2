@extends('layouts.dashboard')
@section('breadcrumb')
    {{ Breadcrumbs::render('Master Courses')}}
@stop
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


    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Master Courses</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                    <a href="/admin/courses/create" class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Create
                    </a>
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                    <tr>
                        <th>Department</th>
                        <th>Course Number</th>
                        <th>Course Title</th>
                        <th>Course Description</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                        {!! Form::model($course, array('route' => ['admin.courses.update', $course->id_master], 'method'=>'put')) !!}
                        <tr class="tr-shadow">
                            <td style="display:none"></td>
                            <td style="display:none" class="full_{{$course->id_master}}" >{{Form::text('courseDepartment', $course->courseDepartment,array('class'=>'input-form-text'))}}</td>
                            <td class="summary_{{$course->id_master}}">{{$course->courseDepartment}}</td>

                            <td style="display:none" class="full_{{$course->id_master}}">{{Form::number('courseNumber', $course->courseNumber,array('class'=>'input-form-number'))}}</td>
                            <td class="summary_{{$course->id_master}}">{{$course->courseNumber}}</td>

                            <td style="display:none" class="full_{{$course->id_master}}"> {{Form::text('classTitle', $course->classTitle,array('class'=>'input-form-text'))}}</td>
                            <td class="summary_{{$course->id_master}}">{{$course->classTitle}}</td>

                            <td style="display:none" class="full_{{$course->id_master}}" style="">{{Form::textarea('description', $course->description,array('class'=>'input-form-text'))}}</td>
                            <td class="summary_{{$course->id_master}}" >{{$course->description}}</td>

                            <td>{{$course->created_at}}</td>
                            <td>{{$course->updated_at}}</td>

                            <td style="display:none" class="full_{{$course->id_master}}">
                                {{Form::button("Update", array('class'=>'btn btn-success', 'type'=>'submit', 'title'=>'Update', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}
                                <br/><br/><a href="#" id="toggle" style="color:#FFF" class="btn btn-danger" onclick="toggleDisplay({{$course->id_master}})">Cancel</a>
                                <!--<div class="table-data-feature">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Send">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="More">
                                    <i class="zmdi zmdi-more"></i>
                                </button>
                            </div>-->
                            </td>

                            <td class="summary_{{$course->id_master}}"><a href="#" id="toggle" style="color:#FFF" class="btn btn-primary" onclick="toggleDisplay({{$course->id_master}})">Edit</a></td>
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

