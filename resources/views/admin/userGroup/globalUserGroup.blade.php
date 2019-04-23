@extends('layouts.app')
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
 *      Route: admin/globla/destroy/{$id_user}/{$id_userGroup}/
 *      Controller: /app/Http/Controllers/admin/globalUserGroupController.php
 *      Function: globalUserGroupController@destroy
 */
?>

{{ Breadcrumbs::render('global')}}

<a href="/admin/global/create" class="btn btn-success">Create</a>
<br/>
<br/>
<table class="table">
    <thead>
    <tr>
        <th scope="col">User Name</th>
        <th scope="col">Group Name</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($globalUsers as $globalUser)
        <tr>
            <td scope="row">{{$globalUser->userName}}</td>
            <td>{{$globalUser->groupName}}</td>
            <td>{{$globalUser->created_at}}</td>
            <td>{{$globalUser->updated_at}}</td>
            <td>
                {!! Form::open(['url'=>['admin/global/destroy/'.$globalUser->id_user.'/'.$globalUser->id_userGroup.'/'],'method'=>'get'])!!}
                {{Form::button('Delete',array('class'=>'btn btn-danger', 'type'=>'submit', 'title'=>'Delete', 'data-toggle'=>'tooltip'))}}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop
