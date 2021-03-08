@extends('admin.layouts.dashboard')

@section('title', 'Add Videos')

@section('style')
    <link rel="stylesheet" href="{{asset('admin/css/summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap-select.min.css')}}">
    <style>
        .bootstrap-select{
            width: 100%!important;
        }
        .bootstrap-select .btn-light{
            font-size: 16px!important;
            border: 0!important;
            background-color: #141414!important;
            color: #D1D0CF!important;
            padding: 10px 20px!important;
        }
        .bootstrap-select .dropdown-menu{
            background-color: #141414!important;
            box-shadow: 1px 1px 5px #444;
        }
        .bootstrap-select .dropdown-menu .bs-searchbox input{
            background-color: #191919!important;
        }
        .bootstrap-select .dropdown-menu ul li a{
            color: #D1D0CF!important;
        }
    </style>
@endsection

@section('videos')
    class="active active-menu"
@endsection

@section('videoShow', 'show')

@section('videoAdd')
    class="active"
@endsection

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Add Video</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="{{route('admin.video.story')}}" class="form-info-video" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-12 form-group">
                                                        <input type="text" class="form-control" placeholder="Title" name="title" required="required" value="{{old('title')}}">
                                                        @error('title')<span class="small text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-12 form_gallery form-group">
                                                        <label id="gallery2" for="form_gallery-upload">Upload Image</label>
                                                        <input data-name="#gallery2" id="form_gallery-upload" class="form_gallery-upload" type="file" accept=".png, .jpg, .jpeg, .gif" name="image" required="required">
                                                        @error('image')<span class="small text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <select class="form-control" id="exampleFormControlSelect1" name="category">
                                                            <option value="">No Category</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}" @if(old('category') == $category->id) selected @endif>{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category')<span class="small text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <select class="form-control" id="exampleFormControlSelect2" name="quality" required="required">
                                                            <option disabled="">Choose quality</option>
                                                            <option value="FULL HD">FULL HD</option>
                                                            <option value="HD">HD</option>
                                                        </select>
                                                        @error('quality')<span class="small text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-12 form-group">
                                                        <textarea id="text" name="description" rows="5" class="form-control" placeholder="Description">{{old('description')}}</textarea>
                                                        @error('description')<span class="small text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-12 form-group">
                                                        <textarea id="content" name="content" rows="5" class="form-control" placeholder="Content">{{old('content')}}</textarea>
                                                        @error('content')<span class="small text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <input type="text" class="form-control" placeholder="Release year" name="release" required="required" value="{{old('release')}}">
                                                @error('release')<span class="small text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <input type="text" name="language" id="language" class="form-control" placeholder="Language" required="required" value="{{old('language')}}">
                                                @error('language')<span class="small text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <select name="audio[]" multiple class="selectpicker" title="Audios" data-live-search="true">
                                                    <option value="">No Audios</option>
                                                    @foreach($audios as $audio)
                                                        <option value="{{$audio->id}}">{{$audio->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('audio')<span class="small text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <select name="document[]" multiple class="selectpicker" title="Documents" data-live-search="true">
                                                    <option value="">No Document</option>
                                                    @foreach($documents as $document)
                                                        <option value="{{$document->id}}">{{$document->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('document')<span class="small text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="col-sm-12 form-group">
                                                <input type="text" class="form-control" placeholder="Video Duration" name="duration" required="required" value="{{old('duration')}}">
                                                @error('duration')<span class="small text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="col-sm-12 form-group">
                                                <input type="text" class="form-control" placeholder="Video Slug" name="slug" required="required" value="{{old('slug')}}">
                                                @error('slug')<span class="small text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="col-12 form-group">
                                                <button type="submit" class="btn btn-primary btn-submit-info" disabled="disabled">Submit</button>
                                                <button type="reset" class="btn btn-danger">cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <div class="drag-drop-area">
                                        <form action="{{route('admin.video.create.upload.video')}}" id="uploadVideo" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="d-block position-relative" style="height: 350px; overflow: hidden">
                                                <div class="form_video-upload">
                                                    <input type="file" accept="video/mp4,video/x-m4v,video/*" id="uploadFile" name="video">
                                                    <p>Upload video</p>
                                                </div>
                                                <div id="loader-icon" style="display: none;position: absolute; height: 100%;width: 100%;top: 0; left: 0; right: 0; z-index: 9999999">
                                                    <img src="{{asset('admin/images/loader.gif')}}" alt="loader">
                                                </div>
                                                <div id="loader-icon2" style="display: none;position: absolute; height: 100%;width: 100%;top: 0; left: 0; right: 0; z-index: 9999999; background-color: #141414; text-align: center">
                                                    <img width="300" height="300" src="{{asset('admin/images/complete.png')}}" alt="loader">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                @error('video_name')<span class="small text-danger">{{$message}}</span>@enderror
                                                <button type="submit" class="btn btn-block btn-primary btn-submit">Upload Video</button>
                                            </div>
                                            <div class="progress" style="display: none">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="text-align: right"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('admin/js/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.form.min.js')}}"></script>
    <script>
        $('#content').summernote({
            placeholder: 'Content',
            height: 200,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link', 'picture']],
            ]
        });
        $(document).ready(function(){
            $('#uploadVideo').submit(function(event){
                if($('#uploadFile').val())
                {
                    event.preventDefault();
                    $('.btn-submit').attr('disabled', 'disabled');
                    $('#loader-icon').show();
                    $('.progress').show();
                    $('.btn-submit-info').attr('disabled', 'disabled');
                    $('#targetLayer').hide();
                    $(this).ajaxSubmit({
                        target: '#targetLayer',
                        beforeSubmit:function(){
                            $('.progress-bar').width('50%');
                        },
                        uploadProgress: function(event, position, total, percentageComplete)
                        {
                            $('.progress-bar').animate({
                                width: percentageComplete + '%'
                            }, {
                                duration: 1000
                            });
                            $('.progress-bar').html(percentageComplete + '%');
                        },
                        success: function(data){
                            console.log('done');
                            if(data.status == true) {
                                $('.btn-submit-info').removeAttr('disabled');
                                $('.form-info-video').append("<input type='hidden' name='video_name' value='"+data.videoName+"'>");
                            }else if(data.status == false){
                                console.log('error');
                            }
                            $('#loader-icon').hide();
                            $('#targetLayer').show();
                        },
                        complete: function(xhr){
                            console.log(xhr);
                            $('.btn-submit-info').removeAttr('disabled');
                            $('.form-info-video').append("<input type='hidden' name='video_name' value='"+xhr.responseJSON.videoName+"'>");
                            $('#loader-icon').hide();
                            $('#loader-icon2').show();
                            $('#targetLayer').show();
                        },
                        resetForm: true
                    });
                }
                return false;
            });
        });
    </script>
@endsection
