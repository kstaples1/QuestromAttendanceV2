@extends('layouts.dashboard')
@section('breadcrumb')
    {{ Breadcrumbs::render('usergroup')}}
@stop
@section('content')
<?php
/**
 * Route: /admin/usergroup
 *
 * Controller: /app/Http/Controllers/admin/userGroupController.php
 *
 * Function: userGroupController@index
 *
 * Variables:
 *      $userGroups
 *          - Json from all user_groups
 *              * this is displayed in the table
 *
 * Form: Updates a user group entry
 *      Call: Put
 *      Route: /admin/usergroup/{id_userGroup}
 *      Controller: /app/Http/Controllers/admin/userGroupController.php
 *      Function: userGroupController@update
 *
 */
?>
<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">User Roles</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <a href="/admin/usergroup/create" class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Create
                </a>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                <tr>
                    <th>Group ID</th>
                    <th>Group Name</th>
                    <th>Priority Level</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($userGroups as $userGroup)
                    {!! Form::model($userGroup, array('route' => ['admin.usergroup.update', $userGroup->id_userGroup], 'method'=>'put')) !!}
                    <tr class="tr-shadow">
                        <td scope="row">{{$userGroup->id_userGroup}}</td>
                        <td>{{Form::text('groupName', $userGroup->groupName,array('class'=>'form-control'))}}</td>
                        <td>{{Form::number('priorityLevel', $userGroup->priorityLevel,array('class'=>'form-control'))}}</td>
                        <td>{{$userGroup->created_at}}</td>
                        <td>{{$userGroup->updated_at}}</td>
                        <td>{{Form::button("Update", array('class'=>'btn btn-success', 'type'=>'submit', 'title'=>'Update', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}</td>
                    <tr class="spacer"></tr>
                    {!! Form::close() !!}
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

