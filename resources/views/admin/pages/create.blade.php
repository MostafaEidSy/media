@extends('admin.layouts.dashboard')

@section('title', 'Create Page')

@section('style')
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/summernote-bs4.min.css')}}">
    <style>
        .modal-backdrop.show{
            display: none !important;
        }
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

@section('classPages')
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
                                <h4 class="card-title">Add Page</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{route('admin.page.story')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name" name="name" required="required" value="{{old('name')}}">
                                            @error('name')<span class="small text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <textarea name="content" id="content">{{old('content')}}</textarea>
                                            @error('content')<span class="small text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" required="required" value="{{old('slug')}}">
                                            @error('slug')<span class="small text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <select name="in_footer" class="selectpicker" title="Show Place" required="required">
                                                <option value="0" @if(old('in_footer') == 0) selected @endif>Not Showing Off</option>
                                                <option value="1" @if(old('in_footer') == 1) selected @endif>Footer 1</option>
                                                <option value="2" @if(old('in_footer') == 2) selected @endif>Footer 2</option>
                                                <option value="3" @if(old('in_footer') == 3) selected @endif>Footer 3</option>
                                            </select>
                                            @error('in_footer')<span class="small text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group ">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-danger">cancel</button>
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
    <script src="{{asset('admin/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.form.min.js')}}"></script>
    <script src="{{asset('admin/js/summernote-bs4.min.js')}}"></script>
    <script>
        const FMButton = function(context) {
            const ui = $.summernote.ui;
            const button = ui.button({
                contents: '<i class="note-icon-picture"></i> ',
                tooltip: 'File Manager',
                click: function() {
                    window.open('/file-manager/summernote', 'fm', 'width=1400,height=800');
                }
            });
            return button.render();
        };
        function fmSetLink(url) {
            $('#content').summernote('insertImage', url);
        }
        $('#content').summernote({
            placeholder: 'Content',
            height: 600,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear', 'backcolor', 'forecolor']],
                ['font', ['strikethrough', 'superscript', 'subscript', 'fontsizeunit']],
                ['fontsize', ['fontsize', 'fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph', 'style']],
                ['height', ['height']],
                ['insert', ['link', 'table', 'hr', 'video']],
                ['fm-button', ['fm']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            buttons: {
                fm: FMButton
            }
        });
    </script>
@endsection
