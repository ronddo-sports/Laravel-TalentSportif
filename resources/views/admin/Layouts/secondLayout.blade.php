@extends('layouts.BaseLayout')


@section('head')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hosteline-Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
@endsection


@section('styles')
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    
    {{--<link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">--}}
    <!-- bootstrap datepicker -->
    {{--<link rel="stylesheet" href="/plugins/datepicker/datepicker3.css">--}}
    <!-- iCheck for checkboxes and radio inputs -->
    {{--<link rel="stylesheet" href="/plugins/iCheck/all.css">--}}
    <!-- Bootstrap Color Picker -->
    {{--<link rel="stylesheet" href="/plugins/colorpicker/bootstrap-colorpicker.min.css">--}}
    <!-- Bootstrap time Picker -->
    {{--<link rel="stylesheet" href="/plugins/timepicker/bootstrap-timepicker.min.css">--}}
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/dist/css/sweetalert.css">
    <style>
        .action{
            min-width: 150px;
        }
    </style>
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
@endsection

@section('scripts')
    
    <!-- jQuery 2.2.3 -->
    <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/dist/js/sweetalert.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    {{--<script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>--}}
    {{--<script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>--}}
    <!-- SlimScroll 1.3.0 -->
    <script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    {{--<script src="/plugins/chartjs/Chart.min.js"></script>--}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{--<script src="/dist/js/pages/dashboard2.js"></script>--}}
    
    {{--<script src="/plugins/daterangepicker/daterangepicker.js"></script>--}}
    <!-- bootstrap datepicker -->
    {{--<script src="/plugins/datepicker/bootstrap-datepicker.js"></script>--}}
    <!-- bootstrap color picker -->
    {{--<script src="/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>--}}
    <!-- bootstrap time picker -->
    {{--<script src="/plugins/timepicker/bootstrap-timepicker.min.js"></script>--}}
    <!-- iCheck 1.0.1 -->
    {{--<script src="/plugins/iCheck/icheck.min.js"></script>--}}
    <!-- AdminLTE for demo purposes -->
    {{--<script src="/dist/js/demo.js"></script>--}}


@stop

