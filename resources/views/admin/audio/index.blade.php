@extends('admin.layouts.dashboard')

@section('title', 'Audios')

@section('classAudio')
    class="active active-menu"
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
                                <h4 class="card-title">Audio Lists</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <a href="{{route('admin.audio.create')}}" class="btn btn-primary">Add Audio</a>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-view">
                                <table class="data-tables table movie_table" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th style="width: 5%;">ID</th>
                                        <th>Name</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($audios as $audio)
                                            <tr>
                                                <td>{{$audio->id}}</td>
                                                <td>{{$audio->name}}</td>
                                                <td>
                                                    <div class="flex align-items-center list-user-action">
                                                        <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('admin.audio.edit', $audio->id)}}"><i class="ri-pencil-line"></i></a>
                                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('admin.audio.delete', $audio->id)}}"><i class="ri-delete-bin-line"></i></a>
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
