@extends('admin.layouts.dashboard')

@section('title', 'Categories')

@section('categories')
    class="active active-menu"
@endsection

@section('CategoryShow', 'show')

@section('classCategoryList')
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
                                <h4 class="card-title">Category Lists</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <a href="{{route('admin.category.create')}}" class="btn btn-primary">Add Category</a>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            @include('admin.alerts.alert')
                            <div class="table-view">
                                <table class="data-tables table movie_table " style="width:100%">
                                    <thead>
                                    <tr>
                                        <th style="width:5%;">No</th>
                                        <th style="width:20%;">Name</th>
                                        <th style="width:40%;">Description</th>
                                        <th style="width:10%;">Videos</th>
                                        <th style="width:5%;">Status</th>
                                        <th style="width:20%;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td>{{$category->name}}</td>
                                                <td><p>{{$category->description}}</p></td>
                                                <td>20</td>
                                                <td>
                                                    <div class="flex align-items-center list-user-action">
                                                        @if($category->status == 1)
                                                            <span class="iq-bg-success" data-toggle="tooltip" data-placement="top" title="Active" data-original-title="Active"><i class="las la-check"></i></span>
                                                        @else
                                                            <span class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="UnActive" data-original-title="UnActive"><i class="las la-times"></i></span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex align-items-center list-user-action">
                                                        <a class="iq-bg-warning" data-toggle="tooltip" data-placement="top" title="View" data-original-title="View" href="#"><i class="lar la-eye"></i></a>
                                                        <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title="Edit" data-original-title="Edit" href="{{route('admin.category.edit', $category->id)}}"><i class="ri-pencil-line"></i></a>
                                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete" href="{{route('admin.category.delete', $category->id)}}"><i class="ri-delete-bin-line"></i></a>
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
