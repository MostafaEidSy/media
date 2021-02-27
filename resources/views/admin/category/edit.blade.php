@extends('admin.layouts.dashboard')

@section('title', 'Edit Category')

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
                                <h4 class="card-title">Edit Category</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{route('admin.category.update', $category->id)}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$category->id}}">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name', $category->name)}}">
                                            @error('name')<span class="small text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Slug" name="slug" value="{{old('slug', $category->slug)}}">
                                            @error('slug')<span class="small text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <textarea id="text" name="description" rows="5" class="form-control" placeholder="Description">{{old('description', $category->description)}}</textarea>
                                            @error('description')<span class="small text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group radio-box">
                                            <label>Status</label>
                                            <div class="radio-btn">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadio6" value="1" name="status" class="custom-control-input" @if($category->status == 1) checked @endif>
                                                    <label class="custom-control-label" for="customRadio6">enable</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadio7" value="0" name="status" class="custom-control-input" @if($category->status == 0) checked @endif>
                                                    <label class="custom-control-label" for="customRadio7">disable </label>
                                                </div>
                                            </div>
                                            @error('status')<span class="small text-danger">{{$message}}</span>@enderror
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
