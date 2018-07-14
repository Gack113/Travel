<!DOCTYPE html>
<html lang="en" class="perfect-scrollbar-on">
    <head>
        <meta charset="utf-8" />
        <base href="{{asset('')}}">
        <link rel="apple-touch-icon" sizes="76x76" href="admin/img/apple-icon.png"/>
        <link rel="icon" type="image/png" href="admin/img/favicon.png"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
          Material Dashboard by Creative Tim
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <!-- CSS Files -->
        <link href="admin/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="admin/demo/demo.css" rel="stylesheet" />
    </head>
    <body class="">
        <div class="wrapper">
            @include('admin/share/sidebar')
            <div class="main-panel1">
                @include('admin/share/navbar')
                <div class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!--   Core JS Files   -->
        <script src="admin/js/core/jquery.min.js" type="text/javascript"></script>
        <script src="admin/js/core/popper.min.js" type="text/javascript"></script>
        <script src="admin/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
        <script src="admin/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!-- Chartist JS -->
        <script src="admin/js/plugins/chartist.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="admin/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="admin/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <script src="admin/demo/demo.js"></script>
        <script>
            $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

            });
        </script>
    </body>
</html>