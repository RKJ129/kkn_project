<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - Voler Admin Dashboard</title>

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/vendors/quill/quill.bubble.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/quill/quill.snow.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/vendors/chartjs/Chart.min.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" /> --}}
    <link rel="stylesheet" href="{{ asset('admin/vendors/simple-datatables/style.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.svg" type="image/x-icon') }}">
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-menu">
                    <ul class="menu">
                        

                        <li class='sidebar-title'>Main Menu</li>
                        <li class="sidebar-item {{ Request::url() === route('dashboard.index') ? 'active' : '' }} ">
                            <a href="{{ route('dashboard.index') }}" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ Request::url() === route('profile.index') ? 'active' : '' }}">
                            <a href="{{ route('profile.index') }}" class='sidebar-link'>
                                <i data-feather="layout" width="20"></i>
                                <span>Profile RT</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ Request::url() === route('kost.index') ? 'active' : '' }}">
                            <a href="{{ route('kost.index') }}" class='sidebar-link'>
                                <i data-feather="hexagon" width="20"></i>
                                <span>Kost</span>
                            </a>
                        </li>

                        <li class='sidebar-title'>Admin</li>
                        <li class="sidebar-item {{ Request::url() === route('users.index') ? 'active' : '' }} ">
                            <a href="{{ route('users.index') }}" class='sidebar-link'>
                                <i data-feather="users" width="20"></i>
                                <span>Users</span>
                            </a>
                        </li>

                        {{-- <li class="sidebar-item {{ Request::url() === route('berita.index') ? 'active' : '' }}">
                            <a href="{{ route('berita.index') }}" class='sidebar-link'>
                                <i data-feather="layout" width="20"></i>
                                <span>Berita</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar mr-1">
                                    <img src="{{ Auth::user()->img != null ? 'img/users/' . Auth::user()->img : 'img/users/user_default.jpeg' }}"
                                        srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block text-capitalize">Hi, {{ Auth::user()->name }}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                {{-- <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" id="logout"><i
                                        data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            @yield('content')
        </div>
    </div>

    <script src="{{ asset('admin/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/js/app.js') }}"></script>

    <script src="{{ asset('admin/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/apexcharts/apexcharts.min.js') }}"></script>
    {{-- <script src="{{ asset('admin/js/pages/dashboard.js') }}"></script> --}}

    <script src="{{ asset('admin/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('admin/js/vendors.js') }}"></script>
    
    
    <script src="{{ asset('admin/js/main.js') }}"></script>

    <script src="{{ asset('admin/vendors/quill/quill.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/form-editor.js') }}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <script src="{{ asset('admin/js/jquery.js') }}"></script>
</body>

</html>
