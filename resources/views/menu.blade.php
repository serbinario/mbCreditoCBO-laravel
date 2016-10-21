<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {{--<link href="/font-woff2/2fcrYFNaTjcS6g4U3t-Y5ZjZjT5FdEJ140U2DJYC3mY.woff2" rel="stylesheet">--}}
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="/lib/materialize/dist/css/materialize.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="/dist/css/forems.css "  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="/dist/css/style.css "  media="screen,projection"/>
    {{--<link rel="stylesheet" type="text/css" href="/dist/css/dataTables.materialize.css">--}}
    {{--<link type="text/css" rel="stylesheet" href="/lib/angular-datatables/dist/css/angular-datatables.css "  media="screen,projection"/>--}}

{{--<link type="text/css" rel="stylesheet" href="/style.css"  media="screen,projection"/>--}}

<!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

<ul id="menuCbo" class="dropdown-content">
    {{--<li><a href="#!">Importar Arquivo</a></li>--}}
    {{--<li><a href="#!">Pesquisa</a></li>--}}
    <li><a href="{{ route('operador.index') }}">Agentes</a></li>
    {{--<li class="divider"></li>--}}
</ul>

{{--<ul id="menuCbg" class="dropdown-content">--}}
    {{--<li><a href="#!">IMPORTAR ARQUIVOS</a></li>--}}
    {{--<li><a href="#!">PESQUISA</a></li>--}}
{{--</ul>--}}

<ul id="menuCallCenter" class="dropdown-content">
    <li><a href="{{ route('contrato.index') }}">CONTRATOS</a></li>
    <li><a href="{{ route('agencia.index') }}">AGÊNCIAS</a></li>
    <li><a href="{{ route('convenio.index') }}">CONVÊNIOS</a></li>
    {{--<li><a href="#!">ALTERAR SENHA</a></li>--}}
</ul>

{{--<ul id="menuConfiguracoes" class="dropdown-content">--}}
    {{--<li><a href="#!">GERENCIAMENTO DE USUÁRIOS</a></li>--}}
{{--</ul>--}}

<div class="navbar-fixed"> <!-- class="navbar-fixed deixa fixo o menu -->
    <nav>
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo right">Logo</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="Left hide-on-med-and-down">
                <li>
                    <a class="dropdown-button" href="#!" data-activates="menuCbo">CBO<i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-button" href="#!" data-activates="menuCbg">CBG<i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-button" href="#!" data-activates="menuCallCenter">CALLCENTER<i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-button" href="#!" data-activates="menuConfiguracoes">CONFIGURAÇÕES<i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>

@yield('content')

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src={{ asset('/lib/jquery/dist/jquery.min.js') }}></script>
<script type="text/javascript" src={{ asset('/lib/materialize/dist/js/materialize.js') }}></script>
<script type="text/javascript" src={{ asset('/lib/angular/angular.js') }}></script>
<script type="text/javascript" src={{ asset('/lib/datatables/media/js/jquery.dataTables.js') }}></script>
<script type="text/javascript" src={{ asset('/lib/angular-resource/angular-resource.js') }}></script>
<script type="text/javascript" src="/dist/js/index.js"></script>
<!--Angular datatables-->
<script type="text/javascript" src={{ asset('/lib/angular-datatables/dist/angular-datatables.min.js') }}></script>
<script type="text/javascript" src={{ asset('/app.js') }}></script>
<script type="text/javascript" src={{ asset('/js/controller/agente.ctrl.js') }}></script>
<script type="text/javascript" src={{ asset('/js/controller/contrato.ctrl.js') }}></script>
<script type="text/javascript" src={{ asset('/js/services/agenteService.js') }}></script>

<script type="text/javascript">
    // Initialize collapsible (uncomment the line below if you use the dropdown variation)
    //$('.collapsible').collapsible();
    //$('select').material_select();
    $('.dropdown-button').dropdown();
    $('.button-collapse').sideNav();
    $('ul.tabs').tabs();
    $('.datepicker').pickadate();
    $('.collapsible').collapsible({
        accordion : true // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
</script>

@yield('javascript')

</body>
</html>