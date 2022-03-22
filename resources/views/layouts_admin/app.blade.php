<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google." />
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard" />
    <meta name="author" content="ThemeSelect" />
    <title>
        @yield('title')
    </title>
    <link rel="apple-touch-icon" href="{{ asset('assets/images/favicon/apple-touch-icon-152x152.png') }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/vendors.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/animate-css/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/chartist-js/chartist.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/chartist-js/chartist-plugin-tooltip.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/flag-icon/css/flag-icon.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/data-tables/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/data-tables/css/select.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/data-tables.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/page-users.css') }}">

    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themes/vertical-modern-menu-template/materialize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themes/vertical-modern-menu-template/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/dashboard-modern.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/intro.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/app-sidebar.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/app-contacts.css') }}" />

    <!-- Search -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/page-search.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/advance-ui-media.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/app-invoice.css') }}">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom/custom.css') }}" />
    <!-- END: Custom CSS-->
    @yield('head')
</head>
<!-- END: Head-->

<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns" data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">
    <!-- BEGIN: Header-->


    <!-- END: Header-->


    <!-- BEGIN: SideNav-->
    @include('layouts_admin.sidebar')
    <!-- END: SideNav-->
    @include('layouts_admin.header')

    {{-- Yield Content --}}
    @yield('content')

    <!-- Theme Customizer -->

    @include('layouts_admin.theme')

    <!--/ Theme Customizer -->

    <!-- <a href="https://1.envato.market/materialize_admin" target="_blank" class="btn btn-buy-now gradient-45deg-indigo-purple gradient-shadow white-text tooltipped buy-now-animated tada" data-position="left" data-tooltip="Buy Now!"><i class="material-icons">add_shopping_cart</i></a> -->

    <!-- BEGIN: Footer-->

    @include('layouts_admin.footer')

    <!-- END: Footer-->
    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('assets/js/vendors.min.js') }}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('assets/vendors/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/chartist-js/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/chartist-js/chartist-plugin-tooltip.js') }}"></script>
    <script src="{{ asset('assets/vendors/chartist-js/chartist-plugin-fill-donut.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/data-tables/js/dataTables.select.min.js') }}"></script>

    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('assets/js/scripts/data-tables.js') }}"></script>
    <!-- END PAGE LEVEL JS-->

    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/search.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-script.js') }}"></script>
    <script src="{{ asset('assets/js/scripts/customizer.js') }}"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('assets/js/scripts/dashboard-modern.js') }}"></script>
    <script src="{{ asset('assets/js/scripts/intro.js') }}"></script>

    <script src="{{ asset('assets/js/scripts/app-contacts.js') }}"></script>

    <script src="{{ asset('assets/js/scripts/app-invoice.js') }}"></script>
    <!-- END PAGE LEVEL JS-->

    <!-- Vue -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue@next"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-cleave-component@2"></script>


    <!-- Modal -->
    <script src="{{ asset('assets/js/scripts/advance-ui-modals.js') }}"></script>

    <!-- User -->
    <script src="{{ asset('assets/js/scripts/page-users.js') }}"></script>

    <script src="{{ asset('assets/js/scripts/advance-ui-media.js') }}"></script>






    <!-- coba -->



    <!-- END: Footer-->
    <!-- BEGIN VENDOR JS-->

    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->

    <!-- END PAGE VENDOR JS-->
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('assets/js/scripts/dashboard-ecommerce.js') }}"></script>
    <!-- END PAGE LEVEL JS-->


    <script src="{{ asset('assets/js/scripts/advance-ui-carousel.js') }}"></script>

    <!-- <script src="{{ asset('assets/js/scripts/data-tables.js') }}"></script> -->
    <script src="{{ asset('assets/vendors/data-tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/data-tables/js/dataTables.select.min.js') }}"></script>

    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->

    <!-- Modal -->

    <!-- User -->

    <!-- Search -->


    @yield('pagescript')
</body>

</html>