<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('APP_NAME', 'My Shop') }}</title>
    <!-- Core CSS - Include with every page -->
    {!!Html::style('/invoice/css/bootstrap.css')!!}
    {!!Html::style('/invoice/css/bootstrap.min.css')!!}
    {!!Html::script('/invoice/js/bootstrap.js')!!}
    {!!Html::script('/invoice/js/bootstrap.min.js')!!}
    {!!Html::script('/invoice/js/jquery.min.js')!!}
    {!!Html::script('/invoice/js/npm.js')!!}
    <link href="{{ url('siminta/assets/plugins/bootstrap/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ url('siminta/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ url('siminta/assets/plugins/pace/pace-theme-big-counter.css') }}" rel="stylesheet" />
    <link href="{{ url('siminta/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ url('siminta/assets/css/main-style.css') }}" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="{{ url('siminta/assets/plugins/morris/morris-0.4.3.min.css') }}" rel="stylesheet" />
    <link href="{{ url('css/sweetalert.css') }}" rel="stylesheet">
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="{{ url('siminta/assets/img/logow1.png') }}" alt="" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        @include('simintatemp.sidebar')        
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">
            @yield('content')
        </div>
        <!-- end page-wrapper -->
    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="{{ url('/siminta/assets/plugins/jquery-1.10.2.js') }}"></script>
    <script src="{{ url('/siminta/assets/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ url('/siminta/assets/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ url('/siminta/assets/plugins/pace/pace.js') }}"></script>
    <script src="{{ url('/siminta/assets/scripts/siminta.js') }}"></script>
    <script src="{{ url('js/sweetalert.js') }}"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="{{ url('/siminta/assets/plugins/morris/raphael-2.1.0.min.js') }}"></script>
    <script src="{{ url('/siminta/assets/plugins/morris/morris.js') }}"></script>
    <script src="{{ url('/siminta/assets/scripts/dashboard-demo.js') }}"></script>
@include('sweet::alert')
@yield('scripts')
</body>

</html>
