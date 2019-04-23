@extends('layouts.app')
@section('content')
    <?php
    /**
     * Created by PhpStorm.
     * User: Kyle_Staples
     * Date: 4/2/19
     * Time: 12:41 PM
     */
    ?>

    {{ Breadcrumbs::render('create global')}}


        {!! Form::open (['method'=>'POST','action'=>['globalUserGroupController@store']]) !!}
        <div class="form-group">
            {{Form::label('id_user','User: ','' )}}
            {{Form::select('id_user', array($users))}}
        </div>
        <div class="form-group">
            {{Form::label('id_userGroup','Group Name: ','' )}}
            {{Form::select('id_userGroup', array($user_group))}}
        </div>
        {{Form::button("Submit",array('class'=>'btn btn-success', 'type'=>'submit', 'title'=>'Create', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}
        {!! Form::close() !!}

@stop
