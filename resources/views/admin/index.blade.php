@extends('layouts.app')

@section('noContainer')
<?php
/**
 * Created by PhpStorm.
 * User: Kyle_Staples
 * Date: 4/1/19
 * Time: 8:48 AM
 */
?>
<div class="container-fluid admin-bg" style="height:93vh;">
    <div class="row text-center">
        <div class="col-10 offset-1 vertical-center">
            <div class="bg-box">
                <div class="row box-padding">
                    <div class="col-4">
                        <h2 class="border-bottom">ADMIN</h2>
                        <br/>
                        <p><a href="/admin/courses" class="list">Master Courses</a></p>
                        <p><a href="/admin/global" class="list">View/Edit User Groups</a></p>
                        <p><a href="/admin/usergroup" class="list">Assign Roles</a></p>
                    </div>
                    <div class="col-4">
                        <h2 class="border-bottom">PROFESSOR</h2>
                        <br/>
                        <p><a href="/professor" class="list">Manage Classes</a></p>
                    </div>
                    <div class="col-4">
                        <h2 class="border-bottom">STUDENT</h2>
                        <br/>
                        <p><a href="/student" class="list">View My Classes</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
