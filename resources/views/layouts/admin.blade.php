<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Boilerplate</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/app.css">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown ">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href=" {{ route('users.show', Auth::user()->id) }} " class="dropdown-item"><i
                                    class="fa fa-user"></i> My Account</a>
                            @can('admin')
                                <a href=" {{ route('users.index') }} " class="dropdown-item"><i class="fa fa-users-cog"></i>
                                    User Managment</a>
                                <a href=" {{ route('transactions.index') }} " class="dropdown-item"><i class="fa fa-funnel-dollar"></i>
                                    Transactions Roles</a>
                            @endcan
                            @if (Auth::user()->isImpersonating())
                                <a href="{{ route('stopImper') }}" class="dropdown-item"> <i class="fa fa-user-slash"></i>
                                    Stop Impersonate</a>
                            @endif
                        </div>
                    </li>
                @endguest
                <li class="nav-item">
                    <p class="btn btn-sm btn-success mt-2">Your Balance is <b>{{ Auth::user()->balance }}</b> S.P</p>
                </li>
                <li class="nav-item">
                    <p class="btn btn-sm btn-primary mt-2 mx-2">Your Rate is <b>{{ Auth::user()->rate }}</b></p>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="/img/sts.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">STS Platform</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @if (!Auth::user()->image)
                            <img src="/img/user.svg" class="img-circle elevation-2" alt="User Image">
                        @else
                            <img src=" {{ asset('storage/' . Auth::user()->image) }} " class="img-circle elevation-2"
                                alt="User Image">
                        @endif
                    </div>
                    <div class="info">
                        <a href=" {{ route('users.show', Auth::user()) }} "
                            class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->

                            {{-- <li class="nav-item">
                                <a href="{{ route('orders.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-cart-plus"></i>
                                    <p>
                                        Orders
                                    </p>
                                </a>
                            </li> --}}

                            {{-- <li class="nav-item">
                                <a href="{{ route('porders.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-cart-arrow-down"></i>
                                    <p>
                                        Packages Orders
                                    </p>
                                </a>
                            </li> --}}
                            <li class="nav-item has-treeview menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Projects
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('projects.index') }}" class="nav-link active">
                                            <i class="nav-icon fas fa-layer-group"></i>
                                            <p>
                                                All Projects
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ route('members.index') }}" class="nav-link active">
                                            <i class="nav-icon fas fa-th"></i>
                                            <p>
                                                All Members
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas fa-window-restore"></i>
                                    <p>
                                        Partners & Services
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('projects.index') }}" class="nav-link active">
                                            <i class="nav-icon fas fa-gamepad"></i>
                                            <p>
                                                All Partners
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-store-alt"></i>
                                <p>
                                    Financial Department
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('projects.index') }}" class="nav-link active">
                                        <i class="nav-icon fas fa-store"></i>
                                        <p>
                                            Financial
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    {{-- <a href="{{ route('storep') }}" class="nav-link active">
                                        <i class="nav-icon fas fa-boxes"></i>
                                        <p>
                                            Packages Store
                                        </p>
                                    </a> --}}
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content">
                @yield('main')
            </div>
            <!-- /.content -->
        </div>
    </div>
    <!-- ./wrapper -->


    <script src="/js/app.js"></script>
    @include('sweetalert::alert')
</body>

</html>
