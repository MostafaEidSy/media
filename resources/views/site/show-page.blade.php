@extends('site.layouts.site')

@section('title')
    {{$page->name}}
@endsection

@section('content')
    <section class="page">
        <div class="title">
            <h2>{{$page->name}}</h2>
        </div>
        <div class="content">
            {{$page->content}}
        </div>
    </section>
@endsection
