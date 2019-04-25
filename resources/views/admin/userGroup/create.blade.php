@extends('layouts.dashboard')
@section('breadcrumb')
    {{ Breadcrumbs::render('create usergroup')}}
@stop

@section('content')
<?php
/**
 * Created by PhpStorm.
 * User: Kyle_Staples
 * Date: 4/1/19
 * Time: 9:31 AM
 */

/**
 * Route: /admin/usergroup
 *
 * Controller: /app/Http/Controllers/admin/userGroupController.php
 *
 * Function: userGroupController@create
 *
 * Variables:
 *      $userGroups
 *          - Json from all user_groups
 *              * this is displayed in the table
 *
 * Form: Edits a user group entry and updates it to the database
 *      Call: Put
 *      Route: /admin/usergroup/store
 *      Controller: /app/Http/Controllers/admin/userGroupController.php
 *      Function: userGroupController@store
 *
 */

?>

<div class="card col-8 offset-2" style="padding:0;">
    <div class="card-header">
        <strong>Create User Group</strong>
    </div>
    <div class="card-body card-block">
        {!! Form::open (['method'=>'POST','action'=>['admin\userGroupController@store']]) !!}
        <div class="row form-group">
            <div class="col col-md-3">
                {{Form::label('groupName','Group Name: ','' )}}
            </div>
            <div class="col-12 col-md-9">
                {{Form::text('groupName', "", array('class'=>'form-control', 'style'=>''))}}
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3">
                {{Form::label('priorityLevel','Priority Level: ','' )}}
            </div>
            <div class="col-12 col-md-9">
                {{Form::number('priorityLevel', "", array('class'=>'form-control', 'style'=>''))}}
            </div>
        </div>
        @if (!$errors->isEmpty())
            <div class="text-danger" role="alert">
                <small>** There is already the user group assigned to this user</small>
            </div>
        @endif
    </div>
    <div class="card-footer">
        {{Form::button("Submit",array('class'=>'btn btn-success btn-sm', 'type'=>'submit', 'title'=>'Create', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}

    </div>
    {!! Form::close() !!}
</div>

@endsection
