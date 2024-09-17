<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Global Stylesheets -->
    <link href="{{ asset('dashboard/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dashboard/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>

    <!-- Additional Head Content -->
    @yield('head')
</head>
<body id="kt_body" class="app-blank app-blank">
    <!-- Theme Mode Setup -->
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                themeMode = localStorage.getItem("data-bs-theme") || defaultThemeMode;
            }
            themeMode = themeMode === "system" ? 
                (window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light") : themeMode;
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>

    <!-- Page Content -->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        @yield('content')
    </div>

    <!-- Global Javascript Bundle -->
    <script src="{{ asset('dashboard/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/scripts.bundle.js') }}"></script>

    <!-- Additional Scripts -->
    @yield('scripts')
</body>
</html>
