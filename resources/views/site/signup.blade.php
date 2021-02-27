<!doctype html>
<html lang="en-US">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}} | Sign Up</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('site/images/favicon.ico')}}"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}"/>
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{asset('site/css/typography.css')}}">
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}"/>
    <!-- Responsive -->
    <link rel="stylesheet" href="{{asset('site/css/responsive.css')}}"/>
</head>
<body>
<div id="loading">
    <div id="loading-center">
    </div>
</div>

<!-- MainContent -->
<section class="sign-in-page">
    <div class="container">
        <div class="row justify-content-center align-items-center height-self-center">
            <div class="col-lg-5 col-md-12 align-self-center">
                <div class="sign-user_card ">
                    <div class="sign-in-page-data">
                        <div class="sign-in-from w-100 m-auto">
                            <h3 class="mb-3 text-center">Sign Up</h3>
                            <form class="mt-4" action="{{route('signUp')}}" method="post">
                                @include('site.alerts.alert')
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control mb-0" id="exampleInputEmail2" placeholder="Enter Full Name" autocomplete="off" required name="name">
                                    @error('name')<span class="small text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control mb-0" id="exampleInputEmail3" placeholder="Enter email" autocomplete="off" required name="email">
                                    @error('email')<span class="small text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control mb-0" id="exampleInputPassword2" placeholder="Password" required name="password">
                                    @error('password')<span class="small text-danger">{{$message}}</span>@enderror
                                </div>
                                <button type="submit" class="btn btn-hover">Sign Up</button>
                            </form>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="d-flex justify-content-center links">
                            Already have an account? <a href="{{route('getLogin')}}" class="text-primary ml-2">LogIn</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- MainContent End-->
<!-- jQuery, Popper JS -->
<script src="{{asset('site/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('site/js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('site/js/bootstrap.min.js')}}"></script>
<!-- Slick JS -->
<script src="{{asset('site/js/slick.min.js')}}"></script>
<!-- owl carousel Js -->
<script src="{{asset('site/js/owl.carousel.min.js')}}"></script>
<!-- select2 Js -->
<script src="{{asset('site/js/select2.min.js')}}"></script>
<!-- Magnific Popup-->
<script src="{{asset('site/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Slick Animation-->
<script src="{{asset('site/js/slick-animation.min.js')}}"></script>
<!-- Custom JS-->
<script src="{{asset('site/js/custom.js')}}"></script>
</body>
</html>
