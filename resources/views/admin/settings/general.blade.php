@extends('admin.layouts.dashboard')

@section('title', 'General Settings')

@section('style')
    <link rel="stylesheet" href="{{asset('admin/css/input-file.css')}}">
    <style>
        .inf__drop-area{
            width: 100%!important;
        }
        .logo-website, .icon-website{
            padding: 10px 20px;
            border: 1px dotted #999999;
            border-radius: 10px;
            display: inline-block;
            margin-bottom: 20px;
            background-color: #141414;
        }
        .logo-website img, .icon-website img{
            max-width: 200px;
        }
    </style>
@endsection

@section('settings')
    class="active active-menu"
@endsection

@section('showsSettings', 'show')

@section('showGeneral')
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
                                <h4 class="card-title">General Settings <span class="small">( Note: It May Take Some Time To Save The New Settings )</span></h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{route('admin.settings.update.general')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="site_name">Website Name</label>
                                            <input type="text" id="site_name" class="form-control" placeholder="Web Site Name" name="site_name" value="{{env('APP_NAME')}}" required="required">
                                            @error('site_name')<span class="small text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="website_link">Website link</label>
                                            <input type="text" id="website_link" class="form-control" placeholder="Website link" name="website_link" value="{{old('website_link', env('APP_URL'))}}" required="required">
                                            @error('website_link')<span class="small text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="website_logo" class="d-block">Website Logo</label>
                                            <div class="logo-website">
                                                <img src="{{asset('uploads/website/logo.png')}}" alt="Logo">
                                            </div>
                                            <input type="file" id="website_logo" name="website_logo">
                                            @error('website_logo')<span class="small text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="website_icon" class="d-block">Website Icon</label>
                                            <div class="icon-website">
                                                <img src="{{asset('uploads/website/icon.png')}}" alt="Icon">
                                            </div>
                                            <input type="file" id="website_icon" name="website_icon">
                                            @error('website_icon')<span class="small text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="website_loader" class="d-block">Website Loader</label>
                                            <div class="icon-website">
                                                <img src="{{asset('uploads/website/loader.gif')}}" alt="Loader">
                                            </div>
                                            <input type="file" id="website_loader" name="website_loader">
                                            @error('website_loader')<span class="small text-danger">{{$message}}</span>@enderror
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
    <script src="{{asset('admin/js/input-file.min.js')}}"></script>
    <script>
        new InputFile({
            buttonText: 'Choose files'
        });
    </script>
@endsection
