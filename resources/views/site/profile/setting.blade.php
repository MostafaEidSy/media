@extends('site.layouts.site')

@section('title', 'Setting Profile')

@section('content')
    <section class="m-profile setting-wrapper">
        <div class="container">
            <h4 class="main-title mb-4">Account Setting</h4>
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <div class="sign-user_card text-center">
                        @if($user->avatar != null || $user->avatar != '')
                            <img src="{{asset('uploads/images/users/avatar/' . $user->avatar)}}" class="profile-pic rounded-circle" width="150" height="150" alt="user">
                        @else
                            <img src="{{asset('uploads/images/users/avatar/user.png')}}" class="profile-pic rounded-circle img-fluid" alt="user">
                        @endif
                        <h4 class="mb-3">{{$user->name}}</h4>
                        <p>{{$user->abstract}}</p>
                        <a href="{{route('manage.profile')}}" class="edit-icon text-primary">Edit</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="sign-user_card">
                        <h5 class="mb-3 pb-3 a-border">Personal Details</h5>
                        <div class="row align-items-center justify-content-between mb-3">
                            <div class="col-md-8">
                                <span class="text-light font-size-13">Email</span>
                                <p class="mb-0">{{$user->email}}</p>
                            </div>
                            <div class="col-md-4 text-md-right text-left">
                                <a href="{{route('manage.profile')}}" class="text-primary">Change</a>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-between mb-3">
                            <div class="col-md-8">
                                <span class="text-light font-size-13">Password</span>
                                <p class="mb-0">**********</p>
                            </div>
                            <div class="col-md-4 text-md-right text-left">
                                <a href="{{route('manage.profile')}}" class="text-primary">Change</a>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-between mb-3">
                            <div class="col-md-8">
                                <span class="text-light font-size-13">Date of Birth</span>
                                <p class="mb-0">{{$user->date_of_birth}}</p>
                            </div>
                            <div class="col-md-4 text-md-right text-left">
                                <a href="{{route('manage.profile')}}" class="text-primary">Change</a>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-between">
                            <div class="col-md-8">
                                <span class="text-light font-size-13">Language</span>
                                <p class="mb-0">{{$user->language}}</p>
                            </div>
                            <div class="col-md-4 text-md-right text-left">
                                <a href="{{route('manage.profile')}}" class="text-primary">Change</a>
                            </div>
                        </div>
                        <h5 class="mb-3 mt-4 pb-3 a-border">Billing Details</h5>
                        <div class="row justify-content-between mb-3">
                            <div class="col-md-8 r-mb-15">
                                <p>Your next billing date is 19 September 2020.</p>
                                <a href="#" class="btn btn-hover">Cancel Membership</a>
                            </div>
                            <div class="col-md-4 text-md-right text-left">
                                <a href="#" class="text-primary">Update Payment info</a>
                            </div>
                        </div>
                        <h5 class="mb-3 mt-4 pb-3 a-border">Plan Details</h5>
                        <div class="row justify-content-between mb-3">
                            <div class="col-md-8">
                                <p>Premium</p>
                            </div>
                            <div class="col-md-4 text-md-right text-left">
                                <a href="#" class="text-primary">Change Plan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
