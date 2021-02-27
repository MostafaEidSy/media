@extends('site.layouts.site')

@section('title')
    {{$show->title}}
@endsection

@section('content')
    <!-- Banner Start -->
    <div class="video-container iq-main-slider">
{{--        <video class="video d-block" controls loop>--}}
{{--            <source src="{{asset('site/video/sample-video.mp4')}}" type="video/mp4">--}}
{{--        </video>--}}
        <img src="{{asset('uploads/images/show/' . $show->banner)}}">
        <a href="{{route('watch.show', $show->slug)}}" style="position: absolute; top: 50%; left: 50%; font-size: 80px; transform: translate(-50%, -50%); background-color: rgba(0,0,0,.7); display: inline-block; padding: 20px; border-radius: 50%;height: 166px;width: 166px; text-align: center"><i class="ri-play-circle-line"></i></a>
    </div>
    <!-- Banner End -->
    <!-- MainContent -->
    <div class="main-content">
        <section class="movie-detail container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending-info season-info g-border">
                        <h4 class="trending-text big-title text-uppercase mt-0">{{$show->title}}</h4>
                            <p class="trending-dec w-100 mb-0">{{$show->description}}</p>
                            <hr>
                            <p class="trending-dec w-100 mb-0">{{$show->content}}</p>
                        <ul class="list-inline p-0 mt-4 share-icons music-play-lists">
                            <li><span><i class="ri-heart-fill"></i></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
