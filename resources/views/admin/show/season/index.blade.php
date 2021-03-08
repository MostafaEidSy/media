@extends('admin.layouts.dashboard')

@section('title', 'Seasons')

@section('shows')
    class="active active-menu"
@endsection

@section('showsShow', 'show')

@section('seasonList')
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
                                <h4 class="card-title">Seasons Lists</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <a href="{{route('admin.show.season.create')}}" class="btn btn-primary">Add Season</a>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            @include('admin.alerts.alert')
                            <div class="table-view">
                                <table class="data-tables table movie_table " style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Season</th>
                                        <th>Date</th>
                                        <th>Show</th>
                                        <th>Videos</th>
                                        <th style="width:20%">Description</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($seasons as $season)
                                            <tr>
                                                <td>
                                                    <div class="media align-items-center">
                                                        <div class="iq-movie">
                                                            <a href="javascript:void(0);"><img src="{{asset('uploads/images/show/' . $season->image)}}" class="img-border-radius avatar-40 img-fluid" alt=""></a>
                                                        </div>
                                                        <div class="media-body text-white text-left ml-3">
                                                            <p class="mb-0">{{$season->name}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{$season->date_season}}</td>
                                                <td>{{$season->show->title}}</td>
                                                <td>
                                                    @if($season->videos != null)
                                                        {{count($season->videos)}} Videos
                                                    @else
                                                        0 Videos
                                                    @endif
                                                </td>
                                                <td><p>{{$season->description}}</p></td>
                                                <td>
                                                    <div class="flex align-items-center list-user-action">
                                                        <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('admin.show.season.edit', $season->id)}}"><i class="ri-pencil-line"></i></a>
                                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('admin.show.season.delete', $season->id)}}"><i class="ri-delete-bin-line"></i></a>
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
