<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{env('APP_NAME')}} | @yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('admin/images/favicon.ico')}}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
    <!--datatable CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/dataTables.bootstrap4.min.css')}}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/typography.css')}}">
    @yield('style')
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
<!-- Wrapper Start -->
<div class="wrapper">
    <!-- Sidebar-->
    <div class="iq-sidebar">
        <div class="iq-sidebar-logo d-flex justify-content-between">
            <a href="#" class="header-logo">
                <img src="{{asset('admin/images/logo.png')}}" class="img-fluid rounded-normal" alt="">
                <div class="logo-title">
                    <span class="text-primary text-uppercase">Streamit</span>
                </div>
            </a>
            <div class="iq-menu-bt-sidebar">
                <div class="iq-menu-bt align-self-center">
                    <div class="wrapper-menu">
                        <div class="main-circle"><i class="las la-bars"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sidebar-scrollbar">
            <nav class="iq-sidebar-menu">
                <ul id="iq-sidebar-toggle" class="iq-menu">
                    <li><a href="{{route('index')}}" class="text-primary" target="_blank"><i class="ri-arrow-right-line"></i><span>Visit site</span></a></li>
                    <li @yield('classDashboard')><a href="{{route('admin.index')}}" class="iq-waves-effect"><i class="las la-home iq-arrow-left"></i><span>Dashboard</span></a></li>
                    <li @yield('classRating')><a href="{{route('admin.rating.index')}}" class="iq-waves-effect"><i class="las la-star-half-alt"></i><span>Rating </span></a></li>
                    <li @yield('classComment')><a href="{{route('admin.comment.index')}}" class="iq-waves-effect"><i class="las la-comments"></i><span>Comment</span></a></li>
                    <li @yield('classUser')><a href="{{route('admin.users.index')}}" class="iq-waves-effect"><i class="las la-user-friends"></i><span>User</span></a></li>
                    <li @yield('classAudio')><a href="{{route('admin.audio.index')}}" class="iq-waves-effect"><i class="lar la-file-audio"></i><span>Audios</span></a></li>
                    <li @yield('classDocuments')><a href="{{route('admin.document.index')}}" class="iq-waves-effect"><i class="las la-file-pdf"></i><span>Documents</span></a></li>
                    <li @yield('classPages')><a href="{{route('admin.page.index')}}" class="iq-waves-effect"><i class="las la-file-contract"></i><span>Pages</span></a></li>
                    <li @yield('categories')>
                        <a href="#category" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-list-ul"></i><span>Category</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="category" class="iq-submenu collapse @yield('CategoryShow')" data-parent="#iq-sidebar-toggle">
                            <li @yield('classCategoryAdd')><a href="{{route('admin.category.create')}}"><i class="las la-user-plus"></i>Add Category</a></li>
                            <li @yield('classCategoryList')><a href="{{route('admin.category.index')}}"><i class="las la-eye"></i>Category List</a></li>
                        </ul>
                    </li>
                    <li @yield('videos')>
                        <a href="#movie" class="iq-waves-effect collapsed @yield('videoShow')" data-toggle="collapse" aria-expanded="false"><i class="las la-film"></i><span>Videos</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="movie" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            <li @yield('videoAdd')><a href="{{route('admin.video.create')}}"><i class="las la-user-plus"></i>Add Video</a></li>
                            <li @yield('videoList')><a href="{{route('admin.video.index')}}"><i class="las la-eye"></i>Videos List</a></li>
                        </ul>
                    </li>
                    <li @yield('shows')>
                        <a href="#show" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i
                                class="las la-film"></i><span>Show</span><i
                                class="ri-arrow-right-s-line iq-arrow-right"></i>
                        </a>
                        <ul id="show" class="iq-submenu collapse @yield('showsShow')" data-parent="#iq-sidebar-toggle">
                            <li @yield('showAdd')><a href="{{route('admin.show.create')}}"><i class="las la-user-plus"></i>Add Show</a></li>
                            <li @yield('showList')><a href="{{route('admin.show.index')}}"><i class="las la-eye"></i>Show List</a></li>
                            <li @yield('seasonList')><a href="{{route('admin.show.season.index')}}"><i class="las la-tasks"></i>Seasons List</a></li>
                        </ul>
                    </li>
{{--                    <li @yield('fileManager')><a href="{{route('admin.file.manager')}}" class="iq-waves-effect"><i class="las la-user-friends"></i><span>File Manager</span></a></li>--}}
                </ul>
            </nav>
        </div>
    </div>
    <!-- TOP Nav Bar -->
    <div class="iq-top-navbar">
        <div class="iq-navbar-custom">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <div class="iq-menu-bt d-flex align-items-center">
                    <div class="wrapper-menu">
                        <div class="main-circle"><i class="las la-bars"></i></div>
                    </div>
                    <div class="iq-navbar-logo d-flex justify-content-between">
                        <a href="#" class="header-logo">
                            <img src="{{asset('admin/images/logo.png')}}" class="img-fluid rounded-normal" alt="">
                            <div class="logo-title">
                                <span class="text-primary text-uppercase">Streamit</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="iq-search-bar ml-auto">
                    <form action="#" class="searchbox">
                        <input type="text" class="text search-input" placeholder="Search Here...">
                        <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                    </form>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                    <i class="ri-menu-3-line"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-list">
                        <li class="nav-item nav-icon search-content">
                            <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                                <i class="ri-search-line"></i>
                            </a>
                            <form action="#" class="search-box p-0">
                                <input type="text" class="text search-input" placeholder="Type here to search...">
                                <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                            </form>
                        </li>
                        <li class="nav-item nav-icon">
                            <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                                <i class="ri-notification-2-line"></i>
                                <span class="bg-primary dots"></span>
                            </a>
                            <div class="iq-sub-dropdown">
                                <div class="iq-card shadow-none m-0">
                                    <div class="iq-card-body p-0">
                                        <div class="bg-primary p-3">
                                            <h5 class="mb-0 text-white">All Notifications<small class="badge  badge-light float-right pt-1">4</small></h5>
                                        </div>
                                        <a href="#" class="iq-sub-card" >
                                            <div class="media align-items-center">
                                                <div class="">
                                                    <img class="avatar-40 rounded" src="{{asset('admin/images/user/01.jpg')}}" alt="">
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">Emma Watson Barry</h6>
                                                    <small class="float-right font-size-12">Just Now</small>
                                                    <p class="mb-0">95 MB</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="iq-sub-card" >
                                            <div class="media align-items-center">
                                                <div class="">
                                                    <img class="avatar-40 rounded" src="{{asset('admin/images/user/02.jpg')}}" alt="">
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">New customer is join</h6>
                                                    <small class="float-right font-size-12">5 days ago</small>
                                                    <p class="mb-0">Cyst Barry</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="iq-sub-card" >
                                            <div class="media align-items-center">
                                                <div class="">
                                                    <img class="avatar-40 rounded" src="{{asset('admin/images/user/03.jpg')}}" alt="">
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">Two customer is left</h6>
                                                    <small class="float-right font-size-12">2 days ago</small>
                                                    <p class="mb-0">Cyst Barry</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="iq-sub-card" >
                                            <div class="media align-items-center">
                                                <div class="">
                                                    <img class="avatar-40 rounded" src="{{asset('admin/images/user/04.jpg')}}" alt="">
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">New Mail from Fenny</h6>
                                                    <small class="float-right font-size-12">3 days ago</small>
                                                    <p class="mb-0">Cyst Barry</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item nav-icon dropdown">
                            <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                                <i class="ri-mail-line"></i>
                                <span class="bg-primary dots"></span>
                            </a>
                            <div class="iq-sub-dropdown">
                                <div class="iq-card shadow-none m-0">
                                    <div class="iq-card-body p-0 ">
                                        <div class="bg-primary p-3">
                                            <h5 class="mb-0 text-white">All Messages<small class="badge  badge-light float-right pt-1">5</small></h5>
                                        </div>
                                        <a href="#" class="iq-sub-card">
                                            <div class="media align-items-center">
                                                <div class="">
                                                    <img class="avatar-40 rounded" src="{{asset('admin/images/user/01.jpg')}}" alt="">
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">Barry Emma Watson</h6>
                                                    <small class="float-left font-size-12">13 Jun</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="iq-sub-card">
                                            <div class="media align-items-center">
                                                <div class="">
                                                    <img class="avatar-40 rounded" src="{{asset('admin/images/user/02.jpg')}}" alt="">
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">Lorem Ipsum Watson</h6>
                                                    <small class="float-left font-size-12">20 Apr</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="iq-sub-card">
                                            <div class="media align-items-center">
                                                <div class="">
                                                    <img class="avatar-40 rounded" src="{{asset('admin/images/user/03.jpg')}}" alt="">
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">Why do we use it?</h6>
                                                    <small class="float-left font-size-12">30 Jun</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="iq-sub-card">
                                            <div class="media align-items-center">
                                                <div class="">
                                                    <img class="avatar-40 rounded" src="{{asset('admin/images/user/04.jpg')}}" alt="">
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">Variations Passages</h6>
                                                    <small class="float-left font-size-12">12 Sep</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="iq-sub-card">
                                            <div class="media align-items-center">
                                                <div class="">
                                                    <img class="avatar-40 rounded" src="{{asset('admin/images/user/05.jpg')}}" alt="">
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">Lorem Ipsum generators</h6>
                                                    <small class="float-left font-size-12">5 Dec</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="line-height pt-3">
                            <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                                @if(auth()->user()->avatar == null || auth()->user()->avatar == '')
                                    <img src="{{asset('admin/images/user/1.jpg')}}" class="img-fluid rounded-circle mr-3" alt="user">
                                @else
                                    <img src="{{asset('uploads/avatars/' . auth()->user()->avatar)}}" class="img-fluid rounded-circle mr-3" alt="user">
                                @endif
                            </a>
                            <div class="iq-sub-dropdown iq-user-dropdown">
                                <div class="iq-card shadow-none m-0">
                                    <div class="iq-card-body p-0 ">
                                        <div class="bg-primary p-3">
                                            <h5 class="mb-0 text-white line-height">Hello {{auth()->user()->first_name}} {{auth()->user()->last_name}}</h5>
                                            <span class="text-white font-size-12">Available</span>
                                        </div>
                                        <a href="{{route('admin.edit.profile')}}" class="iq-sub-card iq-bg-primary-hover">
                                            <div class="media align-items-center">
                                                <div class="rounded iq-card-icon iq-bg-primary">
                                                    <i class="ri-profile-line"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">Edit Profile</h6>
                                                    <p class="mb-0 font-size-12">Modify your personal details.</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="{{route('admin.edit.setting')}}" class="iq-sub-card iq-bg-primary-hover">
                                            <div class="media align-items-center">
                                                <div class="rounded iq-card-icon iq-bg-primary">
                                                    <i class="ri-account-box-line"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">Account settings</h6>
                                                    <p class="mb-0 font-size-12">Manage your account parameters.</p>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="d-inline-block w-100 text-center p-3">
                                            <a class="bg-primary iq-sign-btn" href="#" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- TOP Nav Bar END -->
    <!-- Page Content  -->
    @yield('content')
</div>
<!-- Wrapper END -->
<!-- Footer -->
<footer class="iq-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                </ul>
            </div>
            <div class="col-lg-6 text-right">
                Copyright 2020 <a href="#">Streamit</a> All Rights Reserved.
            </div>
        </div>
    </div>
</footer>
<!-- Footer END -->
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
@yield('script')
</body>
</html>
