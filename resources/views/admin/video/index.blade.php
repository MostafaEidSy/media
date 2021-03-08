@extends('admin.layouts.dashboard')

@section('title', 'Videos')

@section('style')
    <link rel="stylesheet" href="{{asset('site/css/sweetalert2.min.css')}}">
@endsection

@section('videos')
    class="active active-menu"
@endsection

@section('videoShow', 'show')

@section('videoList')
    class="active"
@endsection

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        @include('admin.alerts.alert')
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Videos Lists</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <a href="{{route('admin.video.create')}}" class="btn btn-primary">Add Video</a>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-view">
                                <table class="data-tables table movie_table " style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Video</th>
                                        <th>Quality</th>
                                        <th>Category</th>
                                        <th>Release Year</th>
                                        <th>Language</th>
                                        <th>In Home</th>
                                        <th style="width: 20%;">Description</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($videos as $video)
                                            <tr>
                                                <td>
                                                    <div class="media align-items-center">
                                                        <div class="iq-movie">
                                                            <a href="javascript:void(0);"><img src="{{asset('uploads/images/video/' . $video->image)}}" class="img-border-radius avatar-40 img-fluid" alt=""></a>
                                                        </div>
                                                        <div class="media-body text-white text-left ml-3">
                                                            <p class="mb-0">{{$video->title}}</p>
                                                            <small>{{$video->duration}}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{$video->quality}}</td>
                                                <td>
                                                    @if($video->category_id != null || $video->category_id != '')
                                                        {{$video->category->name}}
                                                    @else
                                                        No Category
                                                    @endif
                                                </td>
                                                <td>{{$video->release}}</td>
                                                <td>{{$video->language}}</td>
                                                <td>
                                                    <div class="custom-control custom-switch" data-value="{{$video->inHome}}" data-id="{{$video->id}}">
                                                        <input type="checkbox" class="custom-control-input customSwitchClass" id="customSwitch{{$video->id}}" @if($video->inHome == 1) checked @endif name="featured">
                                                        <label class="custom-control-label" for="customSwitch{{$video->id}}"></label>
                                                    </div>
                                                </td>
                                                <td><p>{{$video->description}}</p></td>
                                                <td>
                                                    <div class="flex align-items-center list-user-action">
                                                        <a class="iq-bg-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="{{route('watch.video', $video->slug)}}"><i class="lar la-eye"></i></a>
                                                        <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('admin.video.edit', $video->id)}}"><i class="ri-pencil-line"></i></a>
                                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('admin.video.delete', $video->id)}}"><i class="ri-delete-bin-line"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('site/js/sweetalert2.all.min.js')}}"></script>
    <script>
        $(function () {
            $('.customSwitchClass').on('change', function () {
                if ($(this).parent().attr('data-value') === '1'){
                    var videoId = $(this).parent().attr('data-id');
                    $.ajax({
                        type: 'post',
                        url: '{{route('admin.video.in.home')}}',
                        data : {
                            '_token': "{{csrf_token()}}",
                            'id' : videoId,
                            'inHome' : 0
                        },
                        success: function (data) {
                            if(data.status === true){
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                })

                                Toast.fire({
                                    icon: 'success',
                                    title: 'In Home Video Updated successfully'
                                })
                            }
                            $(this).parent().attr('data-value', '0');
                        }, error: function (reject) {
                        }
                    });
                }else if($(this).parent().attr('data-value') === '0'){
                    var videoId = $(this).parent().attr('data-id');
                    $.ajax({
                        type: 'post',
                        url: '{{route('admin.video.in.home')}}',
                        data : {
                            '_token': "{{csrf_token()}}",
                            'id' : videoId,
                            'inHome' : 1
                        },
                        success: function (data) {
                            if(data.status === true){
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                })

                                Toast.fire({
                                    icon: 'success',
                                    title: 'In Home Video Updated successfully'
                                })
                            }
                            $(this).parent().attr('data-value', '1');
                        }, error: function (reject) {
                        }
                    });
                }
            });
        });
    </script>
@endsection
