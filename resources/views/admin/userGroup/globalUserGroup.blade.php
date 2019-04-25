@extends('layouts.dashboard')
@section('breadcrumb')
    {{ Breadcrumbs::render('global')}}
    @stop
@section('content')
<?php
/**
 * Created by PhpStorm.
 * User: Kyle_Staples
 * Date: 4/1/19
 * Time: 4:26 PM
 */

/**
 * Route: /admin/global
 *
 * Controller: /app/Http/Controllers/admin/globalUserGroupController.php
 *
 * Function: globalUserGroupController@index
 *
 * Variables:
 *             $globalUsers
 *                  - Json containing joined tables of:
 *                      * users, global_user_groups, user_group
 *
 * Form: Deletes a global user role
 *      Call: GET
 *      Route: admin/globla/destroy/{$id_user}/{$id_userGroup}/
 *      Controller: /app/Http/Controllers/admin/globalUserGroupController.php
 *      Function: globalUserGroupController@destroy
 */
?>


<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">User Roles</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <a href="/admin/global/create" class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Create
                </a>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Group Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($globalUsers as $globalUser)
                        <tr class="tr-shadow">
                            <td>{{$globalUser->userName}}</td>
                            <td>{{$globalUser->groupName}}</td>
                            <td>{{$globalUser->created_at}}</td>
                            <td>{{$globalUser->updated_at}}</td>
                            <td>
                                {!! Form::open(['url'=>['admin/global/destroy/'.$globalUser->id_user.'/'.$globalUser->id_userGroup.'/'],'method'=>'get'])!!}
                                {{Form::button('Delete',array('class'=>'btn btn-danger', 'type'=>'submit', 'title'=>'Delete', 'data-toggle'=>'tooltip'))}}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        <tr class="spacer"></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
