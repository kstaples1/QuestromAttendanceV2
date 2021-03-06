@extends('layouts.dashboard')
@section('breadcrumb')
    {{ Breadcrumbs::render('create global')}}
@stop
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
    <div class="card col-8 offset-2" style="padding:0;">
        <div class="card-header">
            <strong>Assign User Group</strong>
        </div>
        <div class="card-body card-block">
            {!! Form::open (['method'=>'POST','action'=>['admin\globalUserGroupController@store']]) !!}
                <div class="row form-group">
                    <div class="col col-md-3">
                        {{Form::label('id_user','User: ','' )}}
                    </div>
                    <div class="col-12 col-md-9">
                        {{Form::select('id_user', array($users))}}
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        {{Form::label('id_userGroup','Group Name: ','' )}}
                    </div>
                    <div class="col-12 col-md-9">
                        {{Form::select('id_userGroup', array($user_group))}}
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

@stop
