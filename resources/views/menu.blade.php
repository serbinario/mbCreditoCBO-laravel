<!DOCTYPE html>
<html ng-app="mbCredCBO">
<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="/lib/materialize/dist/css/materialize.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="/lib/materialize/dist/css/forms.css "  media="screen,projection"/>


{{--<link type="text/css" rel="stylesheet" href="/style.css"  media="screen,projection"/>--}}

<!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
    <li><a href="#!">one</a></li>
    <li><a href="#!">two</a></li>
    <li class="divider"></li>
    <li><a href="#!">three</a></li>
</ul>

<ul id="dropdown2" class="dropdown-content">
    <li><a href="#!">one</a></li>
    <li><a href="#!">two</a></li>
    <li class="divider"></li>
    <li><a href="#!">three</a></li>
</ul>

<div class="navbar-fixed"> <!-- class="navbar-fixed deixa fixo o menu -->
    <nav>
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo right">Logo</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="Left hide-on-med-and-down">
                <li><a href="sass.html">Sass</a></li>
                <li><a href="badges.html">Components</a></li>
                <li><a href="collapsible.html">Javascript</a></li>
                <li><a href="mobile.html">Mobile</a></li>
                <li>
                    <a class="dropdown-button" href="#!" data-activates="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="sass.html">Sass</a></li>
                <li><a href="badges.html">Components</a></li>
                <li><a href="collapsible.html">Javascript</a></li>
                <li><a href="mobile.html">Mobile</a></li>
                <li>
                    <a class="dropdown-button" href="#!" data-activates="dropdown2">Dropdown<i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>

@yield('content')


<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="/lib/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="/lib/materialize/dist/js/materialize.js"></script>
<script type="text/javascript" src={{ asset('/lib/angular/angular.js') }}></script>
<script type="text/javascript" src={{ asset('/lib/datatables/media/js/jquery.dataTables.js') }}></script>
<script type="text/javascript" src={{ asset('/app.js') }}></script>
<script type="text/javascript" src={{ asset('/js/controller/agente.ctrl.js') }}></script>

<script type="text/javascript">
    // Initialize collapsible (uncomment the line below if you use the dropdown variation)
    //$('.collapsible').collapsible();
    $('select').material_select();
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