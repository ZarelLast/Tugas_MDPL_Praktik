<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (isset($title))
    <title>{{ $title }} - DSC Rentcar</title>
    @else
    <title>{{ $data['title'] }} - DSC Rentcar</title>
    @endif

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- iCheck -->
    <!-- <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css')}}"> -->
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css')}}">
    <!-- datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- jQuery -->
<script src=" {{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Datepicker -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="{{ asset('style.css')}}">

    <link rel="icon" href="{{ asset('dist/img/AdminLTELogo.png')}}">
</head>
@guest
    @yield('login')
    @yield('register')
@else

@if(Auth::user()->email == "admin@gmail.com")
<body class="hold-transition sidebar-mini">
    <div class="wrapper" >
            @include('layouts.navbar')
            @include('layouts.sidebar')
            <div class="content-wrapper">

                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                {{-- <h1>{{ $title }}</h1> --}}
                            </div>
                        </div>
                        <!-- flashmessage -->
                        @include('layouts.flash-message')

                    </div>
                </section>
                @yield('content')
            </div>

            @include('layouts.footer')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- jQuery -->
    <script src=" {{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Datepicker -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function(){
        $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear: true,
        changeMonth: true, yearRange: '1945:'+(new Date).getFullYear() });
        $( "#datepickers" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear: true,
        changeMonth: true, yearRange: '1945:'+(new Date).getFullYear() });
        });
    </script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <!-- cleave js -->
    <script src="{{ asset('cleave-js/dist/cleave.min.js') }}"></script>
    <!-- CHECKBOX -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>

    <script>
    $(function () {
        $("#myTable").DataTable();
    });

    </script>

    @stack('scripts')

</body>
@else
<body class="hold-transition layout-top-nav">
    <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-dark navbar-dark">
        <div class="container-fluid">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">Rental Mobil</span>
        </a>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{($menu==0 ? 'active' : '')}}">Home</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">About</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('profile').'/'.Auth::user()->id_pelanggan }}" class="nav-link {{($menu==2 ? 'active' : '')}}">Profile</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> Logout
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                    </form>
                </a>
            </li>
            </ul>
        </div>
        </div>
    </nav>
    <!-- /.navbar -->
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">

                    @if (empty($title))
                        <h1>{{ $data['title'] }}</h1>
                    @else
                        <h1>{{ $title }}</h1>
                    @endif
                </div>
            </div>
            <!-- flashmessage -->
            @include('layouts.flash-message')
        </div>
    </section>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="container py-5">
        @yield('content')
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
        Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
    </div>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->

    <!-- jQuery -->
    <script src=" {{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Datepicker -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <script>
    $( function(){
        $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear: true,
        changeMonth: true, yearRange: '1945:'+(new Date).getFullYear() });
        $( "#datepickers" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear: true,
        changeMonth: true, yearRange: '1945:'+(new Date).getFullYear() });
        });
    </script> -->

    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- DataTables -->
    {{-- <!-- <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script> --}}
    {{-- <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script> --> --}}
    <!-- cleave js -->
    {{-- <!-- <script src="{{ asset('cleave-js/dist/cleave.min.js') }}"></script> --> --}}
    <!-- CHECKBOX -->
    {{-- <!-- <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script> --> --}}


    {{-- <!-- @stack('scripts') --> --}}

</body>
@endif

@endguest
</html>
