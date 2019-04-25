<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/admin/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/admin/img/favicon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{ isset($title_page)? 'holidayinn | '.$title_page :'' }} </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' name='viewport'>
    <meta name="viewport" content="width=device-width">

    <!-- Bootstrap core CSS     -->
    <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">

    @yield('css_top')
    <!--  Material Dashboard CSS    -->
    <link href="{{asset('assets/admin/css/inspire.css')}}" rel="stylesheet">

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('assets/admin/css/demo.css')}}" rel="stylesheet">

    <!--     Fonts and icons     -->
    <link href="{{asset('assets/admin/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/font-muli.css')}}" rel='stylesheet' type='text/css'>
    <link href="{{asset('assets/admin/css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendors/sweetalert/css/sweetalert2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/global/css/modal.css')}}" />
    <link href="{{asset('assets/admin/vendors/jquery-ui-1.12.0/jquery-ui.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/global/plugins/orakuploader/orakuploader.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/global/plugins/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/global/plugins/bootstrap-daterangepicker-master/daterangepicker.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/global/plugins/select2/css/select2.css')}}" />
    <link href="{{asset('assets/admin/css/custom.css')}}" rel="stylesheet">
    @yield('css_bottom')
</head>

<body>
    <div class="wrapper">
        @include('Admin.layouts.sidebar')
        <div class="main-panel">
            <nav class="navbar navbar-default navbar-toggleable-md navbar-inverse">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                                           <i class="ti-menu"></i>
                        </button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarItems" aria-controls="navbarsItems" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="#"> {{$title}} </a>
                </div>
                <div class="collapse navbar-collapse" id="navbarItems">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle nav-link" id="notificationList" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-bell nav-icon"></i>
                                <span class="notification">6</span>
                                <p class="hidden-lg-up">
                                    Notifications
                                    <i class="fa fa-sort-desc submenu-toggle"></i>
                                </p>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="notificationList">
                                <a class="dropdown-item" href="#">You have 5 new messages</a>
                                <a class="dropdown-item" href="#">You're now friend with Mike</a>
                                <a class="dropdown-item" href="#">Wish Mary on her birthday!</a>
                                <a class="dropdown-item" href="#">5 warnings in Server Console</a>
                                <a class="dropdown-item" href="#">Jane completed 'Induction Training'</a>
                                <a class="dropdown-item" href="#">'Prepare Marketing Report' is overdue</a>
                            </div>
                        </li>
                        <li>
                            <a href="#pablo" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <i class="ti-layout-grid3-alt nav-icon"></i>
                                <p class="hidden-lg-up">Apps</p>
                            </a>
                        </li>
                        <li>
                            <a href="#pablo" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <i class="ti-user nav-icon"></i>
                                <p class="hidden-lg-up">Profile</p>
                            </a>
                        </li>
                        <li>
                            <a href="#pablo" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <i class="ti-settings nav-icon"></i>
                                <p class="hidden-lg-up">Settings</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg-up"></li>
                    </ul>
                </div>
            </nav>
            @yield('body')
            <footer class="footer">
                <div class="ml-4">
                    <p class="copyright float-left">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                    </p>
                </div>
            </footer>
        </div>

    </div>
    @yield('modal')
    <script>
        var url_gb = '{{url('')}}';
        var asset_gb = '{{asset('')}}';
    </script>
    <!--   Core JS Files   -->
    <script src="{{asset('assets/admin/vendors/jquery-3.1.1.min.js')}}" type="text/javascript"></script>
    @yield('js_top')
    <script src="{{asset('assets/admin/vendors/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/vendors/tether.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/vendors/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/vendors/material.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/vendors/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
    <!-- Forms Validations Plugin -->
    <script src="{{asset('assets/admin/vendors/jquery.validate.min.js')}}"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="{{asset('assets/admin/vendors/moment.min.js')}}"></script>
    <!--  Charts Plugin -->
    <script src="{{asset('assets/admin/vendors/charts/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/charts/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/charts/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/charts/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/charts/flot/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/charts/chartjs/Chart.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/vendors/jquery.sparkline.min.js')}}"></script>

    <!--  Plugin for the Wizard -->
    <script src="{{asset('assets/admin/vendors/jquery.bootstrap-wizard.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset('assets/admin/vendors/bootstrap-notify.js')}}"></script>
    <!-- DateTimePicker Plugin -->
    <script src="{{asset('assets/admin/vendors/bootstrap-datepicker.min.js')}}"></script>
    <!-- Sliders Plugin -->
    <script src="{{asset('assets/admin/vendors/nouislider.min.js')}}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAurmSUEQDwY86-wOG3kCp855tCI8lHL-I"></script>
    <!-- Select Plugin -->
    <script src="{{asset('assets/admin/vendors/jquery.select-bootstrap.js')}}"></script>

    <!--  Checkbox, Radio, Switch and Tags Input Plugins -->
    <script src="{{asset('assets/admin/js/bootstrap-checkbox-radio-switch-tags.js')}}"></script>

    <!-- Circle Percentage-chart -->
    <script src="{{asset('assets/admin/js/jquery.easypiechart.min.js')}}"></script>
    <!-- Sweet Alert 2 plugin -->
    <script src="{{asset('assets/admin/vendors/sweetalert/js/sweetalert2.min.js')}}"></script>
    <!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="{{asset('assets/admin/vendors/jasny-bootstrap.min.js')}}"></script>
    <!--  Full Calendar Plugin    -->
    <script src="{{asset('assets/admin/vendors/fullcalendar.min.js')}}"></script>
    <!-- TagsInput Plugin -->
    <script src="{{asset('assets/admin/vendors/jquery.tagsinput.js')}}"></script>
    <!-- Material Dashboard javascript methods -->
    <script src="{{asset('assets/admin/js/inspire.js')}}"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{asset('assets/admin/js/demo.js')}}"></script>

    <script src="{{asset('assets/admin/js/charts/flot-charts.js')}}"></script>
    <script src="{{asset('assets/admin/js/charts/chartjs-charts.js')}}"></script>
    <script src="{{asset('assets/admin/js/charts/sparkline-charts.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/sweetalert/js/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/global/js/modal.js')}}"></script>
    <script src="{{asset('assets/global/js/validate.js')}}"></script>
    <script src="{{asset('assets/global/plugins/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('assets/global/plugins/bootstrap-daterangepicker-master/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/global/plugins/Jquery-Price-Format/jquery.priceformat.js')}}"></script>
    <script src="{{asset('assets/global/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/global/plugins/ckeditor/config.js')}}"></script>
    <script src="{{asset('assets/global/plugins/select2/js/select2.js')}}"></script>
    <script src="{{asset('assets/admin/js/function.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
    @yield('js_bottom')
</body>

</html>
