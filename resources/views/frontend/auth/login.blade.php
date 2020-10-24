<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login or Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/frontend/css/plugins.css') }}"/>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/frontend/css/toastr.min.css') }}"/>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/frontend/css/main.css') }}"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">
</head>

<body>
<div class="site-wrapper" id="top">

    @include('frontend.layout.header')

    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-offset-3 col-md-6" style="margin: 0 auto;">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link {{ app('request')->input('sign-up') ? '' : 'active' }}" data-toggle="tab" href="#sign-in">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ app('request')->input('sign-up') ? 'active' : '' }}" data-toggle="tab" href="#sign-up">Sign Up</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade {{ app('request')->input('sign-up') ? '' : 'show active' }}" id="sign-in">
                        <form action="{{ route('login') }}" method="post">
                            <div class="login-form text-center">
                                <div class="row">
                                    {{ csrf_field() }}
                                    <div class="col-12 mb--20">
                                        <input class="mb-0 form-control" name="email" type="text" id="loginEmail"
                                               placeholder="Email or Username Here..">
                                        {!! $errors->first('email', '<small class="text-danger">:message</small>') !!}
                                    </div>
                                    <div class="col-12 mb--20">
                                        <input class="mb-0 form-control" name="password" type="password"
                                               id="loginPassword" placeholder="Password">
                                        {!! $errors->first('password', '<small class="text-danger">:message</small>') !!}
                                    </div>
                                    <div class="col-12">
                                        <div class="row col-12">
                                            <input type="checkbox" name="remember" id="rememberMe" value="1">
                                            <label class="ml-1 mt-2" for="rememberMe"> Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 pb-3" style="border-bottom: 1px solid #62ab00">
                                        <button type="submit" class="btn btn-outlined">Sign In</button>
                                    </div>

                                    <div class="col-12 mb--20">
                                        <div class="social-block">
                                            <h3 class="title mt-1">Or</h3>
                                            <ul class="social-list list-inline">
                                                <li class="single-social facebook"><a href=""><i
                                                                class="ion ion-social-facebook"></i></a></li>
                                                <li class="single-social google"><a href=""><i
                                                                class="ion ion-social-googleplus-outline"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade {{ app('request')->input('sign-up') ? 'show active' : '' }}" id="sign-up">
                        <div class="login-form text-center">
                            <form id="registrationForm" method="POST">
                                <div class="row">
                                    {{ csrf_field() }}
                                    <div class="col-md-12 col-12 mb--15">
                                        <input class="mb-0 form-control" name="name" type="text" id="name"
                                               placeholder="Full Name">
                                        <small class="text-danger form-error" id="form-error-name"></small>
                                    </div>
                                    <div class="col-12 mb--20">
                                        <input class="mb-0 form-control" name="email" type="email" id="email"
                                               placeholder="Email Address Here..">
                                        <small class="text-danger form-error" id="form-error-email"></small>
                                    </div>
                                    <div class="col-12 mb--20">
                                        <input class="mb-0 form-control" name="username" type="text" id="username"
                                               placeholder="Username Here..">
                                        <small class="text-danger form-error" id="form-error-username"></small>
                                    </div>
                                    <div class="col-12 mb--20">
                                        <input class="mb-0 form-control" name="password" type="password" id="password"
                                               placeholder="Password">
                                        <small class="text-danger form-error" id="form-error-password"></small>
                                    </div>
                                    <div class="col-12 mb--20">
                                        <input class="mb-0 form-control" name="password_confirmation" type="password"
                                               id="repeat-password" placeholder="Repeat your password">
                                        <small class="text-danger form-error"
                                               id="form-error-password_confirmation"></small>
                                    </div>
                                    <div class="col-md-12 pb-3" style="border-bottom: 1px solid #62ab00">
                                        <button class="btn btn-outlined register">
                                            Sign up
                                        </button>
                                    </div>

                                    <div class="col-12 mb--20">
                                        <div class="social-block">
                                            <h3 class="title mt-1">Or</h3>
                                            <ul class="social-list list-inline">
                                                <li class="single-social facebook"><a href=""><i
                                                                class="ion ion-social-facebook"></i></a></li>
                                                <li class="single-social google"><a href=""><i
                                                                class="ion ion-social-googleplus-outline"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('/frontend/js/plugins.js') }}"></script>
<script src="{{ asset('/frontend/js/toastr.min.js') }}"></script>
<script src="{{ asset('/frontend/js/custom.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var loginError = "{{ session('login') }}";

    $(document).ready(function () {
        if (loginError === "1") {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": true,
            }
            toastr.error('These credentials do not match our records.');
        }
    });

    var registerUrl = "{{ route('register') }}";
</script>
<script src="{{ asset('/frontend/js/auth.js') }}"></script>

</body>
</html>


