<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
@include('admin.partials.head')
<body>
<!-- Page Wrapper -->
<div id="page-wrapper">
    <!-- Page Container -->
    <div id="page-container" class="sidebar-visible-lg sidebar-no-animations">
        <!-- Main Sidebar -->
        @include('admin.partials.sidebar')
                <!-- END Main Sidebar -->

        <!-- Main Container -->
        <div id="main-container">
            <!-- Header -->
            @include('admin.partials.header')
                    <!-- END Header -->

            <!-- Begin Page Content -->
            <div id="page-content">
                @yield('content')
            </div>
            <!-- END Page Content -->
        </div>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
</div>
<!-- END Page Wrapper -->

@include('admin.partials.footer_scripts')
</body>
</html>