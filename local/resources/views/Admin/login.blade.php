<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/admin/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/admin/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>เข้าสู่ระบบ</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' name='viewport'>
    <meta name="viewport" content="width=device-width">

    <!-- Bootstrap core CSS     -->
    <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet">

    <!--  Paper Dashboard CSS    -->
    <link href="{{asset('assets/admin/css/inspire.css')}}" rel="stylesheet">

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('assets/admin/css/demo.css')}}" rel="stylesheet">

    <!--     Fonts and icons     -->
    <link href="{{asset('assets/admin/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/font-muli.css')}}" rel='stylesheet' type='text/css'>
    <link href="{{asset('assets/admin/css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendors/sweetalert/css/sweetalert2.min.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

    
   
<body>

    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" data-color="white">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 offset-lg-4 offset-md-3">

                            <form method="#" id="FormLogin" action="#">
                                <div class="card card-login card-hidden" style="border-radius:0px;border-bottom: 3px solid red;">
                                    <div class="header text-center">
                                        <img src="{{asset('images/home2-edit_03.png')}}" class="img-login" style="width:30%">
                                        <h6 class="title">Welcome to Holiday Inn Resort Phuket System!</h6>
                                       
                                    </div>
                                    <div class="content">
                                        <div class="form-group">
                                            <label>Please enter your username</label>
                                            <input name="username" type="text" placeholder="Enter email" class="form-control input-no-border">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input name="password" type="password" placeholder="Password" class="form-control input-no-border">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-rose btn-wd btn-lg">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{asset('assets/admin/vendors/jquery-3.1.1.min.js')}}" type="text/javascript"></script>
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
    <script src="{{asset('assets/admin/vendors/chartist.min.js')}}"></script>
    <!--  Plugin for the Wizard -->
    <script src="{{asset('assets/admin/vendors/jquery.bootstrap-wizard.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset('assets/admin/vendors/bootstrap-notify.js')}}"></script>
    <!-- DateTimePicker Plugin -->
    <script src="{{asset('assets/admin/vendors/bootstrap-datepicker.min.js')}}"></script>
    <!-- Vector Map plugin -->
    <script src="{{asset('assets/admin/vendors/jquery-jvectormap.js')}}"></script>
    <!-- Sliders Plugin -->
    <script src="{{asset('assets/admin/vendors/nouislider.min.js')}}"></script>
    <!-- Select Plugin -->
    <script src="{{asset('assets/admin/vendors/jquery.select-bootstrap.js')}}"></script>
    <!--  DataTables.net Plugin    -->
    <script src="{{asset('assets/admin/vendors/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/dataTables.bootstrap4.js')}}"></script>
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
    <script type="text/javascript">
        $().ready(function() {
            demo.checkFullPageBackgroundImage();

            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url_gb = '{{url('')}}';
    function makeid(){
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for( var i=0; i < 5; i++ )
            text += possible.charAt(Math.floor(Math.random() * possible.length));
        return text;
    }
     function addNumformat(nStr){
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
    jQuery('body').on('submit','#FormLogin',function(e){
        console.log($(this).serialize());
        e.preventDefault();
        var btn = $(this).find('button');
        btn.button('loading');
        $.ajax({
          method: "POST",
          url: "{{url('admin/CheckLogin')}}",
          data: $(this).serialize()
        }).done(function( res ) {
            if(res==0){
                swal('เข้าสู่ระบบ','ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง','error');
                btn.button('reset');
            }else{
                window.location = "{{url('/admin')}}";
            }
        }).fail(function(){
            //swal('เข้าสู่ระบบ','ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง','error');
            btn.button('reset');
        });
    });
    </script>
</body>

</html>
