@extends('site.layouts.site')

@section('title', 'Manage Profile')

@section('style')
    <link rel="stylesheet" href="{{asset('site/css/sweetalert2.min.css')}}">
@endsection

@section('content')
    <section class="m-profile">
        <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
                <div class="col-lg-10">
                    <div class="sign-user_card">
                        <form action="{{route('manage.profile.update', auth()->user()->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="upload_profile d-inline-block">
                                        @if($user->avatar != null || $user->avatar != '')
                                            <img src="{{asset('uploads/images/users/avatar/' . $user->avatar)}}" class="profile-pic rounded-circle" width="135" height="135" alt="user">
                                        @else
                                            <img src="{{asset('uploads/images/users/avatar/user.png')}}" class="profile-pic rounded-circle img-fluid" alt="user">
                                        @endif
                                        <div class="p-image" style="top: 0;right: 0;bottom: 0;width: 100%;height: 100%;background: transparent">
                                            <input name="avatar" type="file" accept="image/*" style="width: 100%;height: 100%;cursor: pointer;border-radius: 50%;opacity: 0;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10 device-margin">
                                    <div class="profile-from">
                                        <h4 class="mb-3">Manage Profile</h4>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control mb-0" id="name" placeholder="Enter Your Name" autocomplete="off" required value="{{old('name', $user->name)}}">
                                            @error('name')<span class="small text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required value="{{old('email', $user->email)}}">
                                            @error('email')<span class="small text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">New Password</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="********" autocomplete="new-password">
                                            @error('password')<span class="small text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Date of Birth</label>
                                            <input type="date" name="date_of_birth" class="form-control date-input basicFlatpickr mb-0" placeholder="Select Date" id="date" value="{{old('date_of_birth', $user->date_of_birth)}}">
                                            @error('date_of_birth')<span class="small text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group d-flex flex-md-row flex-column">
                                            <div class="iq-custom-select d-inline-block manage-gen w-50">
                                                <select name="gender" class="form-control pro-dropdown">
                                                    <option value="Female" @if(old('gender', $user->gender == 'Female')) selected @endif>Female</option>
                                                    <option value="Male" @if(old('gender', $user->gender == 'Male')) selected @endif>Male</option>
                                                </select>
                                                @error('gender')<span class="small text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="iq-custom-select d-inline-block lang-dropdown manage-dd w-50 ml-1">
                                                <input type="text" name="language" id="language" class="form-control" value="{{old('name', $user->language)}}" placeholder="Language">
                                                @error('language')<span class="small text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="form-group d-flex flex-md-row flex-column">
                                            <div class="iq-custom-select d-inline-block manage-gen w-50">
                                                <input type="text" name="city" id="city" class="form-control" placeholder="City" value="{{old('city', $user->city)}}">
                                                @error('city')<span class="small text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="iq-custom-select d-inline-block lang-dropdown manage-dd w-50 ml-1">
                                                <input type="text" name="postal_code" id="postal_code" class="form-control" value="{{old('postal_code', $user->postal_code)}}" placeholder="Postal Code">
                                                @error('postal_code')<span class="small text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="{{old('address', $user->address)}}">
                                            @error('address')<span class="small text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="abstract">Abstract</label>
                                            <textarea name="abstract" id="abstract" class="form-control" style="height: 150px;resize: none;">{{old('abstract', $user->abstract)}}</textarea>
                                            @error('abstract')<span class="small text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="d-flex">
                                            <button type="submit" class="btn btn-hover">Save</button>
                                            <a href="{{route('index')}}" class="btn btn-link">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{asset('site/js/sweetalert2.all.min.js')}}"></script>
    @include('site.messages.success')
    @include('site.messages.danger')
@endsection
