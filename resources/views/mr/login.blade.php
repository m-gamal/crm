<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title>Login System</title>

    <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{URL::asset('img/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{URL::asset('img/icon57.png')}}" sizes="57x57">
    <link rel="apple-touch-icon" href="{{URL::asset('img/icon72.png')}}" sizes="72x72">
    <link rel="apple-touch-icon" href="{{URL::asset('img/icon76.png')}}" sizes="76x76">
    <link rel="apple-touch-icon" href="{{URL::asset('img/icon114.png')}}" sizes="114x114">
    <link rel="apple-touch-icon" href="{{URL::asset('img/icon120.png')}}" sizes="120x120">
    <link rel="apple-touch-icon" href="{{URL::asset('img/icon144.png')}}" sizes="144x144">
    <link rel="apple-touch-icon" href="{{URL::asset('img/icon152.png')}}" sizes="152x152">
    <link rel="apple-touch-icon" href="{{URL::asset('img/icon180.png')}}" sizes="180x180">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Bootstrap is included in its original form, unaltered -->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">

    <!-- Related styles of various icon packs and plugins -->
    <link rel="stylesheet" href="{{URL::asset('css/plugins.css')}}">

    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="{{URL::asset('css/main.css')}}">

    <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    <link rel="stylesheet" href="{{URL::asset('css/themes.css')}}">
    <!-- END Stylesheets -->

    <!-- Modernizr (browser feature detection library) & Respond.js (enables responsive CSS code on browsers that don't support it, eg IE8) -->
    <script src="{{URL::asset('js/vendor/modernizr-respond.min.js')}}"></script>
</head>
<body>
<!-- Login Full Background -->
<!-- For best results use an image with a resolution of 1280x1280 pixels (prefer a blurred image for smaller file size) -->
<img src="{{URL::asset('img/placeholders/backgrounds/login_full_bg.jpg')}}" alt="Login Full Background" class="full-bg animation-pulseSlow">
<!-- END Login Full Background -->

<!-- Login Container -->
<div id="login-container" class="animation-fadeIn">
    <!-- Login Title -->
    <div class="login-title text-center">
        <h1>
            <i class="gi gi-flash"></i>
            <strong>CRM System</strong>
        </h1>
    </div>
    <!-- END Login Title -->

    <!-- Login Block -->
    <div class="block push-bit">
        <!-- Login Form -->
            {!!
                Form::open(
                [
                'class' => 'form-horizontal form-bordered form-control-borderless',
                'id'    =>  'admin-login',
                'route' =>  'doAdminLogin',
                'method'=>  'POST'
                ])
            !!}
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                        <input type="text"  name="email" class="form-control input-lg" placeholder="Email">
                        @if($errors->has('email'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('email')}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                        <input type="password"  name="password" class="form-control input-lg" placeholder="Password">
                        @if($errors->has('password'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('password')}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                @if (Session::has('login-error'))
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <strong>Error :</strong> {{Session::get('login-error')}}
                        </div>
                    </div>
                @endif
            </div>
            <div class="form-group form-actions">
                <div class="col-xs-4">
                    <label class="switch switch-primary" data-toggle="tooltip" title="Remember Me?">
                        <input type="checkbox" name="remember_me">
                        <span></span>
                    </label>
                </div>
                <div class="col-xs-8 text-right">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Login to Dashboard</button>
                </div>
            </div>
        {!! Form::close() !!}
        <!-- END Login Form -->

    </div>
    <!-- END Login Block -->
</div>
<!-- END Login Container -->

<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="{{URL::asset('js/vendor/jquery-1.11.3.min.js')}}"></script>
<script src="{{URL::asset('js/vendor/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('js/plugins.js')}}"></script>
<script src="{{URL::asset('js/app.js')}}"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="{{URL::asset('js/pages/login.js')}}"></script>
<script>$(function(){ Login.init(); });</script>
</body>
</html>