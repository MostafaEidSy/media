@extends('admin.layouts.dashboard')

@section('title', 'Edit Video')

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
                                <h4 class="card-title">Edit Video</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="{{route('admin.video.update')}}" class="form-info-video" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$video->id}}">
                                        <input type="hidden" name="video_name" id="video_name" value="{{$video->video}}">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-12 form-group">
                                                        <input type="text" class="form-control" placeholder="Title" name="title" required="required" value="{{old('title', $video->title)}}">
                                                        @error('title')<span class="small text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-12 form_gallery form-group">
                                                        <label id="gallery2" for="form_gallery-upload">Upload Image</label>
                                                        <input data-name="#gallery2" id="form_gallery-upload" class="form_gallery-upload" type="file" accept=".png, .jpg, .jpeg, .gif" name="image" value="{{old($video->image)}}">
                                                        @error('image')<span class="small text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <select class="form-control" id="exampleFormControlSelect1" name="category">
                                                            <option value="">No Category</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}" @if(old('category', $video->category_id) == $category->id) selected @endif>{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category')<span class="small text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <select class="form-control" id="exampleFormControlSelect2" name="quality" required="required">
                                                            <option disabled="">Choose quality</option>
                                                            <option value="FULL HD" @if($video->quality == 'FULL HD') selected @endif>FULL HD</option>
                                                            <option value="HD" @if($video->quality == 'HD') selected @endif>HD</option>
                                                        </select>
                                                        @error('quality')<span class="small text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-12 form-group">
                                                        <textarea id="text" name="description" rows="5" class="form-control" placeholder="Description">{{old('description', $video->description)}}</textarea>
                                                        @error('description')<span class="small text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <input type="text" class="form-control" placeholder="Release year" name="release" required="required" value="{{old('release', $video->release)}}">
                                                @error('release')<span class="small text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <input type="text" name="language" id="language" class="form-control" placeholder="Language" required="required" value="{{old('language', $video->language)}}">
                                                @error('language')<span class="small text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="col-sm-12 form-group">
                                                <input type="text" class="form-control" placeholder="Video Duration" name="duration" required="required" value="{{old('duration', $video->duration)}}">
                                                @error('duration')<span class="small text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="col-12 form-group ">
                                                <button type="submit" class="btn btn-primary btn-submit-info">Submit</button>
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
    <script src="{{asset('admin/js/jquery.form.min.js')}}"></script>
    <script>
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

                        },
                        complete: function(xhr){
                            console.log(xhr);
                            $('.btn-submit-info').removeAttr('disabled');
                            $('#video_name').attr('value', xhr.responseJSON.videoName);
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
