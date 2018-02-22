<!DOCTYPE html>
<html>
<head>
    @include('Admins.partials._header')
    @yield('styles')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('Admins.partials._topNav')
    <!-- Left side column. contains the logo and sidebar -->
    @include('Admins.partials._leftSidebar')

    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        @yield('content')

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('Admins.partials._footer')
</div>
<!-- ./wrapper -->
@include('Admins.partials._scripts')

</body>
</html>
