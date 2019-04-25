@extends('layouts.dashboard')
@section('breadcrumb')
    {{ Breadcrumbs::render('create master')}}
    @stop
@section('content')
    <?php
    /**
     * Created by PhpStorm.
     * User: Kyle_Staples
     * Date: 4/2/19
     * Time: 2:08 PM
     */

    /**
     *
     * Route: /admin/courses
     *
     * Controller: /app/Http/Controllers/admin/masterCourseController.php
     *
     * Function: masterCourseController@create
     *
     * Variables: NA
     *
     */
    ?>

    <div class="container">

        <div class="row">
            <div class="offset-2 col-10">
                <div class="jumbotron col-10">
                    {!! Form::open (['method'=>'POST','action'=>['admin\masterCoursesController@store']]) !!}
                    <h1 class="border-bottom">
                        Create a Master Course
                    </h1>
                    <br/>
                    <div class="form-row">
                        <div class="form-group col-6">
                            {{Form::label('courseDepartment','Course Department: ','' )}}
                            {{Form::text('courseDepartment', "", array('class'=>'form-control', 'style'=>'', 'placeholder'=>'IS', 'maxlength'=>'2'))}}
                        </div>
                        <div class="form-group col-6">
                            {{Form::label('courseNumber','Course Number: ','' )}}
                            {{Form::number('courseNumber', "", array('class'=>'form-control', 'style'=>'', 'placeholder'=>'465', 'maxlength'=>'3'))}}
                        </div>
                        @if ($errors->has('courseDepartment'))
                            <div class="text-danger" role="alert">
                                <small>** There is already a master course with the same department and number or there is a missing field</small>
                            </div>
                            <br/><br/>
                        @endif
                    </div>

                    <div class="form-group">
                        {{Form::label('classTitle','Course Title: ','' )}}
                        {{Form::text('classTitle', "", array('class'=>'form-control', 'style'=>''))}}
                        @if ($errors->has('classTitle'))
                            <div class="text-danger" role="alert">
                                <small>** The class title can't be empty</small>
                            </div>

                        @endif
                    </div>
                    <div class="form-group">
                        {{Form::label('description','Description: ','' )}}
                        {{Form::textarea('description', "", array('class'=>'form-control', 'style'=>''))}}
                        @if ($errors->has('description'))
                            <div class="text-danger" role="alert">
                                <small>** The class description can't be empty</small>
                            </div>

                        @endif
                    </div>
                    {{Form::button("Submit",array('class'=>'btn btn-success', 'type'=>'submit', 'title'=>'Create', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
