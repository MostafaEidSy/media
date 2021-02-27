<!doctype html>
<html lang="en-US">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}} | @yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('site/images/favicon.ico')}}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}" />
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{asset('site/css/typography.css')}}">
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}" />
    <!-- Responsive -->
    <link rel="stylesheet" href="{{asset('site/css/responsive.css')}}" />
    @yield('style')
</head>
<body>
<!-- loader Start -->
<div id="loading">
    <div id="loading-center">
    </div>
</div>
<!-- loader END -->
<!-- Header -->
<header id="main-header">
    <div class="main-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <a href="#" class="navbar-toggler c-toggler" data-toggle="collapse"
                           data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                           aria-expanded="false" aria-label="Toggle navigation">
                            <div class="navbar-toggler-icon" data-toggle="collapse">
                                <span class="navbar-menu-icon navbar-menu-icon--top"></span>
                                <span class="navbar-menu-icon navbar-menu-icon--middle"></span>
                                <span class="navbar-menu-icon navbar-menu-icon--bottom"></span>
                            </div>
                        </a>
                        <a class="navbar-brand" href="{{route('index')}}"> <img class="img-fluid logo" src="{{asset('site/images/logo.png')}}" alt="streamit" /> </a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="menu-main-menu-container">
                                <ul id="top-menu" class="navbar-nav ml-auto">
                                    <li class="menu-item">
                                        <a href="{{route('index')}}">Home</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="mobile-more-menu">
                            <a href="javascript:void(0);" class="more-toggle" id="dropdownMenuButton" data-toggle="more-toggle" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-more-line"></i>
                            </a>
                            <div class="more-menu" aria-labelledby="dropdownMenuButton">
                                <div class="navbar-right position-relative">
                                    <ul class="d-flex align-items-center justify-content-end list-inline m-0">
                                        <li>
                                            <a href="#" class="search-toggle">
                                                <i class="ri-search-line"></i>
                                            </a>
                                            <div class="search-box iq-search-bar">
                                                <form action="#" class="searchbox">
                                                    <div class="form-group position-relative">
                                                        <input type="text" class="text search-input font-size-12" placeholder="type here to search...">
                                                        <i class="search-link ri-search-line"></i>
                                                    </div>
                                                </form>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#" class="iq-user-dropdown search-toggle d-flex align-items-center">
                                                <img src="{{asset('site/images/user/user.jpg')}}" class="img-fluid avatar-40 rounded-circle" alt="user">
                                            </a>
                                            <div class="iq-sub-dropdown iq-user-dropdown">
                                                <div class="iq-card shadow-none m-0">
                                                    <div class="iq-card-body p-0 pl-3 pr-3">
                                                        <a href="#" class="iq-sub-card setting-dropdown">
                                                            <div class="media align-items-center">
                                                                <div class="right-icon">
                                                                    <i class="ri-file-user-line text-primary"></i>
                                                                </div>
                                                                <div class="media-body ml-3">
                                                                    <h6 class="mb-0 ">Manage Profile</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="iq-sub-card setting-dropdown">
                                                            <div class="media align-items-center">
                                                                <div class="right-icon">
                                                                    <i class="ri-settings-4-line text-primary"></i>
                                                                </div>
                                                                <div class="media-body ml-3">
                                                                    <h6 class="mb-0 ">Settings</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="iq-sub-card setting-dropdown">
                                                            <div class="media align-items-center">
                                                                <div class="right-icon">
                                                                    <i class="ri-settings-4-line text-primary"></i>
                                                                </div>
                                                                <div class="media-body ml-3">
                                                                    <h6 class="mb-0 ">Pricing Plan</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="iq-sub-card setting-dropdown">
                                                            <div class="media align-items-center">
                                                                <div class="right-icon">
                                                                    <i class="ri-logout-circle-line text-primary"></i>
                                                                </div>
                                                                <div class="media-body ml-3">
                                                                    <h6 class="mb-0">Logout</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-right menu-right">
                            <ul class="d-flex align-items-center list-inline m-0">
                                <li class="nav-item nav-icon">
                                    <a href="#" class="search-toggle device-search">
                                        <i class="ri-search-line"></i>
                                    </a>
                                    <div class="search-box iq-search-bar d-search">
                                        <form action="#" class="searchbox">
                                            <div class="form-group position-relative">
                                                <input type="text" class="text search-input font-size-12" placeholder="type here to search...">
                                                <i class="search-link ri-search-line"></i>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                @if(auth()->check())
                                    <li class="nav-item nav-icon">
                                        <a href="#" class="iq-user-dropdown search-toggle p-0 d-flex align-items-center" data-toggle="search-toggle">
                                            @if(auth()->user()->avatar != null || auth()->user()->avatar != '')
                                                <img src="{{asset('uploads/images/users/avatar/' . auth()->user()->avatar)}}" class="img-fluid avatar-40 rounded-circle" alt="{{auth()->user()->name}}">
                                            @else
                                                <img src="{{asset('uploads/images/users/avatar/user.png')}}" class="img-fluid avatar-40 rounded-circle" alt="{{auth()->user()->name}}">
                                            @endif
                                        </a>
                                        <div class="iq-sub-dropdown iq-user-dropdown">
                                            <div class="iq-card shadow-none m-0">
                                                <div class="iq-card-body p-0 pl-3 pr-3">
                                                    <a href="{{route('manage.profile')}}" class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="ri-file-user-line text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="mb-0 ">Manage Profile</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="{{route('manage.profile.setting')}}" class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="ri-settings-4-line text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="mb-0 ">Settings</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="{{route('pricing')}}" class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="ri-settings-4-line text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="mb-0 ">Pricing Plan</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="{{route('logout')}}" class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="ri-logout-circle-line text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="mb-0 ">Logout</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li class="nav-item nav-icon">
                                        <a href="{{route('getLogin')}}" style="font-size: 1.25rem;line-height: 1;background-color: transparent;border: 1px solid transparent;border-radius: .25rem;">
                                            <i class="ri-login-circle-line"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </nav>
                    <div class="nav-overlay"></div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
@yield('content')
<footer class="mb-0">
    <div class="container-fluid">
        <div class="block-space">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <ul class="f-link list-unstyled mb-0">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Movies</a></li>
                        <li><a href="#">Tv Shows</a></li>
                        <li><a href="#">Coporate Information</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4">
                    <ul class="f-link list-unstyled mb-0">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4">
                    <ul class="f-link list-unstyled mb-0">
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Cotact Us</a></li>
                        <li><a href="#">Legal Notice</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-12 r-mt-15">
                    <div class="d-flex">
                        <a href="#" class="s-icon">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="#" class="s-icon">
                            <i class="ri-skype-fill"></i>
                        </a>
                        <a href="#" class="s-icon">
                            <i class="ri-linkedin-fill"></i>
                        </a>
                        <a href="#" class="s-icon">
                            <i class="ri-whatsapp-fill"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright py-2">
        <div class="container-fluid">
            <p class="mb-0 text-center font-size-14 text-body">STREAMIT - 2020 All Rights Reserved</p>
        </div>
    </div>
</footer>
<!-- MainContent End-->
<!-- back-to-top -->
<div id="back-to-top">
    <a class="top" href="#top" id="top"> <i class="fa fa-angle-up"></i> </a>
</div>
<!-- back-to-top End -->
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
@yield('script')
</body>
</html>
