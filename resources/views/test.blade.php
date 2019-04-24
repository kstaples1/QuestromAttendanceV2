@extends('layouts.app')
@section('content')
    <?php
    /**
     * Created by PhpStorm.
     * User: Kyle_Staples
     * Date: 3/27/19
     * Time: 8:19 PM
     */

    $user = \App\User::find(1);
    $semester_courses = \App\semester_courses::find(1);
    $master_courses = \App\master_courses::find(1);
    /** This gets the first user group the signed in user is part of **/
    //$hasTask = $user->user_groups()->first();

    /** This check courses to users getting all courses a professor taught **/
    //$hasTask = \App\semester_courses::with('users')->find('1')->get();

    //$hasTask = $user->master_courses()->get();

    /** This gets all students enrolled in semester course where the id = 1 **/
    //$hasTask = $semester_courses->enrollment()->with('users')->get();

    //$hasTask = \App\quiz::find(1)->question()->get();

    //$hasTask = \App\quiz::find(1)->question()->with('options')->with('student_answers')->get();


    //echo $hasTask;

    //echo "<br/>";


    ?>

    <div class="container">
        <br/>
        <a href="/">Home</a><br/>
        |--<a href="/admin">Admin</a><br/>
        |    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |--<a href="/admin/courses">Master Courses</a><br/>
        |    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |--<a href="/admin/global">Global User Groups</a><br/>
        |    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |--<a href="/admin/usergroup">User Groups</a><br/>
        |    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |--<a href="/admin/all">All Users</a><br/>
        |<br/>
        |--<a href="/professor">Professor</a><br/>
        |&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--<a href="professor/courses">Professor Courses</a><br/>
        |--<a href="/student">Student</a><br/>
        |&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--<a href="student/courses">My Courses</a><br/>

        <br/>
        <div class="text-danger">
            **Take note that professor question types can only be multiple choice and not short answer or multiple answer yet. <br/>**If you chose short answer there will be issues with the quiz.
        </div>
    </div>


@endsection
