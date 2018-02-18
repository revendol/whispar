<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{url('')}}/img/logo-small.jpg">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ url('') }}/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="{{ url('') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ url('') }}/css/bootstrap-grid.css">
    <link rel="stylesheet" href="{{ url('') }}/css/users/now-ui-kit.css">
    <link rel="stylesheet" href="{{ url('') }}/css/users/ui-kit.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!--   Core JS Files   -->
    <script src="{{ url('') }}/js/users/core/jquery.3.2.1.min.js" type="text/javascript"></script>
    @yield('styles')
</head>
<body>
    @include('users.layouts.navbar')

    @yield('content')


    <script src="{{ url('') }}/js/users/core/popper.min.js" type="text/javascript"></script>
    <script src="{{ url('') }}/js/users/core/bootstrap.min.js" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="{{ url('') }}/js/users/plugins/bootstrap-switch.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ url('') }}/js/users/plugins/nouislider.min.js" type="text/javascript"></script>
    <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
    <script src="{{ url('') }}/js/users/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{ url('') }}/js/users/now-ui-kit.js" type="text/javascript"></script>
    @yield('scripts')
</body>
</html>