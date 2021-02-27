@extends('admin.layouts.dashboard')

@section('title', 'Add Show')

@section('style')
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

@section('shows')
    class="active active-menu"
@endsection

@section('showsShow', 'show')

@section('showAdd')
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
                                <h4 class="card-title">Add Season</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form action="{{route('admin.show.season.story')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <input type="text" name="title" id="title" class="form-control" placeholder="Name" required="required" value="{{old('title')}}">
                                                @error('title')<span class="small text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="col-md-6 form_gallery form-group">
                                                <label id="gallery4" for="show3">Upload Image</label>
                                                <input data-name="#gallery4" id="show3" name="image" class="form_gallery-upload" type="file" accept=".png, .jpg, .jpeg">
                                                @error('image')<span class="small text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <select class="selectpicker" name="video[]" multiple="multiple" data-live-search="true" title="Please Choose At Least One Video" required="required">
                                                    @foreach($videos as $video)
                                                        <option value="{{$video->id}}">{{$video->title}}</option>
                                                    @endforeach
                                                </select>
                                                @error('video')<span class="small text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <select class="selectpicker" name="show" data-live-search="true" title="Please Choose a Show" required="required">
                                                    @foreach($shows as $show)
                                                        <option value="{{$show->id}}" @if(old('show') == $show->id) selected @endif>{{$show->title}}</option>
                                                    @endforeach
                                                </select>
                                                @error('show')<span class="small text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <input type="text" name="duration" class="form-control" placeholder="Running Time in Minutes" required="required" value="{{old('duration')}}">
                                                @error('duration')<span class="small text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <input class="form-control date-input basicFlatpickr" name="date_season" type="date" placeholder="Selete Date" required="required" value="{{old('date_season')}}">
                                                @error('date_season')<span class="small text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="col-12 form-group">
                                                <textarea id="text" name="description" rows="5" class="form-control" placeholder="Description">{{old('description')}}</textarea>
                                                @error('description')<span class="small text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-danger">cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('admin/js/bootstrap-select.min.js')}}"></script>
@endsection
