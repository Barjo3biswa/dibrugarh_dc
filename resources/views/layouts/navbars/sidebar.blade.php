
{{-- <div class="sidebar" data-color="azure" data-background-color="lightslategray"> --}}
<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="https://creative-tim.com/" class="simple-text logo-normal">
        O/O DC, Dibrugarh
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            {{-- <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li> --}}
            @if(auth()->user()->user_role=='role-1')
                <li class="nav-item {{ ($activePage == 'admin_management' || $activePage == 'user-management') ? ' active' : '' }}">
                    <a class="nav-link collapse one" data-toggle="collapse" href="#content" aria-expanded="false">
                    <i class="material-icons"><span class="material-symbols-outlined">
                        content_paste_go
                        </span></i>
                    <p>Content Management
                        <b class="caret"></b>
                    </p>
                    </a>
                    <div class="collapse one" id="content">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'dashboard22' ? ' active' : '' }}">
                            <a class="nav-link" href="{{route('admin.about_us') }}">
                            <i class="material-icons"><span class="material-symbols-outlined">
                                        content_copy
                                        </span></i>
                                <p>About Us</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'dashboard22' ? ' active' : '' }}">
                            <a class="nav-link" href="{{route('admin.about_dib') }}">
                            <i class="material-icons"><span class="material-symbols-outlined">
                                        content_copy
                                        </span></i>
                                <p>About Dibrugarh</p>
                            </a>
                        </li>
                    </ul>
                    </div>
                </li>
            @endif
            @if(auth()->user()->user_role=='role-1')
                <li class="nav-item {{ ($activePage == 'admin_management' || $activePage == 'user-management') ? ' active' : '' }}">
                    <a class="nav-link collapse one" data-toggle="collapse" href="#laravelExample" aria-expanded="false">
                    <i class="material-icons"><span class="material-symbols-outlined">
                        person
                        </span></i>
                    <p>User Management
                        <b class="caret"></b>
                    </p>
                    </a>
                    <div class="collapse one" id="laravelExample">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'dashboard22' ? ' active' : '' }}">
                            <a class="nav-link" href="{{route('admin.user_permission.show_permission') }}">
                            <i class="material-icons">assignment_ind</i>
                                <p>Permission</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'dashboard22' ? ' active' : '' }}">
                            <a class="nav-link" href="{{route('admin.user_roles.show_roles') }}">
                            <i class="material-icons">assignment_ind</i>
                                <p>Role</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'dashboard22' ? ' active' : '' }}">
                            <a class="nav-link" href="{{route('admin.department_user.users') }}">
                            <i class="material-icons">assignment_ind</i>
                                <p>User</p>
                            </a>
                        </li>
                    </ul>
                    </div>
                </li>
            @endif
            <li class="nav-item {{ ($activePage == 'admin_management' || $activePage == 'user-management') ? ' active' : '' }}">
                <a class="nav-link collapse" data-toggle="collapse" href="#laravelExample2" aria-expanded="false">
                <i class="material-icons">dashboard</i>
                <p>Training Management
                    <b class="caret"></b>
                </p>
                </a>
                <div class="collapse" id="laravelExample2">
                <ul class="nav">
                    <li class="nav-item{{ $activePage == 'dashboard22' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.sector') }}">
                        <i class="material-icons">dashboard</i>
                            <p>Sector Details</p>
                        </a>
                    </li>
                    <li class="nav-item{{ $activePage == 'dashboard22' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.scheme') }}">
                        <i class="material-icons">dashboard</i>
                            <p>Scheme Details</p>
                        </a>
                    </li>
                    <li class="nav-item{{ $activePage == 'dashboard22' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.department') }}">
                        <i class="material-icons">dashboard</i>
                            <p>Department Details</p>
                        </a>
                    </li>
                    <li class="nav-item{{ $activePage == 'dashboard22' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.course') }}">
                        <i class="material-icons">dashboard</i>
                            <p>Course Details</p>
                        </a>
                    </li>
                    <li class="nav-item{{ $activePage == 'dashboard22' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.training') }}">
                        <i class="material-icons">dashboard</i>
                            <p>Training Details</p>
                        </a>
                    </li>

                </ul>
                </div>
            </li>
            <li class="nav-item {{ ($activePage == 'admin_management' || $activePage == 'user-management') ? ' active' : '' }}">
                <ul class="nav">
                    <li class="nav-item{{ $activePage == 'dashboard22' ? ' active' : '' }}">
                        <a class="nav-link" href="{{route('admin.notification.view_notifications') }}">
                        <i class="material-icons"><span class="material-symbols-outlined">
                            notifications
                            </span></i>
                            <p>Notice Board Control</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ ($activePage == 'admin_management' || $activePage == 'user-management') ? ' active' : '' }}">
                <ul class="nav">
                    <li class="nav-item{{ $activePage == 'dashboard22' ? ' active' : '' }}">
                        <a class="nav-link" href="{{route('admin.employee.view_jobs') }}">
                        <i class="material-icons"><span class="material-symbols-outlined">
                            work
                            </span></i>
                            <p>Employers Corner<b id="new_job"></b></p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ ($activePage == 'admin_management' || $activePage == 'user-management') ? ' active' : '' }}">
                <ul class="nav">
                    <li class="nav-item{{ $activePage == 'dashboard22' ? ' active' : '' }}">
                        <a class="nav-link" href="{{route('admin.enquiry.view_enquiry') }}">
                        <i class="material-icons">
                            notifications_active
                          </i>
                            <p>Enquiries <b id="new_enq"></b></p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ ($activePage == 'admin_management' || $activePage == 'user-management') ? ' active' : '' }}">
                <a class="nav-link collapse" data-toggle="collapse" href="#laravelExampleEntr" aria-expanded="false">
                <i class="material-icons">dashboard</i>
                <p>Entrepreneur
                    <b class="caret"></b>
                </p>
                </a>
                <div class="collapse" id="laravelExampleEntr">
                <ul class="nav">
                    <li class="nav-item{{ $activePage == 'dashboard22' ? ' active' : '' }}">
                        <a class="nav-link" href="{{route('admin.entrepreneur.event') }}">
                        <i class="material-icons">dashboard</i>
                            <p>Entrepreneur Event</p>
                        </a>
                    </li>
                    <li class="nav-item{{ $activePage == 'dashboard22' ? ' active' : '' }}">
                        <a class="nav-link" href="{{route('admin.entrepreneur.story') }}">
                        <i class="material-icons">dashboard</i>
                            <p>Entrepreneur Story</p>
                        </a>
                    </li>
                    {{-- <li class="nav-item{{ $activePage == 'dashboard22' ? ' active' : '' }}">
                        <a class="nav-link" href="#">
                        <i class="material-icons">dashboard</i>
                            <p>Entrepreneur Sector</p>
                        </a>
                    </li> --}}
                </ul>
                </div>
            </li>


            {{-- <li class="nav-item {{ ($activePage == 'admin_management' || $activePage == 'user-management') ? ' active' : '' }}">
                <a class="nav-link collapse one" data-toggle="collapse" href="#application" aria-expanded="false">
                <i class="material-icons">dashboard</i>
                <p>Applicants
                    <b class="caret"></b>
                </p>
                </a>
                <div class="collapse one" id="application">
                <ul class="nav">
                    <li class="nav-item{{ $activePage == 'dashboard22' ? ' active' : '' }}">
                        <a class="nav-link" href="{{route('admin.department_user.view_applications') }}">
                        <i class="material-icons">dashboard</i>
                            <p>All Applicants</p>
                        </a>
                    </li>
                </ul>
                </div>
            </li> --}}
            {{-- <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.department_user.users') }}">
                <i class="material-icons">assignment_ind</i>
                    <p>{{ __('Add Depertmtnt User') }}</p>
                </a>
            </li> --}}
            {{-- <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
                <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
                <p>{{ __('Laravel Examples') }}
                    <b class="caret"></b>
                </p>
                </a>
                <div class="collapse show" id="laravelExample">
                <ul class="nav">
                    <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('profile.edit') }}">
                        <span class="sidebar-mini"> UP </span>
                        <span class="sidebar-normal">{{ __('User profile') }} </span>
                    </a>
                    </li>
                    <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <span class="sidebar-mini"> UM </span>
                        <span class="sidebar-normal"> {{ __('User Management') }} </span>
                    </a>
                    </li>
                </ul>
                </div>
            </li> --}}
            {{-- <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('table') }}">
                <i class="material-icons">content_paste</i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('typography') }}">
                <i class="material-icons">library_books</i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('icons') }}">
                <i class="material-icons">bubble_chart</i>
                <p>{{ __('Icons') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('map') }}">
                <i class="material-icons">location_ons</i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('notifications') }}">
                <i class="material-icons">notifications</i>
                <p>{{ __('Notifications') }}</p>
                </a>
            </li> --}}
            {{-- <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('language') }}">
                <i class="material-icons">language</i>
                <p>{{ __('RTL Support') }}</p>
                </a>
            </li> --}}
            {{-- <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
                <a class="nav-link text-white bg-danger" href="{{ route('upgrade') }}">
                <i class="material-icons text-white">unarchive</i>
                <p>{{ __('Upgrade to PRO') }}</p>
                </a>
            </li> --}}
            </ul>
        </div>
        </div>
