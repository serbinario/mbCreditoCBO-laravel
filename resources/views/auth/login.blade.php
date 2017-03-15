<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>MB Crédito</title>

    <!-- -->
    <link href="{{ asset('/lib/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="{{asset('/dist/css/AdminLTE.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/dist/fonts/font-awesome/css/font-awesome.css')}}" />

    <!-- Ionicons -->
    <link href="{{ asset('/dist/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('/dist/css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('/dist/css/_all-skins.min.css')}}" />

    <!-- -->
    <link rel="stylesheet" href="{{asset('/dist/css/cs-login.css')}}" />
    <link rel="stylesheet" href="{{asset('/dist/css/select2.min.css')}}" />

    {{--<link rel="icon" type="image/x-icon" href="{{ asset('logo_sistema_menu_sbl.ico') }}" />--}}
</head>

<body class="skin-red sidebar-mini wysihtml5-supported fixed" style="background-position: 119px 27px, 63px center;">

<div class="wrapper">
    <div class="container">
        <div class="row vertical-offset-100">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default" style="margin-top: -50px">
                    <div class="panel-heading">
                        <div class="row-fluid user-row">
                            <center>
                                <h3>MB Crédito</h3>
                            </center>
                        </div>
                    </div>
                    <div class="panel-body">
                        <!-- alerta -->
                        @if(Session::has('errors'))
                            <div class="alert alert-danger">
                                @lang('auth.failed')<br>
                            </div>
                            @endif

                            <!-- logo -->
                            {{--<div class="login-logo">
                                <center><img id="logo" src="{{ asset('/dist/img/logo.jpg') }}"
                                             class="img-responsive" alt="Logo"/></center>
                            </div>--}}

                            <!-- formulário -->
                            {!! Form::open(['route'=>'auth.postLogin', 'method' => "POST" ]) !!}
                            {!! csrf_field() !!}

                            <div class="lcb-form">
                                <div class="form-group">
                                    <div class="fg-line">
                                        {!! Form::text('username', old('username'), array('class' => 'form-control input-sm', 'placeholder' => 'Login')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="fg-line">
                                        {!! Form::password('password', array('class' => 'form-control input-sm', 'placeholder' => 'Senha')) !!}
                                    </div>
                                </div>

                                {{--<div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        <i class="input-helper"></i>
                                        Manter-me conectado
                                    </label>
                                </div>--}}

                                <div class="row">
                                    <div class="col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                                    </div>
                                </div>
                            </div>

                            {!! Form::close() !!}

                            <center>
                                <strong>
                                    Copyright © 2004-2015
                                    <a target="__blanck" href="http://www.serbinario.com.br/">Serbinário</a>
                                    <br>
                                </strong>
                                Todos os direitos reservados.
                            </center>

                            <center>
                                <img class="img-responsive" src="{{ asset('/dist/img/serbinario_logo.png') }}" style="margin-bottom:                                        15px; margin-top: 10px" width="200" height="100">
                            </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- wrapper -->

<!-- bibliotecas -->
<script type="text/javascript" src="{{ asset('/lib/jquery/dist/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('/lib/bootstrap/dist/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('/lib/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('/lib/fastclick/lib/fastclick.js') }}"></script>
<script type="text/javascript" src="{{ asset('/dist/js/app_2.min.js') }}"></script>