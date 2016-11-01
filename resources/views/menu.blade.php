<!DOCTYPE html>
<!--[if IE 9 ]-->
<html class="ie9">
<!--[endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Material Admin</title>

        {{--<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">--}}

        <link type="text/css" rel="stylesheet" href="/lib/fullcalendar/dist/fullcalendar.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="/lib/animate.css/animate.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="/lib/sweetalert2/dist/sweetalert2.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="/lib/material-design-iconic-font/dist/css/material-design-iconic-font.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="/lib/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="/lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">


        <link type="text/css" rel="stylesheet" href="/dist/css/app_1.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="/dist/css/app_2.min.css"  media="screen,projection"/>

    </head>
    <body>
    <header id="header" class="clearfix" data-ma-theme="blue">
        <ul class="h-inner">
            <li class="hi-trigger ma-trigger" data-ma-action="sidebar-open" data-ma-target="#sidebar">
                <div class="line-wrap">
                    <div class="line top"></div>
                    <div class="line center"></div>
                    <div class="line bottom"></div>
                </div>
            </li>

            <li class="hi-logo hidden-xs">
                <a href="index.html">Material Admin</a>
            </li>

            <li class="pull-right">
                <ul class="hi-menu">


                    <li class="hidden-xs ma-trigger" data-ma-action="sidebar-open" data-ma-target="#chat">
                        <a href=""><i class="him-icon zmdi zmdi-comment-alt-text"></i></a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Top Search Content -->
        <div class="h-search-wrap">
            <div class="hsw-inner">
                <i class="hsw-close zmdi zmdi-arrow-left" data-ma-action="search-close"></i>
                <input type="text">
            </div>
        </div>
    </header>


    <section id="main">

        {{--Menu Lateral--}}
        <aside id="sidebar" class="sidebar c-overflow">
            <div class="s-profile">
                <a href="" data-ma-action="profile-menu-toggle">
                    <div class="sp-pic">
                        <img src="/dist/img/demo/profile-pics/1.jpg" alt="">
                    </div>

                    <div class="sp-info">
                        Malinda Hollaway

                        <i class="zmdi zmdi-caret-down"></i>
                    </div>
                </a>

                <ul class="main-menu">
                    <li>
                        <a href="profile-about.html"><i class="zmdi zmdi-account"></i> View Profile</a>
                    </li>
                    <li>
                        <a href=""><i class="zmdi zmdi-input-antenna"></i> Privacy Settings</a>
                    </li>
                    <li>
                        <a href=""><i class="zmdi zmdi-settings"></i> Settings</a>
                    </li>
                    <li>
                        <a href=""><i class="zmdi zmdi-time-restore"></i> Logout</a>
                    </li>
                </ul>
            </div>

            <ul class="main-menu">
                <li><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                <li class="sub-menu">
                    <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-collection-text"></i>CBO</a>

                    <ul>
                        <li><a href="{{ route('operador.index') }}">Agentes</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-view-compact"></i>CBG</a>

                    <ul>
                        <li><a href="textual-menu.html">Textual menu</a></li>
                        <li><a href="image-logo.html">Image logo</a></li>
                        <li><a href="top-mainmenu.html">Mainmenu on top</a></li>
                    </ul>
                </li>


            </ul>
        </aside>
        {{--FIM Menu Lateral--}}

        @yield('content')

    </section>


    <footer id="footer">
        Copyright &copy; 2015 Material Admin

        <ul class="f-menu">
            <li><a href="">Home</a></li>
            <li><a href="">CBO</a></li>
            <li><a href="">CBG</a></li>
            <li><a href="">Support</a></li>
            <li><a href="">Contact</a></li>
        </ul>
    </footer>

    <!-- Javascript Libraries -->
    <script src="/lib/jquery/dist/jquery.min.js"></script>
    <script src="/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/lib/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/lib/Waves/dist/waves.min.js"></script>
    <script src="/lib/bootstrap-growl/bootstrap-growl.min.js"></script>
    <script src="/lib/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="/lib/datatables.net/js/jquery.dataTables.min.js"></script>

    {{--teste--}}






        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]-->
        <script type="text/javascript" src={{ asset('/lib/jquery-placeholder/jquery.placeholder.min.js') }}></script>
        <!--[endif]-->

        <script type="text/javascript" src={{ asset('/dist/js/app.min.js') }}></script>

        @yield('javascript')

    </body>
</html>