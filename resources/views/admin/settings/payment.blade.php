@extends('admin.layouts.dashboard')

@section('title', 'Payment Gateways')

@section('settings')
    class="active active-menu"
@endsection

@section('showsSettings', 'show')

@section('showPayment')
    class="active"
@endsection

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            @include('admin.alerts.alert')
            <div class="alert alert-info" role="alert">
                Note: It May Take Some Time To Save The New Settings
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">PayPal</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{route('admin.settings.update.paypal')}}" method="post">
                                        @csrf
                                        <div class="custom-control custom-switch text-center">
                                            <input type="checkbox" class="custom-control-input" name="status_paypal" id="switch2" @if(env('PAYPAL_STATUS') == 1) checked @endif>
                                            <label class="custom-control-label" for="switch2">Status</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="client_id">Client ID</label>
                                            <input type="text" name="client_id" id="client_id" class="form-control" placeholder="PayPal Client ID" value="{{old('client_id', env('PAYPAL_ID'))}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="secret">Secret</label>
                                            <input type="text" name="secret" id="secret" class="form-control" placeholder="PayPal Secret" value="{{old('secret', env('PAYPAL_SECRET'))}}">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Stripe</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{route('admin.settings.update.stripe')}}" method="post">
                                        @csrf
                                        <div class="custom-control custom-switch text-center">
                                            <input type="checkbox" class="custom-control-input" name="status_stripe" id="switch1" @if(env('STRIPE_STATUS') == 1) checked @endif>
                                            <label class="custom-control-label" for="switch1">Status</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="publishable">Publishable Key</label>
                                            <input type="text" name="publishable" id="publishable" class="form-control" placeholder="Stripe Publishable Key" value="{{old('publishable', env('STRIPE_KEY'))}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="stripe_secret">Secret Key</label>
                                            <input type="text" name="stripe_secret" id="secret" class="form-control" placeholder="Stripe Secret Key" value="{{old('stripe_secret', env('STRIPE_SECRET'))}}">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Save</button>
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
