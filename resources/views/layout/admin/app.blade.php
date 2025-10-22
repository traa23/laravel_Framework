<!--

=========================================================
* Volt Pro - Premium Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themesberg.com/licensing)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.
.
.
.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title> @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Halaman - Pelanggan ">
    <meta name="author" content="Themesberg">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets-admin/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets-admin/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets-admin/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets-admin/img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets-admin/img/favicon/safari-pinned-tab.svg') }}" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    {{-- Start CSS --}}
    <!-- Volt CSS -->
    @include('layout.admin.css')
    {{-- End CSS --}}
</head>

<body>
    {{-- START SIDEBAR --}}
   @include('layout.admin.sidebar')
    {{-- END SIDEBAR --}}

    <main class="content">
        {{-- START HEADER --}}
        @include('layout.admin.header')
        {{-- END HEADER --}}

        {{-- START CONTENT --}}
        @yield('content')
    {{-- END CONTENT -- --}}

    {{-- START FOOTER --}}
        @include('layout.admin.footer')
        {{-- END FOOTER --}}
    </main>
    {{-- START JS --}}
    <!-- Core -->
    @include('layout.admin.js')
    {{-- END JS --}}
    <!-- Volt JS -->
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>
</body>



</html>
