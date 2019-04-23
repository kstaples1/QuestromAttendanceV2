@extends('layouts.app')

@section('content')
<?php
/**
 * Created by PhpStorm.
 * User: Kyle_Staples
 * Date: 4/1/19
 * Time: 8:48 AM
 */
?>


View User Groups
<a href="/admin/usergroup">/admin/usergroup</a>
<br/>

View Master Courses
<a href="/admin/courses">admin/courses</a>
<br/>

Global Users
<a href="/admin/global">/admin/global</a>
<br/>

All Users
<a href="/admin/all">/admin/all</a>
<br/>

Errors:
{{$errors}}
@stop
