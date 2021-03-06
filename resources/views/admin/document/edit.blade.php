@extends('admin.layouts.dashboard')

@section('title', 'Edit Document')

@section('classDocuments')
    class="active active-menu"
@endsection

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Edit Document</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="{{route('admin.document.update')}}" method="post" class="form-info-document">
                                        @csrf
                                        <input type="hidden" name="document_name" value="{{$document->document_name}}" id="document_name">
                                        <input type="hidden" name="id" value="{{$document->id}}">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name', $document->name)}}">
                                            @error('name')<span class="small text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group ">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-danger">cancel</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <form action="{{route('admin.document.upload.document')}}" method="post" enctype="multipart/form-data" id="uploadDocument">
                                        @csrf
                                        <div class="d-block position-relative" style="height: 350px; overflow: hidden">
                                            <div class="form_video-upload">
                                                <input type="file" id="uploadFile" name="document">
                                                <p>Upload Document</p>
                                            </div>
                                            <div id="loader-icon" style="display: none;position: absolute; height: 100%;width: 100%;top: 0; left: 0; right: 0; z-index: 9999999">
                                                <img src="{{asset('admin/images/loader.gif')}}" alt="loader">
                                            </div>
                                            <div id="loader-icon2" style="display: none;position: absolute; height: 100%;width: 100%;top: 0; left: 0; right: 0; z-index: 9999999; background-color: #141414; text-align: center">
                                                <img width="300" height="300" src="{{asset('admin/images/complete.png')}}" alt="loader">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            @error('audio_name')<span class="small text-danger">{{$message}}</span>@enderror
                                            <button type="submit" class="btn btn-block btn-primary btn-submit">Upload Audio</button>
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
@endsection

@section('script')
    <script src="{{asset('admin/js/jquery.form.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#uploadDocument').submit(function(event){
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
                            $('.btn-submit-info').removeAttr('disabled');
                            $('#document_name').attr('value', xhr.responseJSON.documentName);
                            $('#loader-icon').hide();
                            $('#loader-icon2').show();
                            $('#targetLayer').show();
                            $('.progress-bar').removeClass('progress-bar-animated').removeClass('progress-bar-striped').css('background-color', '#06BF00');
                        },
                        resetForm: true
                    });
                }
                return false;
            });
        });
    </script>
@endsection
