<!DOCTYPE html>

<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="/assets/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | {{ $title }}</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="/assets/css/app.css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body>
    <!-- BEGIN: Notification Content -->
    @include('dashboard.layouts.notification')
    <!-- END: Notification Content -->
    <div class="min-h-screen py-5 md:py-5 md:pr-5">
        <!-- BEGIN: Mobile Menu -->
        @include('dashboard.layouts.menumobile')
        <!-- END: Mobile Menu -->
        <!-- BEGIN: Top Bar -->
        @include('dashboard.layouts.topbar')
        <!-- END: Top Bar -->
        <div class="flex overflow-hidden">
            <!-- BEGIN: Side Menu -->
            @include('dashboard.layouts.sidemenu')
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                @yield('container')
            </div>
            <!-- END: Content -->
        </div>
    </div>


    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/ckeditor-classic.js"></script>

    @stack('script')
    <script>
        window.onload = function() {
            @if (session()->has('success'))
                showSuccessNotification();
            @endif
            @if (session()->has('error'))
                showErrorNotification();
            @endif
        };
    </script>
    <!-- END: JS Assets-->

</body>

</html>
