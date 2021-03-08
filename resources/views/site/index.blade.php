@extends('site.layouts.site')

@section('title', 'Home Page')

@section('style')
    <link rel="stylesheet" href="{{asset('site/css/sweetalert2.min.css')}}">
@endsection

@section('content')
    <!-- Slider Start -->
    <section id="home" class="iq-main-slider p-0">
        <div id="home-slider" class="slider m-0 p-0">
            @foreach($shows as $show)
                <div class="slide slick-bg s-bg-1" style="background-image: url('{{asset('uploads/images/show/' . $show->banner)}}')!important;">
                    <div class="container-fluid position-relative h-100">
                        <div class="slider-inner h-100">
                            <div class="row align-items-center  h-100">
                                <div class="col-xl-6 col-lg-12 col-md-12">
                                    <a href="javascript:void(0);">
                                        <div class="channel-logo" data-animation-in="fadeInLeft" data-delay-in="0.5">
                                            <img src="{{asset('site/images/logo.png')}}" class="c-logo" alt="streamit">
                                        </div>
                                    </a>
                                    <h1 class="slider-text big-title title text-uppercase" data-animation-in="fadeInLeft" data-delay-in="0.6">{{$show->title}}</h1>
                                    <div class="d-flex align-items-center" data-animation-in="fadeInUp" data-delay-in="1">
                                        <span>{{count($show->seasons)}} Seasons</span>
                                        <span class="ml-3">{{$show->duration}}</span>
                                    </div>
                                    <p data-animation-in="fadeInUp" data-delay-in="1.2">{{$show->description}}</p>
                                    <div class="d-flex align-items-center r-mb-23" data-animation-in="fadeInUp" data-delay-in="1.2">
                                        <a href="{{route('show.details', $show->slug)}}" class="btn btn-hover"><i class="fa fa-play mr-2" aria-hidden="true"></i>Play Now</a>
                                        <a href="{{route('show.details', $show->slug)}}" class="btn btn-link">More details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" width="44px" height="44px" id="circle" fill="none" stroke="currentColor">
                <circle r="20" cy="22" cx="22" id="test"></circle>
            </symbol>
        </svg>
    </section>
    <!-- Slider End -->
    <!-- MainContent -->
    <div class="main-content">
        @if(auth('web')->check() && $fav != null && $fav->favVideos != null)
            <section id="iq-favorites">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 overflow-hidden">
                            <div class="iq-main-header d-flex align-items-center justify-content-between">
                                <h4 class="main-title"><a href="#">Your Favorites</a></h4>
                            </div>
                            <div class="favorites-contens">
                                <ul class="favorites-slider list-inline  row p-0 mb-0">
                                    @foreach($fav->favVideos as $video)
                                        <li class="slide-item">
                                            <a href="#">
                                                <div class="block-images position-relative">
                                                    <div class="img-box">
                                                        <img src="{{asset('uploads/images/video/' . $video->image)}}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="block-description">
                                                        <h6>{{$video->title}}</h6>
                                                        <div class="movie-time d-flex align-items-center my-2">
                                                            <div class="badge badge-secondary p-1 mr-2">13+</div>
                                                            <span class="text-white">{{$video->duration}}</span>
                                                        </div>
                                                        <div class="hover-buttons">
                                                              <span class="btn btn-hover">
                                                                  <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                                                  Play Now
                                                              </span>
                                                        </div>
                                                    </div>
                                                    <div class="block-social-info">
                                                        <ul class="list-inline p-0 m-0 music-play-lists">
                                                            <li><a href="{{route('add.favorites', $video->id)}}" style="display: inline-block; width: 100%;"><span><i class="ri-heart-line"></i></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <section id="iq-upcoming-movie">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <h4 class="main-title"><a href="#">Videos</a></h4>
                        </div>
                        <div class="upcoming-contens">
                            <ul class="favorites-slider list-inline row p-0 mb-0">
                                @foreach($videos as $video)
                                    <li class="slide-item">
                                        <a href="{{route('watch.video', $video->slug)}}">
                                            <div class="block-images position-relative">
                                                <div class="img-box">
                                                    <img src="{{asset('uploads/images/video/' . $video->image)}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="block-description">
                                                    <h6>{{$video->title}}</h6>
                                                    <div class="movie-time d-flex align-items-center my-2">
                                                        <span class="text-white">{{$video->duration}}</span>
                                                    </div>
                                                    <div class="hover-buttons">
                                                      <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                                        Play Now
                                                      </span>
                                                    </div>
                                                </div>
                                                <div class="block-social-info">
                                                    <ul class="list-inline p-0 m-0 music-play-lists">
                                                        @if(auth()->check())
                                                        <li><a href="{{route('add.favorites', $video->id)}}" style="display: inline-block; width: 100%"><span class="add-favorite"><i class="ri-heart-fill"></i></span></a></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="iq-upcoming-movie">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 overflow-hidden">
                            <div class="iq-main-header d-flex align-items-center justify-content-between">
                                <h4 class="main-title"><a href="#">Shows</a></h4>
                            </div>
                            <div class="upcoming-contens">
                                <ul class="favorites-slider list-inline row p-0 mb-0">
                                    @foreach($shows as $show)
                                        <li class="slide-item">
                                            <a href="{{route('show.details', $show->slug)}}">
                                                <div class="block-images position-relative">
                                                    <div class="img-box">
                                                        <img src="{{asset('uploads/images/show/' . $show->image)}}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="block-description">
                                                        <h6>{{$show->title}}</h6>
                                                        <div class="movie-time d-flex align-items-center my-2">
                                                            <span class="text-white">{{count($show->seasons)}} Seasons</span>
                                                        </div>
                                                        <div class="hover-buttons">
                                                      <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                                      Play Now
                                                      </span>
                                                        </div>
                                                    </div>
                                                    <div class="block-social-info">
                                                        <ul class="list-inline p-0 m-0 music-play-lists">
                                                        </ul>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection

@section('script')
    @if(auth()->check())
        <script src="{{asset('site/js/sweetalert2.all.min.js')}}"></script>
        @include('site.messages.success')
        @include('site.messages.danger')
    @endif
@endsection
