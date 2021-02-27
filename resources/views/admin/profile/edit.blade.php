@extends('admin.layouts.dashboard')

@section('title', 'Edit Profile')

@section('content')
    <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12">
                   @include('admin.alerts.alert')
                  <div class="iq-card">
                     <div class="iq-card-body p-0">
                        <div class="iq-edit-list">
                           <ul class="iq-edit-profile d-flex nav nav-pills">
                              <li class="col-md-4 p-0">
                                 <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                    Personal Information
                                 </a>
                              </li>
                              <li class="col-md-4 p-0">
                                 <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                    Change Password
                                 </a>
                              </li>
                              <li class="col-md-4 p-0">
                                 <a class="nav-link" data-toggle="pill" href="#manage-contact">
                                    Manage Contact
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="iq-edit-list-data">
                     <div class="tab-content">
                        <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Personal Information</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <form action="{{route('admin.update.profile.info', $admin->id)}}" method="post" enctype="multipart/form-data">
                                     @csrf
                                    <div class="form-group row align-items-center">
                                       <div class="col-md-12">
                                          <div class="profile-img-edit">
                                              @if($admin->avatar == null || $admin->avatar == '')
                                                <img class="profile-pic" src="{{asset('admin/images/user/11.png')}}" alt="profile-pic">
                                              @else
                                                  <img class="profile-pic" src="{{asset('uploads/avatars/' . $admin->avatar)}}" alt="profile-pic">
                                              @endif
                                             <div class="p-image">
                                                <i class="ri-pencil-line upload-button"></i>
                                                <input class="file-upload" type="file" name="avatar" accept="image/*"/>
                                             </div>
                                              @error('avatar')<span class="small text-danger">{{$message}}</span>@enderror
                                          </div>
                                       </div>
                                    </div>
                                    <div class=" row align-items-center">
                                       <div class="form-group col-sm-6">
                                          <label for="first_name">First Name:</label>
                                          <input type="text" name="first_name" class="form-control" id="first_name" value="{{old('first_name', $admin->first_name)}}">
                                           @error('first_name')<span class="small text-danger">{{$message}}</span>@enderror
                                       </div>
                                       <div class="form-group col-sm-6">
                                          <label for="last_name">Last Name:</label>
                                          <input type="text" name="last_name" class="form-control" id="last_name" value="{{old('last_name', $admin->last_name)}}">
                                           @error('last_name')<span class="small text-danger">{{$message}}</span>@enderror
                                       </div>
                                       <div class="form-group col-sm-6">
                                          <label for="username">User Name:</label>
                                          <input type="text" name="username" class="form-control" id="username" value="{{old('username', $admin->username)}}">
                                           @error('username')<span class="small text-danger">{{$message}}</span>@enderror
                                       </div>
                                       <div class="form-group col-sm-6">
                                          <label for="cname">City:</label>
                                          <input type="text" name="city" class="form-control" id="cname" value="{{old('city', $admin->info->city)}}">
                                           @error('city')<span class="small text-danger">{{$message}}</span>@enderror
                                       </div>
                                       <div class="form-group col-sm-6">
                                          <label class="d-block">Gender:</label>
                                          <div class="custom-control custom-radio custom-control-inline">
                                             <input type="radio" id="customRadio6" name="gender" class="custom-control-input" value="Male" @if($admin->info->gender == 'Male') checked @endif>
                                             <label class="custom-control-label" for="customRadio6"> Male </label>
                                          </div>
                                          <div class="custom-control custom-radio custom-control-inline">
                                             <input type="radio" id="customRadio7" name="gender" class="custom-control-input" value="Female" @if($admin->info->gender == 'Female') checked @endif>
                                             <label class="custom-control-label" for="customRadio7"> Female </label>
                                          </div>
                                           @error('gender')<span class="small text-danger">{{$message}}</span>@enderror
                                       </div>
                                       <div class="form-group col-sm-6">
                                          <label for="date_of_birth">Date Of Birth:</label>
                                          <input class="form-control date-input basicFlatpickr" id="date_of_birth" name="date_of_birth" type="date" value="{{old('date_of_birth', $admin->info->date_of_birth)}}">
                                           @error('date_of_birth')<span class="small text-danger">{{$message}}</span>@enderror
                                       </div>
                                       <div class="form-group col-sm-6">
                                          <label>Marital Status:</label>
                                          <select class="form-control" id="exampleFormControlSelect1" name="marital_status">
                                             <option value="Single" @if($admin->info->marital_status == 'Single') selected @endif>Single</option>
                                             <option value="Married" @if($admin->info->marital_status == 'Married') selected @endif>Married</option>
                                             <option value="Widowed" @if($admin->info->marital_status == 'Widowed') selected @endif>Widowed</option>
                                             <option value="Divorced" @if($admin->info->marital_status == 'Divorced') selected @endif>Divorced</option>
                                             <option value="Separated" @if($admin->info->marital_status == 'Separated') selected @endif>Separated </option>
                                          </select>
                                           @error('marital_status')<span class="small text-danger">{{$message}}</span>@enderror
                                       </div>
                                       <div class="form-group col-sm-6">
                                          <label for="age">Age:</label>
                                          <input type="text" name="age" id="age" class="form-control" value="{{old('age', $admin->info->age)}}">
                                           @error('age')<span class="small text-danger">{{$message}}</span>@enderror
                                       </div>
                                       <div class="form-group col-sm-6">
                                          <label for="country">Country:</label>
                                          <input type="text" name="country" id="country" class="form-control" value="{{old('country', $admin->info->country)}}">
                                           @error('country')<span class="small text-danger">{{$message}}</span>@enderror
                                       </div>
                                       <div class="form-group col-sm-6">
                                          <label for="state">State:</label>
                                          <select class="form-control" id="exampleFormControlSelect4" name="state">
                                             <option value="California" @if($admin->info->state == 'California') selected @endif>California</option>
                                             <option value="Florida" @if($admin->info->state == 'Florida') selected @endif>Florida</option>
                                             <option value="Georgia" @if($admin->info->state == 'Georgia') selected @endif>Georgia</option>
                                             <option value="Connecticut" @if($admin->info->state == 'Connecticut') selected @endif>Connecticut</option>
                                             <option value="Louisiana" @if($admin->info->state == 'Louisiana') selected @endif>Louisiana</option>
                                          </select>
                                           @error('state')<span class="small text-danger">{{$message}}</span>@enderror
                                       </div>
                                       <div class="form-group col-sm-12">
                                          <label for="address">Address:</label>
                                          <textarea class="form-control" name="address" id="address" rows="5" style="line-height: 22px;">{{old('address', $admin->info->address)}}</textarea>
                                           @error('address')<span class="small text-danger">{{$message}}</span>@enderror
                                       </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Change Password</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <form method="post" action="{{route('admin.update.profile.pass', $admin->id)}}">
                                     @csrf
                                    <div class="form-group">
                                       <label for="new_password">New Password:</label>
                                       <input type="password" class="form-control" id="new_password" name="new_password">
                                        @error('new_password')<span class="small text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                       <label for="vre_password">Verify Password:</label>
                                       <input type="password" class="form-control" id="vre_password" name="vre_password">
                                        @error('vre_password')<span class="small text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Manage Contact</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <form action="{{route('admin.update.profile.con', $admin->id)}}" method="post">
                                     @csrf
                                    <div class="form-group">
                                       <label for="number">Contact Number:</label>
                                       <input type="text" class="form-control" name="number" id="number" value="{{old('number', $admin->info->number)}}">
                                        @error('number')<span class="small text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                       <label for="email">Email:</label>
                                       <input type="text" class="form-control" name="email" id="email" value="{{old('email', $admin->email)}}">
                                        @error('email')<span class="small text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                       <label for="url">Url:</label>
                                       <input type="text" class="form-control" id="url" name="url" value="{{old('url', $admin->info->url)}}">
                                        @error('url')<span class="small text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
@endsection
