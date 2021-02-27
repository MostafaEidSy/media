@extends('admin.layouts.dashboard')

@section('title', 'Account Setting')

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @include('admin.alerts.alert')
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Social Media</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="acc-edit">
                                <form method="post" action="{{route('admin.edit.update.setting')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="facebook">Facebook:</label>
                                        <input type="text" class="form-control" id="facebook" name="facebook" value="{{old('facebook', $admin->facebook)}}">
                                        @error('facebook')<span class="small text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter">Twitter:</label>
                                        <input type="text" class="form-control" id="twitter" name="twitter" value="{{old('twitter', $admin->twitter)}}">
                                        @error('facebook')<span class="small text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="google">Google +:</label>
                                        <input type="text" class="form-control" id="google" name="google_plus" value="{{old('google', $admin->google_plus)}}">
                                        @error('facebook')<span class="small text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="instagram">Instagram:</label>
                                        <input type="text" class="form-control" id="instagram" name="instagram" value="{{old('instagram', $admin->instagram)}}">
                                        @error('facebook')<span class="small text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="youtube">You Tube:</label>
                                        <input type="text" class="form-control" id="youtube" name="youtube" value="{{old('youtube', $admin->youtube)}}">
                                        @error('facebook')<span class="small text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
