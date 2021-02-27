@extends('admin.layouts.dashboard')

@section('title', 'File Manager')

@section('style')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link href="{{ asset('vendor/file-manager/css/file-manager.css') }}" rel="stylesheet">
@endsection

@section('fileManager')
    class="active"
@endsection

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" id="fm-main-block">
                    <div id="fm"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // set fm height
            document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');

            // Add callback to file manager
            fm.$store.commit('fm/setFileCallBack', function(fileUrl) {
                window.opener.fmSetLink(fileUrl);
                window.close();
            });
        });
    </script>
@endsection
