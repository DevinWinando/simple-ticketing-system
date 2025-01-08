<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 5 admin dashboard template & web App ui kit.">
    <meta name="keyword"
        content="LUNO, Bootstrap 5, ReactJs, Angular, Laravel, VueJs, ASP .Net, Admin Dashboard, Admin Theme, HRMS, Projects, Hospital Admin, CRM Admin, Events, Fitness, Music, Inventory, Job Portal">
    <title>Ticketing</title>

    <link rel="stylesheet" href="{{ asset('/assets/css/luno-style.css') }}">
    <script src="{{ asset('/assets/js/plugins.js') }}"></script>

    @yield('style')
</head>

<body class="layout-1" data-luno="theme-blue">
    @include('layouts.sidebar')
    <div class="wrapper">
        <header class="page-header sticky-top px-xl-4 px-sm-2 px-0 py-lg-2 py-1">
            <div class="container-fluid">
                <nav class="navbar">
                    <div class="d-flex">
                        <button type="button"
                            class="btn btn-link d-none d-xl-block sidebar-mini-btn p-0 text-primary">
                            <span class="hamburger-icon">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </span>
                        </button>
                        <button type="button"
                            class="btn btn-link d-block d-xl-none menu-toggle p-0 text-primary">
                            <span class="hamburger-icon">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </span>
                        </button>
                        <a href="./index.html"
                            class="brand-icon d-flex align-items-center mx-2 mx-sm-3 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                fill="#8bacdf" viewBox="0 0 256 256" class="me-2">
                                <path
                                    d="M12,111l112,64a8,8,0,0,0,7.94,0l112-64a8,8,0,0,0,0-13.9l-112-64a8,8,0,0,0-7.94,0l-112,64A8,8,0,0,0,12,111ZM128,49.21,223.87,104,128,158.79,32.13,104ZM246.94,140A8,8,0,0,1,244,151L132,215a8,8,0,0,1-7.94,0L12,151A8,8,0,0,1,20,137.05l108,61.74,108-61.74A8,8,0,0,1,246.94,140Z">
                                </path>
                            </svg>
                            Simple Ticketing System
                        </a>
                    </div>
                </nav>
            </div>
        </header>

        <div class="page-body body-layout-1 my-task">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('/assets/js/theme.js') }}"></script>

    @yield('script')
</body>

</html>
