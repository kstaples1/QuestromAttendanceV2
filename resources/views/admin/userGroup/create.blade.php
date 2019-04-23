@extends('layouts.app')
@section('content')
<?php
/**
 * Created by PhpStorm.
 * User: Kyle_Staples
 * Date: 4/1/19
 * Time: 9:31 AM
 */
?>



<div class="container">

    {{ Breadcrumbs::render('create usergroup')}}

        {!! Form::open (['method'=>'POST','action'=>['userGroupController@store']]) !!}
    <div class="form-group">
        {{Form::label('groupName','Group Name: ','' )}}
        {{Form::text('groupName', "", array('class'=>'', 'style'=>''))}}
    </div>
    <div class="form-group">
        {{Form::label('priorityLevel','Priority Level: ','' )}}
        {{Form::number('priorityLevel', "", array('class'=>'', 'style'=>''))}}
    </div>
        {{Form::button("Submit",array('class'=>'btn btn-success', 'type'=>'submit', 'title'=>'Create', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}
        {!! Form::close() !!}
</div>

@endsection
