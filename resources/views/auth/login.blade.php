<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Material Admin</title>

    <!--CSS Vendor-->
    <link type="text/css" rel="stylesheet" href="/lib/material-design-iconic-font/dist/css/material-design-iconic-font.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="/lib/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css"  media="screen,projection"/>

    <!-- CSS -->
    <link type="text/css" rel="stylesheet" href="/dist/css/app_1.min.css"  media="screen,projection"/>
</head>

<body>
<div class="login-content">
    <!-- Login -->
    <div class="lc-block toggled" id="l-login">

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

                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="">
                        <i class="input-helper"></i>
                        Keep me signed in
                    </label>
                </div>

                <button type="submit">Logar</button>
            </div>

        {!! Form::close() !!}

        <div class="lcb-navigation">
            <a href="" data-ma-action="login-switch" data-ma-block="#l-register"><i class="zmdi zmdi-plus"></i> <span>Register</span></a>
            <a href="" data-ma-action="login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
        </div>
    </div>

    <!-- Register -->
    <div class="lc-block" id="l-register">
        <div class="lcb-form">
            <div class="form-group">
                <div class="fg-line">
                    <input type="text" class="form-control" placeholder="Username">
                </div>
            </div>

            <div class="form-group">
                <div class="fg-line">
                    <input type="text" class="form-control" placeholder="Email Address">
                </div>
            </div>

            <div class="form-group">
                <div class="fg-line">
                    <input type="password" class="form-control" placeholder="Password">
                </div>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" value="">
                    <i class="input-helper"></i>
                    Terms and Condition
                </label>
            </div>

            <a href="" class="btn btn-login btn-success"><i class="zmdi zmdi-check"></i></a>
        </div>

        <div class="lcb-navigation">
            <a href="" data-ma-action="login-switch" data-ma-block="#l-login"><i class="zmdi zmdi-long-arrow-right"></i> <span>Sign in</span></a>
            <a href="" data-ma-action="login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
        </div>
    </div>

    <!-- Forgot Password -->
    <div class="lc-block" id="l-forget-password">
        <div class="lcb-form">
            <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu risus. Curabitur commodo lorem fringilla enim feugiat commodo sed ac lacus.</p>

            <div class="fg-line">
                <input type="text" class="form-control" placeholder="Email Address">
            </div>

            <a href="" class="btn btn-login btn-success"><i class="zmdi zmdi-check"></i></a>
        </div>

        <div class="lcb-navigation">
            <a href="" data-ma-action="login-switch" data-ma-block="#l-login"><i class="zmdi zmdi-long-arrow-right"></i> <span>Sign in</span></a>
            <a href="" data-ma-action="login-switch" data-ma-block="#l-register"><i class="zmdi zmdi-plus"></i> <span>Register</span></a>
        </div>
    </div>
</div>

<!-- Javascript Libraries -->
<script src="/lib/jquery/dist/jquery.min.js"></script>
<script src="/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/lib/Waves/dist/waves.min.js"></script>

<script type="text/javascript" src={{ asset('/dist/js/app.js') }}></script>

</body>
</html>
