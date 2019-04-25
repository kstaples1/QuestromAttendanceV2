@extends('layouts.dashboard')
@section('breadcrumb')
    {{ Breadcrumbs::render('admin')}}
    @stop

@section('content')
<?php
/**
 * Created by PhpStorm.
 * User: Kyle_Staples
 * Date: 4/1/19
 * Time: 8:48 AM
 */

/**
 * Route: /admin
 *
 * Controller: /app/Http/Controllers/dashboardController.php
 *
 * Function: dashboardController.php@admin
 *
 * Variables:
 *      $admins
 *          - All admins
 *      $users
 *          - All users
 */
//Lazy coder counting
$counter = 0;
$counter2 = 0;
?>
<div class="row">
    <!-- Admins -->
    <div class="col-lg-6">
        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
            <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                <div class="bg-overlay bg-overlay--blue"></div>
                <h3>
                    <i class="zmdi zmdi-account"></i>Admins</h3>
            </div>
            <div class="au-task js-list-load">
                <div class="au-task-list js-scrollbar3">
                    @foreach($admins as $admin)
                        @if($counter < 4)
                            <div class="au-task__item au-task__item--success">
                                <div class="au-task__item-inner">
                                    <h5 class="time">
                                        {{$admin->firstName}} {{$admin->lastName}}
                                    </h5>
                                    <span class="small">{{$admin->email}}</span>
                                </div>
                            </div>
                        @else
                            <div class="au-task__item au-task__item--danger js-load-item">
                                <div class="au-task__item-inner">
                                    <h5 class="task">
                                        <a href="#">Meeting about plan for Admin Template 2018</a>
                                    </h5>
                                    <span class="time">10:00 AM</span>
                                </div>
                            </div>
                        @endif
                        @php $counter++; @endphp
                    @endforeach
                </div>
                <div class="au-task__footer">
                    <button class="au-btn au-btn-load js-load-btn">load more</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Users -->
    <div class="col-lg-6">
        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
            <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                <div class="bg-overlay bg-overlay--blue"></div>
                <h3>
                    <i class="zmdi zmdi-account"></i>Users</h3>
            </div>
            <div class="au-task js-list-load">
                <div class="au-task-list js-scrollbar3">
                    @foreach($users as $user)
                        @if($counter2 < 4)
                            <div class="au-task__item au-task__item--primary">
                                <div class="au-task__item-inner">
                                    <h5 class="time">
                                        {{$user->firstName}} {{$user->lastName}}
                                    </h5>
                                    <span class="small">{{$user->email}}</span>
                                </div>
                            </div>
                        @else
                            <div class="au-task__item au-task__item--danger js-load-item">
                                <div class="au-task__item-inner">
                                    <h5 class="task">
                                        <a href="#">Meeting about plan for Admin Template 2018</a>
                                    </h5>
                                    <span class="time">10:00 AM</span>
                                </div>
                            </div>
                        @endif
                        @php $counter2++; @endphp
                    @endforeach
                </div>
                <div class="au-task__footer">
                    <button class="au-btn au-btn-load js-load-btn">load more</button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
