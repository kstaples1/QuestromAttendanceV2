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
                        <i class="fas fa-group"></i>Admin</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class="active">
                            <a href="{{url('/admin')}}">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{url('/admin/courses')}}">Master Courses</a>
                        </li>
                        <li>
                            <a href="{{url('/admin/global')}}">Global User Groups</a>
                        </li>
                        <li>
                            <a href="{{url('/admin/usergroup')}}">User Groups</a>
                        </li>
                    </ul>
                </li>

                <li class="has-sub">
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

               <!-- <li>
                    <a href="map.html">
                        <i class="fas fa-map-marker-alt"></i>Maps</a>
                </li>-->

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