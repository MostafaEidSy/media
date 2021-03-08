@extends('site.layouts.site')

@section('title')
    Watch {{$show->title}}
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('site/css/watch-show.css')}}">
    <style>
        .title-audio, .title-document{
            margin: 20px 0;
            text-align: center;
            font-size: 26px;
            border: 1px solid #999;
            padding: 15px;
            border-radius: 30px;
            background-color: #191919;
            box-shadow: 1px 1px 5px #444;
        }
    </style>
@endsection

@section('content')
    <div class="video-container iq-main-slider" style="padding-top: 70px; height: auto!important;">
        <div id="iframe"></div>
    </div>
    <div class="main-content">
        <section class="movie-detail container-fluid">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="showContent-tab" data-toggle="tab" href="#showContent" role="tab" aria-controls="showContent" aria-selected="true">Show Content</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="videoContent-tab" data-toggle="tab" href="#videoContent" role="tab" aria-controls="videoContent" aria-selected="false">Video Content</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="comments-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="comments" aria-selected="false">Comments</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="showContent" role="tabpanel" aria-labelledby="showContent-tab">
                    <div class="show-content">
                        <div class="accordion" id="accordionExample">
                            @foreach($show->seasons as $season)
                                <div class="card">
                                    <div class="card-header" id="heading{{$season->id}}">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$season->id}}" aria-expanded="true" aria-controls="collapse{{$season->id}}">
                                                <span class="d-block">Section {{$loop->iteration}}: {{$season->name}}</span>
                                                <span class="d-block small">{{count($season->showVideo)}} Videos</span>
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapse{{$season->id}}" class="collapse" aria-labelledby="heading{{$season->id}}" data-parent="#accordionExample">
                                        <div class="card-body">
                                            @foreach($season->showVideo as $videos)
                                                <a href="#" class="d-block">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <div class="img-video">
                                                                <img src="{{asset('uploads/images/video/' . $videos->video->image)}}" alt="{{$videos->video->title}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-11">
                                                            <div class="video-info">
                                                                <div class="video-name">{{$videos->video->title}}</div>
                                                                <div class="video-duration"><i class="ri-play-circle-fill"></i> {{$videos->video->duration}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="videoContent" role="tabpanel" aria-labelledby="videoContent-tab">
                    <div class="video-content">
                    @if(!isset($video))
                        {{$show->seasons[0]->showVideo[0]->video->content}}
                        @if($show->seasons[0]->showVideo[0]->video->audios != null)
                            <h6 class="title-audio">Attached Audios</h6>
                            @foreach($show->seasons[0]->showVideo[0]->video->audios as $audioFor)
                                <div class="content-audio" style="margin-bottom: 20px">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <audio controls style="width: 100%">
                                                <source src="{{asset('storage/uploads/audios/' . $audioFor->audios->audio_name)}}" type="audio/mpeg">
                                            </audio>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                                            <h6 class="audio-name">{{$audioFor->audios->name}}</h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if($show->seasons[0]->showVideo[0]->video->documents != null)
                            <h6 class="title-document">Attached Documents</h6>
                            @foreach($show->seasons[0]->showVideo[0]->video->documents as $documentFor)
                                <div class="content-document" style="margin-bottom: 20px">
                                    <iframe src="{{asset('storage/uploads/documents/' . $documentFor->document->document_name)}}" allowfullscreen style="width: 100%; height: 200px"></iframe>
                                </div>
                            @endforeach
                        @endif
                    @else
                        {{$vide->content}}
                    @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">...</div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{asset('site/js/xgp.js')}}"></script>
    @if(!isset($video))
        <script>
            let player = new Player({
                id: 'iframe',
                url: "{{asset('storage/uploads/videos/' . $show->seasons[0]->showVideo[0]->video->video)}}",
                fluid: true,
                poster: "{{asset('uploads/images/video/' . $show->seasons[0]->showVideo[0]->video->image)}}",
            });
        </script>
    @else
        <script>
            let player = new Player({
                id: 'iframe',
                url: "{{asset('storage/uploads/videos/' . $video->video)}}",
                fluid: true,
                poster: "{{asset('uploads/images/video/' .$video->image)}}",
            });
        </script>
    @endif
@endsection
