<!DOCTYPE html>
<!--[if IE 9 ]-->
<html class="ie9">
<!--[endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MB Crédito - CBO</title>

        <!-- -->
        <link type="text/css" rel="stylesheet" href="{{ asset('/dist/css/btnLoadind.css') }}"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="{{ asset('/lib/fullcalendar/dist/fullcalendar.min.css') }}"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="{{ asset('/lib/animate.css/animate.min.css') }}"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="{{ asset('/lib/sweetalert2/dist/sweetalert2.min.css') }}"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="{{ asset('/lib/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="{{ asset('/lib/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="{{ asset('/lib/datatables.net-dt/css/jquery.dataTables.min.css') }}" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="{{ asset('/dist/css/datetimepicker/build/jquery.datetimepicker.min.css')}}" rel="stylesheet"/>
        <link type="text/css" rel="stylesheet" href="{{ asset('/dist/js/krajee/css/fileinput.css')}}" rel="stylesheet"/>

        <!-- Animação de loading em consultas ajax -->
        <link type="text/css" rel="stylesheet" href="{{ asset('/dist/css/load.css')}}" rel="stylesheet"/>
        <link href="{{ asset('/lib/chosen/chosen.css') }}" rel="stylesheet">
        <link href="{{ asset('/lib/summernote/dist/summernote.css') }}" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="{{ asset('/dist/css/app_1.min.css') }}"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="{{ asset('/dist/css/app_2.min.css') }}"  media="screen,projection"/>

        {{-- CSS personalizados--}}
        <link type="text/css" rel="stylesheet" href="{{ asset('/dist/css/demo.css') }}"  media="screen,projection"/>

        @yield('css')
    </head>
    <body id="body">
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
                <a href="index.html">MB Crédito - CBO</a>
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
                        {{ isset(Auth::user()->operador->nome_operadores)
                            ? Auth::user()->operador->nome_operadores
                            : Auth::user()->username }}
                        <i class="zmdi zmdi-caret-down"></i>
                    </div>
                </a>

                <ul class="main-menu">
                    <li>
                        <a href="{{ route('usuario.edit', ['id' => Auth::user()->id])  }}"><i class="zmdi zmdi-settings"></i>Perfil</a>
                    </li>
                    <li>
                        <a href="{{ route('auth.getLogout') }}"><i class="zmdi zmdi-time-restore"></i>Sair</a>
                    </li>
                </ul>
            </div>

            <ul class="main-menu">
                @if(Auth::user()->is('ROLE_ADMIN') || Auth::user()->is('ROLE_GERENTE'))
                <li><a href="{{ route('dashboard') }}"><i class="zmdi zmdi-chart"></i> Dashboard</a></li>
                <li class="sub-menu">
                    <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-collection-text"></i>CBO</a>
                    <ul>
                        <li><a href="{{ route('operador.index') }}">Agentes</a></li>
                    </ul>
                </li>
                @endif
                <li class="sub-menu">
                    <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-phone"></i>Callcenter</a>
                    <ul>
                        <li><a href="{{ route('contrato.index') }}">Contratos</a></li>
                        <li><a href="{{ route('agencia.index') }}">Agências</a></li>
                        <li><a href="{{ route('convenio.index') }}">Convênios</a></li>
                    </ul>
                </li>

                @if(Auth::user()->is('ROLE_ADMIN') || Auth::user()->is('ROLE_GERENTE'))
                <li class="sub-menu">
                    <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-globe-lock"></i>Configurações</a>
                    <ul>
                        <li><a href="{{ route('usuario.index') }}">Gerenciamento de Usuários</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </aside>
        {{--FIM Menu Lateral--}}

        @yield('content')

    </section>

    <!-- Page Loader -->
    <div class="page-loader">
        <div class="preloader pls-blue">
            <svg class="pl-circular" viewBox="25 25 50 50">
                <circle class="plc-path" cx="50" cy="50" r="20" />
            </svg>

            <p>Please wait...</p>
        </div>
    </div>

    <!-- Imagem de carregamento em requisições ajax-->
    <div class="modal">
        <div class="preloader pl-xxl">
            <svg class="pl-circular" viewBox="25 25 50 50">
                <circle class="plc-path" cx="50" cy="50" r="20"/>
            </svg>
        </div>
    </div>
    <!-- Fim imagem de carregamento em requisições ajax-->

    <footer id="footer" class="p-t-0">
        <strong>Copyright &copy; 2015-2016 <a target="_blank" href="http://serbinario.com.br"><i></i>SERBINARIO</a> .</strong> Todos os direitos reservados.
    </footer>

    <!-- Javascript Libraries -->
    <script src="{{ asset('/lib/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('/lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/lib/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('/lib/Waves/dist/waves.min.js') }}"></script>
    <script src="{{ asset('/dist/jquery.datetimepicker.js') }}"></script>
    <script src="{{ asset('/lib/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('/lib/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/lib/jquery-validation/dist/jquery.validate.js') }}"></script>
    <script src="{{ asset('/lib/jquery-validation/src/additional/cpfBR.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/dist/js/adicional/unique.js')  }}"></script>
    {{--<script src="{{ asset('/dist/js/fileinput/fileinput.min.js')}}"></script>--}}
    <script src="{{ asset('/dist/js/krajee/js/fileinput.js')}}"></script>
    <script src="{{ asset('/dist/js/krajee/js/locales/pt-BR.js')}}"></script>
    <script src="{{ asset('/lib/jquery-mask-plugin/dist/jquery.mask.js') }}"></script>
    <script src="{{ asset('/js/laroute.js') }}"></script>

    <!-- Placeholder for IE9 -->
    <!--[if IE 9 ]-->
    <script type="text/javascript" src={{ asset('/lib/jquery-placeholder/jquery.placeholder.min.js') }}></script>
    <!--[endif]-->

    <script src="{{ asset('/lib/chosen/chosen.jquery.js') }}"></script>

    <script type="text/javascript" src={{ asset('/dist/js/app.js') }}></script>

    <script type="text/javascript">
        $(".chosen").chosen();
        $('.dateTimePicker').datetimepicker({
            format : 'd/m/Y'
        });
    </script>

    <!-- Imagem de carregamento em requisições ajax-->
    {{--<script type="text/javascript">
        $body = $("body");

        $(document).on({
            ajaxStart: function() {
                $body.addClass("loading");
            },
            ajaxStop: function() {
                $body.removeClass("loading");
            }
        });
    </script>--}}
    <!-- -->

    @yield('javascript')

    </body>
</html>