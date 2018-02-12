<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>WHISPER</title>
    <link rel="stylesheet" href="{{ url('') }}/css/bootstrap.css">
    <script src="{{ url('') }}/js/jquery.3.2.1.min.js"></script>
    <script src="{{ url('') }}/js/bootstrap.js"></script>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="{{ url('') }}/css/home/paper-bootstrap-wizard.css" rel="stylesheet" />
    <!-- CSS Just for home css -->
    <link href="{{ url('') }}/css/home/home.css" rel="stylesheet" />
    <!-- Fonts and Icons -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ url('') }}/css/home/themify-icons.css" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <div class="image-container set-full-height" style="background-image: url('/img/paper-3.jpeg')">
    <!--   Big container   -->
    <div class="container">
        <!--      Wizard container        -->
        <div class="row">
            <div class="col-sm-12">
                <div class="wizard-container">
                    <!--Alerts start-->
                    @include('users.partials._register_error')
                    <!--Alerts end-->

                    <div class="card wizard-card" data-color="azure" id="wizard">
                        <!--   WISPER Branding   -->
                        <a href="#">
                            <div class="logo-container">
                                <div class="logo">
                                    <img src="/img/new_logo.png">
                                </div>
                                <div class="brand">
                                    WHISPER
                                </div>
                            </div>
                        </a>
                        <div class="row margin-top-50">
                            <div class="col-md-7 margin-top-50 xs-hidden">
                                <div class="inside-image-background" style="background-image: url('/img/gray-globe.png');"></div>
                            </div>
                            <div class="col-md-5 margin-top-50" id="sign_in_portion">
                                <div class="user-image text-center">
                                    <img src="/img/face-0.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="sign-in">
                                    <h3 class="header-for-page">SIGN IN</h3>
                                    <form method="POST" action="{{ route('login') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Email or Phone">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-warning sign-in-btn" value="Sign In">
                                            <a class="forgot-password" href="#" id="forgot_password">Forgot Password ?</a>
                                        </div>
                                        <div class="form-group create-account-group">
                                            <a class="create-account" href="#" id="create_account">Create an account.</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5 margin-top-50 display-none" id="forgot_password_portion">
                                <div class="sign-in">
                                    <h3 class="header-for-page">Forgot Password</h3>
                                    <form method="POST" action="{{ route('password.email') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="email" required name="email" class="form-control" id="forgot_email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-warning sign-in-btn" value="Send Reset Link">
                                            <a class="already_sign_in_button" href="#">Already have an account?</a>
                                        </div>
                                        <div class="form-group create-account-group">
                                            <a class="create-account" href="#" id="create_account_from_forgot">Create an account.</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5 margin-top-50 display-none" id="create_account_portion">
                                <div class="sign-in">
                                    <h3 class="header-for-page">Sign up</h3>
                                    <form  method="POST" action="{{ route('register') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Email or Phone" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-warning sign-in-btn" value="Sign UP">
                                            <a class="already_sign_in_button" href="#" id="already_have_account">Already have an account?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- wizard container -->
            </div>
            <div class="col-sm-12">
                <footer>
                    <ul class="footer-ul">
                        <li class="footer-item">Footer</li>
                        <li class="footer-item"><a href="#">About</a></li>
                        <li class="footer-item"><a href="#">Complaints</a></li>
                        <li class="footer-item"><a href="#">Ads</a></li>
                        <li class="footer-item"><a href="#">Cookies</a></li>
                        <li class="footer-item"><a href="#">Privacy</a></li>
                        <li class="footer-item"><a href="#">Faq's</a></li>
                        <li class="footer-item"><a href="#">&copy;Copyright WISPER 2018</a></li>
                    </ul>
                </footer>
            </div>
        </div> <!-- row -->
    </div> <!--  big container -->

    <!--<div class="footer">-->
    <!--<div class="container text-center">-->
    <!--Made <i class="fa fa-heart heart"></i> by <a href="#">joe Otabor</a>-->
    <!--</div>-->
    <!--</div>-->
</div>


    <script src="{{ url('') }}/js/home/jquery.bootstrap.wizard.js" type="text/javascript"></script>
    <!--  Plugin for the Wizard -->
    <script src="{{ url('') }}/js/home/paper-bootstrap-wizard.js" type="text/javascript"></script>
    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
    <script src="{{ url('') }}/js/home/jquery.validate.min.js" type="text/javascript"></script>
    <script src="{{ url('') }}/js/home//router.js" type="text/javascript"></script>
</body>
</html>
