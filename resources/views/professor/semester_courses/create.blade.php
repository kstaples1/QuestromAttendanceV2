@extends('layouts.app')
@section('content')
    <?php
/**
 * Created by PhpStorm.
 * User: Kyle_Staples
 * Date: 4/2/19
 * Time: 3:08 PM
 */

    /**
     * Route: /professor/courses/create
     *
     * Controller: /app/Http/Controllers/professor/semesterCoursesController.php
     *
     * Function: semesterCoursesController@create
     *
     * Variables:
     *      $courses
     *          - Pairs for the select in the form to list all courses
     *              * this is displayed in the form
     *
     */
?>

    <div class="container">

        {{ Breadcrumbs::render('create course')}}
        <div class="row">
            <div class="offset-2 col-10">
                <div class="jumbotron col-10">
                    {!! Form::open (['method'=>'POST','action'=>['professor\semesterCoursesController@store']]) !!}
                    <h1 class="border-bottom">
                        Create a Class
                    </h1>
                    <br/>

                    <div class="form-row">
                        <div class="form-group col-6">
                            {{Form::label('id_master','Course Title: ','' )}}
                            {{Form::select('id_master', array($courses), null, array('class'=>'custom-select'))}}
                        </div>

                        <div class="form-group col-6">
                            {{Form::label('courseSection','Course Section: ','' )}}
                            {{Form::text('courseSection', "", array('class'=>'form-control', 'style'=>'','placeholder'=>'A1', 'required'))}}
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            {{Form::label('semester','Semester: ','' )}}
                            {{Form::select('semester', array('Fall' => 'Fall', 'Spring' => 'Spring', 'Summer' => 'Summer'), null, array('class'=>'custom-select', 'style'=>'', 'required'))}}
                        </div>
                        <div class="form-group col-6">
                            {{Form::label('year','Year: ','' )}}
                            {{Form::number('year', "", array('class'=>'form-control', 'style'=>'', 'placeholder'=> '2019', 'required'))}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('defaultPoints','Default Points: ','' )}}
                        {{Form::number('defaultPoints', "", array('class'=>'form-control', 'style'=>'', 'placeholder'=> '50', 'required'))}}
                    </div>
                    @if (!$errors->isEmpty())
                        <div class="text-danger" role="alert">
                            <strong>** There is already a course with the same section for the current semester and year or there are missing fields</strong>
                        </div>
                        <br/><br/>
                    @endif
                    {{Form::button("Submit",array('class'=>'btn btn-success', 'type'=>'submit', 'title'=>'Create', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>

@stop
