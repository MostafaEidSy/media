@extends('site.layouts.site')

@section('title')
    Watch {{$video->title}}
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('site/css/watch-show.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/watch-video.css')}}">
@endsection

@section('content')
    <div class="video-container iq-main-slider" style="padding-top: 70px; height: auto!important;">
        <div id="iframe"></div>
    </div>
    <div class="main-content">
        <section class="movie-detail container-fluid">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="videoContent-tab" data-toggle="tab" href="#videoContent" role="tab" aria-controls="videoContent" aria-selected="false">Video Content</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="comments-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="comments" aria-selected="false">Comments</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="videoContent" role="tabpanel" aria-labelledby="videoContent-tab">
                    <div class="video-content">
                        {!! $video->content !!}
                        @if($video->audios != null && $video->audios != '' && count($video->audios) > 0)
                            <h6 class="title-audio">Attached Audios</h6>
                            @foreach($video->audios as $audioFor)
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
                        @if($video->documents != null && $video->documents != '' && count($video->documents) > 0)
                            <h6 class="title-document">Attached Documents</h6>
                            @foreach($video->documents as $documentFor)
                                <div class="content-document" style="margin-bottom: 20px">
                                    <iframe src="{{asset('storage/uploads/documents/' . $documentFor->document->document_name)}}" allowfullscreen style="width: 100%; height: 200px"></iframe>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                    <div class="content-comments">
                        <div class="title-comments">
                            <h6>Comments</h6>
                        </div>
                        <div class="comments">
                            @foreach($video->comments as $comment)
                                <div class="media" data-comment-id="{{$comment->id}}">
                                    @if($comment->user->avatar != null || $comment->user->avatar != '')
                                        <img src="{{asset('uploads/avatars/' . $comment->user->avatar)}}" class="mr-3" alt="{{$comment->user->name}}">
                                    @else
                                        <img src="{{asset('uploads/avatars/user.png')}}" class="mr-3" alt="{{$comment->user->name}}">
                                    @endif
                                    <div class="media-body">
                                        <h5 class="mt-0 name first">{{$comment->user->name}}</h5>
                                        <p class="date">{{date("j F, Y", strtotime($comment->created_at))}} at {{date('g:i a', strtotime($comment->created_at))}}</p>
                                        <p class="comment">{{$comment->comment}}</p>
                                        <span class="reply" id="reply">Reply</span>
                                        @if($comment->childrens != null && $comment->childrens != '' && count($comment->childrens) > 0)
                                            @foreach($comment->childrens as $child)
                                                <div class="media mt-3">
                                                    <a class="mr-3" href="#">
                                                        @if($child->user->avatar != null || $child->user->avatar != '')
                                                            <img src="{{asset('uploads/avatars/' . $child->user->avatar)}}" class="mr-3" alt="{{$child->user->name}}">
                                                        @else
                                                            <img src="{{asset('uploads/avatars/user.png')}}" class="mr-3" alt="{{$child->user->name}}">
                                                        @endif
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="mt-0 name">{{$child->user->name}}</h5>
                                                        <p class="date">{{date("j F, Y", strtotime($child->created_at))}} at {{date('g:i a', strtotime($child->created_at))}}</p>
                                                        <p class="comment">{{$child->comment}}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="add-comment">
                            <div class="title">
                                <h6>Leave a Comment</h6>
                                <span>Your E-mail Address Will Not Be Published.</span>
                            </div>
                            <div class="body">
                                <form id="formComment" method="post" action="{{route('add.comment')}}">
                                    @csrf
                                    <input type="hidden" name="video_id" value="{{$video->id}}">
                                    <textarea name="comment" id="textComment" class="form-control"></textarea>
                                    <button type="submit" id="addComment" class="btn btn-danger">Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{asset('site/js/xgp.js')}}"></script>
    <script>
        let player = new Player({
            id: 'iframe',
            url: "{{asset('storage/uploads/videos/' . $video->video)}}",
            fluid: true,
            poster: "{{asset('uploads/images/video/' .$video->image)}}",
        });
    </script>
    <script>
        $('.reply').on('click', function () {
            var userName = $(this).parent().find('h5.first').text();
            $('.add-comment .title h6').html('Reply To '+userName + '<span class="cancel" id="cancel">Cancel</span>');
            var commentId = $(this).parent().parent().attr('data-comment-id');
            $('#formComment').append('<input type="hidden" id="parent_id" name="parent_id" value="'+ commentId +'">');
        });
        $(document).on('click', '#cancel', function () {
            $('.add-comment .title h6').html('Leave a Comment');
            $('#formComment #parent_id').remove();
        });
        $(document).on('click', '#addComment', function (e) {
            e.preventDefault();
            var formData = new FormData($('#formComment')[0]);
            $.ajax({
                type: 'post',
                url: "{{route('add.comment')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (data.status === true) {
                        $('#textComment').val('');
                        if (data.commentParent === 0) {
                            $('.content-comments .comments').append('<div class="media" data-comment-id="'+ data.id +'"><img src="'+ data.avatar +'" class="mr-3" alt="..."><div class="media-body"><h5 class="mt-0 name">' + data.name + '</h5><p class="date">' + data.date + '</p><p class="comment">' + data.comment + '</p><span class="reply" id="reply">Reply</span></div></div>');
                        }else if(data.commentParent === 1){
                            $('.media[data-comment-id="'+ data.parentComment +'"] .media-body:first').append('<div class="media mt-3"><img src="'+ data.avatar +'" class="mr-3" alt="..."><div class="media-body"><h5 class="mt-0 name">' + data.name + '</h5><p class="date">' + data.date + '</p><p class="comment">' + data.comment + '</p></div></div>');
                        }
                    }
                }, error: function (reject) {

                }
            });
        });
    </script>
@endsection
