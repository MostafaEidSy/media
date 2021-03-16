@extends('admin.layouts.dashboard')

@section('title', 'Create Plan')

@section('style')
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap-select.min.css')}}">
    <style>
        .modal-backdrop.show{
            display: none !important;
        }
        .bootstrap-select{
            width: 100%!important;
        }
        .bootstrap-select .btn-light{
            font-size: 16px!important;
            border: 0!important;
            background-color: #141414!important;
            color: #D1D0CF!important;
            padding: 10px 20px!important;
        }
        .bootstrap-select .dropdown-menu{
            background-color: #141414!important;
            box-shadow: 1px 1px 5px #444;
        }
        .bootstrap-select .dropdown-menu .bs-searchbox input{
            background-color: #191919!important;
        }
        .bootstrap-select .dropdown-menu ul li a{
            color: #D1D0CF!important;
        }
    </style>
@endsection

@section('classPlan')
    class="active active-menu"
@endsection

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Add Plan</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{route('admin.plan.story')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name" name="name" required="required" value="{{old('name')}}">
                                            @error('name')<span class="small text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <textarea name="description" id="description" required="required" placeholder="Description" class="form-control">{{old('description')}}</textarea>
                                            @error('description')<span class="small text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Subscription Id ( PayPal )" name="paypal_id" required="required" value="{{old('paypal_id')}}">
                                            @error('paypal_id')<span class="small text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="number" name="price" id="price" class="form-control" required="required" placeholder="Price" value="{{old('price')}}">
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="currency" class="selectpicker" id="currency" required="required" title="Currency">
                                                        <option value="AUD">Australian dollar</option>
                                                        <option value="BRL">Brazilian real</option>
                                                        <option value="CAD">Canadian dollar</option>
                                                        <option value="CNY">Chinese Renmenbi</option>
                                                        <option value="CZK">Czech koruna</option>
                                                        <option value="DKK">Danish krone</option>
                                                        <option value="EUR">Euro</option>
                                                        <option value="HKD">Hong Kong dollar</option>
                                                        <option value="HUF">Hungarian forint</option>
                                                        <option value="INR">Indian rupee</option>
                                                        <option value="ILS">Israeli new shekel</option>
                                                        <option value="JPY">Japanese yen</option>
                                                        <option value="MYR">Malaysian ringgit</option>
                                                        <option value="MXN">Mexican peso</option>
                                                        <option value="TWD">New Taiwan dollar</option>
                                                        <option value="NZD">New Zealand dollar</option>
                                                        <option value="NOK">Norwegian krone</option>
                                                        <option value="PHP">Philippine peso</option>
                                                        <option value="PLN">Polish złoty</option>
                                                        <option value="GBP">Pound sterling</option>
                                                        <option value="RUB">Russian ruble</option>
                                                        <option value="SGD">Singapore dollar</option>
                                                        <option value="SEK">Swedish krona</option>
                                                        <option value="CHF">Swiss franc</option>
                                                        <option value="THB">Thai baht</option>
                                                        <option value="USD">United States dollar</option>
                                                    </select>
                                                </div>
                                            </div>
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

@section('script')
    <script src="{{asset('admin/js/bootstrap-select.min.js')}}"></script>
@endsection
