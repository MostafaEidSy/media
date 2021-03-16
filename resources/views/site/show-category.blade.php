@extends('site.layouts.site')

@section('title')
    {{$category->name}}
@endsection

@section('content')
    <div class="single-category" style="padding: 100px 0 150px">
        <div class="container">
            <div class="title">
                <h3 class="text-center">{{$category->name}}</h3>
                <p>{{$category->description}}</p>
            </div>
            <div class="content">
                <section id="iq-upcoming-movie">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 overflow-hidden">
                                <div class="iq-main-header d-flex align-items-center justify-content-between">
                                    <h4 class="main-title"><a href="#">Videos</a></h4>
                                </div>
                                <div class="upcoming-contens">
                                    <ul class="favorites-slider list-inline row p-0 mb-0">
                                        @foreach($category->videos as $video)
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
                                        @foreach($category->shows as $show)
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
        </div>
    </div>
@endsection
