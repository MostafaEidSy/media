@extends('admin.layouts.dashboard')

@section('title', 'Edit Show')

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
                                <h4 class="card-title">Edit Show</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form action="{{route('admin.show.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$show->id}}">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="title" id="title" class="form-control" required="required" placeholder="Title" value="{{old('title', $show->title)}}">
                                        @error('title')<span class="small text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="language" id="language" class="form-control" required="required" placeholder="language" value="{{old('language', $show->language)}}">
                                        @error('title')<span class="small text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <select class="form-control" name="category" id="exampleFormControlSelect2">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" @if(old('category', $show->category_id) == $category->id) selected @endif>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category')<span class="small text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <select class="form-control" name="quality" id="exampleFormControlSelect3">
                                            <option selected disabled="">Choose quality</option>
                                            <option value="Full HD" @if($show->quality == 'Full HD') selected @endif>Full HD</option>
                                            <option value="HD" @if($show->quality == 'HD') selected @endif>HD</option>
                                        </select>
                                        @error('quality')<span class="small text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-md-6 form_gallery form-group">
                                        <label id="gallery2" for="form_gallery-upload">Upload Image</label>
                                        <input data-name="#gallery2" id="form_gallery-upload" name="image" class="form_gallery-upload" type="file" accept=".png, .jpg, .jpeg">
                                        @error('image')<span class="small text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-md-6 form_gallery form-group">
                                        <label id="gallery3" for="show2">Upload Show Banner</label>
                                        <input data-name="#gallery3" id="show2" name="banner" class="form_gallery-upload" type="file" accept=".png, .jpg, .jpeg">
                                        @error('banner')<span class="small text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-12 form-group">
                                        <textarea id="text1" name="description" rows="5" class="form-control" placeholder="Description">{{old('description', $show->description)}}</textarea>
                                        @error('description')<span class="small text-danger">{{$message}}</span>@enderror
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
