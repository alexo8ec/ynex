<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" class="light" data-header-styles="light" data-menu-styles="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Description" content="Laravel Tailwind CSS Responsive Admin Web Dashboard Template">
    <meta name="keywords" content="admin panel in laravel, tailwind, tailwind template admin, laravel admin panel, tailwind css dashboard, admin dashboard template, admin template, tailwind laravel, template dashboard, admin panel tailwind, tailwind css admin template, laravel tailwind template, laravel tailwind, tailwind admin dashboard">
    <title> YNEX - Laravel Tailwind CSS Admin & Dashboard Template </title>
    <base href="/" />
    @yield('css')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    @yield('switcher')
    <div id="loader">
        <img src="/build/assets/images/media/loader.svg" alt="">
    </div>
    <div class="page">
        @yield('header')
        @yield('sidebar')
        @yield('content')
        @yield('search')
        @yield('footer')
        @yield('variables')
    </div>
    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill text-xl"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    @yield('js')

</body>

</html>