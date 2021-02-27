<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{env('APP_NAME')}} | Login To Admin Dashboard</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('admin/images/favicon.ico')}}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/typography.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/responsive.css')}}">
</head>
<body>
<!-- loader Start -->
<div id="loading">
    <div id="loading-center">
    </div>
</div>
<!-- loader END -->
<!-- Sign in Start -->
<section class="sign-in-page">
    <div class="container">
        <div class="row justify-content-center align-items-center height-self-center">
            <div class="col-lg-5 col-md-12 align-self-center">
                <div class="sign-user_card ">
                    <div class="sign-in-page-data">
                        <div class="sign-in-from w-100 m-auto">
                            <h3 class="mb-3 text-center">Sign in</h3>
                            @include('admin.alerts.alert')
                            <form class="mt-4" action="{{route('admin.login')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control mb-0" id="exampleInputEmail2" placeholder="Enter email" autocomplete="off" required>
                                    @error('email')<span class="small text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control mb-0" id="exampleInputPassword2" placeholder="Password" required>
                                    @error('password')<span class="small text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="sign-info">
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                    <div class="custom-control custom-checkbox d-inline-block">
                                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign in END -->
        <!-- color-customizer -->
    </div>
</section>
<!-- Sign in END -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('admin/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/js/popper.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- Appear JavaScript -->
<script src="{{asset('admin/js/jquery.appear.js')}}"></script>
<!-- Countdown JavaScript -->
<script src="{{asset('admin/js/countdown.min.js')}}"></script>
<!-- Select2 JavaScript -->
<script src="{{asset('admin/js/select2.min.js')}}"></script>
<!-- Counterup JavaScript -->
<script src="{{asset('admin/js/waypoints.min.js')}}"></script>
<script src="{{asset('admin/js/jquery.counterup.min.js')}}"></script>
<!-- Wow JavaScript -->
<script src="{{asset('admin/js/wow.min.js')}}"></script>
<!-- Slick JavaScript -->
<script src="{{asset('admin/js/slick.min.js')}}"></script>
<!-- Owl Carousel JavaScript -->
<script src="{{asset('admin/js/owl.carousel.min.js')}}"></script>
<!-- Magnific Popup JavaScript -->
<script src="{{asset('admin/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Smooth Scrollbar JavaScript -->
<script src="{{asset('admin/js/smooth-scrollbar.js')}}"></script>
<!-- apex Custom JavaScript -->
<script src="{{asset('admin/js/apexcharts.js')}}"></script>
<!-- Chart Custom JavaScript -->
<script src="{{asset('admin/js/chart-custom.js')}}"></script>
<!-- Custom JavaScript -->
<script src="{{asset('admin/js/custom.js')}}"></script>
</body>
</html>
