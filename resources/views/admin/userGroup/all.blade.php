@extends('layouts.app')
@section('content')
    <?php
    /**
     * Created by PhpStorm.
     * User: Kyle_Staples
     * Date: 3/28/19
     * Time: 4:14 PM
     */
    ?>
    <div class="container">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Group ID</th>
                <th scope="col">Group Name</th>
                <th scope="col">Priority Level</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($userGroups as $userGroup)
                <tr>
                    <th scope="row">{{$userGroup->id_userGroup}}</th>
                    <td>{{$userGroup->groupName}}</td>
                    <td>{{$userGroup->priorityLevel}}</td>
                    <td>{{$userGroup->created_at}}</td>
                    <td>{{$userGroup->updated_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
