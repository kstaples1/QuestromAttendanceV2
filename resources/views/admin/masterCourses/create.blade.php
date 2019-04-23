@extends('layouts.app')
@section('content')
    <?php
    /**
     * Created by PhpStorm.
     * User: Kyle_Staples
     * Date: 4/2/19
     * Time: 2:08 PM
     */
    ?>

    <div class="container">

        {{ Breadcrumbs::render('create master')}}

        {!! Form::open (['method'=>'POST','action'=>['masterCoursesController@store']]) !!}
        <div class="form-group">
            {{Form::label('courseDepartment','Course Department: ','' )}}
            {{Form::text('courseDepartment', "", array('class'=>'', 'style'=>'', 'placeholder'=>'IS'))}}
        </div>
        <div class="form-group">
            {{Form::label('courseNumber','Course Number: ','' )}}
            {{Form::number('courseNumber', "", array('class'=>'', 'style'=>'', 'placeholder'=>'465'))}}
        </div>
        <div class="form-group">
            {{Form::label('classTitle','Course Title: ','' )}}
            {{Form::text('classTitle', "", array('class'=>'', 'style'=>''))}}
        </div>
        <div class="form-group">
            {{Form::label('description','Description: ','' )}}
            {{Form::textarea('description', "", array('class'=>'', 'style'=>''))}}
        </div>
        {{Form::button("Submit",array('class'=>'btn btn-success', 'type'=>'submit', 'title'=>'Create', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}
        {!! Form::close() !!}
    </div>

@endsection
