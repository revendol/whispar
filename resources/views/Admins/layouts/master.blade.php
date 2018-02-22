<!DOCTYPE html>
<html>
<head>
    @include('admins.partials._header')
    @yield('styles')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('admins.partials._topNav')
    <!-- Left side column. contains the logo and sidebar -->
    @include('admins.partials._leftSidebar')

    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        @yield('content')

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('admins.partials._footer')
</div>
<!-- ./wrapper -->
@include('admins.partials._scripts')

</body>
</html>
