<?php
/**
 * Created by PhpStorm.
 * User: Kyle_Staples
 * Date: 4/25/19
 * Time: 4:35 PM
 */
?>
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="/">
            <img src="{{ asset('images/questrom_master.png') }}" alt="{{ config('app.name', 'Laravel') }}" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-book"></i>Professor</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{url('/professor/courses')}}">My Courses</a>
                        </li>
                        <li>
                            <a href="{{url('/professor/courses/create')}}">Create a Course</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-male"></i>Student</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{url('/student/courses')}}">My Courses</a>
                        </li>
                        <li>
                            <a href="{{url('/student/courses/create')}}">Enroll in a Course</a>
                        </li>

                    </ul>
                </li>


            </ul>
        </nav>
    </div>
</aside>
