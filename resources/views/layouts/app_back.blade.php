<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <link rel="stylesheet" href="/css/app.css">
    <link href="/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">

    <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/css/theme.css">
    <link href="/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <script src="/js/app.js"></script>

    <link href="/js/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="/js/bootstrap/bootstrap.min.css" rel="stylesheet" media="all">


    <!-- Title Page-->
    <title>CMS - {{$title??'page title'}}</title>


</head>

<body class="animsition">

<div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="index.html">
                        <img src="/images/icon/logo.png" alt="CMS"/>
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    @each('partials.menu', $item, 'item')
                </ul>
            </div>
        </nav>
    </header>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="#">
                <img src="/images/icon/logo.png" alt="CMS"/>
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    @each('partials.menu', $item, 'item')
                </ul>
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
        @include('partials/header')
        <!-- HEADER DESKTOP END-->

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    @if ( session()->has('message') )
                    <div class="alert alert-success alert-dismissible fade show" role="alert">{{
                        session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    @endif
                    @yield('content')
                    @include('partials/footer')
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
        @include('partials/modal')

    </div>

</div>
<!-- Jquery JS-->
<!-- Bootstrap JS-->
<!--<script src="/vendor/bootstrap-4.1/popper.min.js"></script>-->
<!--<script src="/vendor/bootstrap-4.1/bootstrap.min.js"></script>-->


<!-- Vendor JS       -->
<script src="/vendor/animsition/animsition.min.js"></script>
<script src="/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<script src="/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="/js/main.js"></script>
<script>
    href = $('.js-sub-list>li>a')
    href.each(function (index,obj){
        host=window.location.hostname
        path=window.location.pathname
        protocol = window.location.protocol
        url=protocol+"//"+host+path
        if(obj.href==url){
            console.log(index,obj.href,url)
            $(obj).addClass("active")
            openArrow(obj)
        }

    })

    href = $('.navbar__list>li>a')
    href.each(function (index,obj){
        host=window.location.hostname
        path=window.location.pathname
        protocol = window.location.protocol
        url=protocol+"//"+host+path
        if(obj.href==url){
            console.log(index,obj.href,url)
            $(obj).addClass("active")
            openArrow(obj)
        }

    })
    console.log(href)
</script>
</body>

</html>
<!-- end document-->
