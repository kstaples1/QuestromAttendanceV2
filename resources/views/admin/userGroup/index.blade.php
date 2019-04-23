@extends('layouts.app')
@section('content')

        {{ Breadcrumbs::render('usergroup')}}

        <a href="/admin/usergroup/create" class="btn btn-success">Create</a>
        <br/>
        <br/>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Group ID</th>
                    <th scope="col">Group Name</th>
                    <th scope="col">Priority Level</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($userGroups as $userGroup)
                {!! Form::model($userGroup, array('route' => ['usergroup.update', $userGroup->id_userGroup], 'method'=>'put')) !!}
                <tr>
                    <td scope="row">{{$userGroup->id_userGroup}}</td>
                    <td>{{Form::text('groupName', $userGroup->groupName,array('class'=>'form-control'))}}</td>
                    <td>{{Form::number('priorityLevel', $userGroup->priorityLevel,array('class'=>'form-control'))}}</td>
                    <td>{{$userGroup->created_at}}</td>
                    <td>{{$userGroup->updated_at}}</td>
                    <td>{{Form::button("Submit", array('class'=>'btn btn-success', 'type'=>'submit', 'title'=>'Update', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}</td>
                </tr>
                {!! Form::close() !!}
                @endforeach
            </tbody>
        </table>
@stop

