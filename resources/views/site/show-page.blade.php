@extends('site.layouts.site')

@section('title')
    {{$page->name}}
@endsection

@section('style')
    <style>
        footer{
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
        }
    </style>
@endsection

@section('content')
    <section class="page" style="padding: 100px 0 150px">
        <div class="container">
            <div class="title">
                <h2 class="text-center">{{$page->name}}</h2>
            </div>
            <div class="content">
                {!! $page->content !!}
            </div>
        </div>
    </section>
@endsection
