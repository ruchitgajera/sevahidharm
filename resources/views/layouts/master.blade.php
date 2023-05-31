<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('asset/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{route('home')}}" class="brand-link">
                <img src="{{asset('asset/img/logo.jpeg')}}" alt="Logo" class="brand-image img-circle elevation-4" style="opacity: .8">
                <span class="brand-text font-weight-light">Festival</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user')}}" class="nav-link">
                                <i class="nav-icon fas fa-tag"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('company.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-tag"></i>
                                <p>
                                    Company
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('festival.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>
                                    Festival List
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        @yield('content')
        <!-- <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
            </div>
            <strong>Copyright &copy; 2022 <a href="https://techfirst.co.in">techfirst</a>.</strong> All rights reserved.
        </footer> -->
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        <script src="{{asset('asset/js/jquery.min.js')}}"></script>
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('asset/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('asset/js/moment.min.js')}}"></script>
        <script src="{{asset('asset/js/main.js')}}"></script>
        <script src="{{asset('asset/js/responsive.bootstrap4.min.js')}}"></script>
        
        <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
        <script>
            $(document).on("click", "#festival_delete", function() {
                var id = $(this).data("id");
                var _token = $(this).data("token");
                var me = $(this);
                $.ajax({
                    url: "festival_delete/" + id,
                    type: "GET",
                    datatype: 'json',
                    data: {
                        "id": id,
                        "_token": _token,
                    },
                    success: function(response) {
                        me.parent().parent().remove();
                    }
                });
            });
       
            $(document).on("click", "#company_delete", function() {
                var id = $(this).data("id");
                var _token = $(this).data("token");
                var me = $(this);
                $.ajax({
                    url: "company_delete/" + id,
                    type: "GET",
                    datatype: 'json',
                    data: {
                        "id": id,
                        "_token": _token,
                    },
                    success: function(response) {
                        me.parent().parent().remove();
                    }
                });
            });
       
            $(document).on("click", "#user_delete", function() {
                var id = $(this).data("id");
                var _token = $(this).data("token");
                var me = $(this);
                $.ajax({
                    url: "user_delete/" + id,
                    type: "GET",
                    datatype: 'json',
                    data: {
                        "id": id,
                        "_token": _token,
                    },
                    success: function(response) {
                        me.parent().parent().remove();
                    }
                });
            });
        </script>
    </div>
</body>
</html>