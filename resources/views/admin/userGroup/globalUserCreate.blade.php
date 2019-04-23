@extends('layouts.app')
@section('content')
    <?php
    /**
     * Created by PhpStorm.
     * User: Kyle_Staples
     * Date: 4/2/19
     * Time: 12:41 PM
     */

    /**
     *
     * Route: /admin/global/create
     *
     * Controller: /app/Http/Controllers/admin/globalUserGroupController.php
     *
     * Function: globalUserGroupController@create
     *
     * Variables:
     *      $users
     *          - Json from users table get userName, id_user of each user
     *              * this is used for the select for to have all users in the form
     *
     *      $user_group
     *          - Json from user_group table getting groupName, id_group of each user_group
     *              * this is used for the select for to have all users in the form
     *
     * Form: Creates a new Global user group entry
     *      Call: Put
     *      Route: /admin/global/store
     *      Controller: /app/Http/Controllers/admin/globalUserGroupController.php
     *      Function: globalUserGroupController@store
     *
     */
    ?>

    {{ Breadcrumbs::render('create global')}}


        {!! Form::open (['method'=>'POST','action'=>['admin\globalUserGroupController@store']]) !!}
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
    @if (!$errors->isEmpty())
        <br/><br/>
        <div class="text-danger" role="alert">
            <strong>** There is already the user group assigned to this user</strong>
        </div>
    @endif
@stop
