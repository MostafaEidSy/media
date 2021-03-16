@extends('site.layouts.site')

@section('title', 'Checkout')

@section('style')
    <style>
        .checkout{
            padding: 100px 0 150px;
        }
        .box-info{
            padding: 20px;
            background-color: #191919;
            border-radius: 20px;
        }
        .box-info h6{
            font-size: 30px;
            margin-bottom: 30px;
        }
        .box-info .info-plan{
            padding: 10px;
            background-color: #141414;
            border-radius: 10px;
            font-size: 20px;
        }
        .box-checkout{
            padding: 20px;
            background-color: #191919;
            border-radius: 20px;
        }
    </style>
@endsection

@section('content')
    <section class="checkout">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="box-info">
                        <h6>Order Details</h6>
                        <div class="info-plan">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="name">{{$plan->name}}</div>
                                </div>
                                <div class="col-md-3">
                                    <div class="price text-right">{{$plan->price}}/<sup>{{$plan->currency}}</sup></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-checkout">
                        <p class="summary mb-3" style="font-size: 28px">Summary</p>
                        <div class="info d-flex justify-content-between mb-2" style="border-bottom: 1px solid #999;padding: 10px 0;font-size: 20px;"><span class="s1 text-left">Original Price:</span><span class="s2">{{$plan->price}} {{$plan->currency}}</span></div>
                        <div class="total d-flex justify-content-between mb-4" style="font-size: 20px;"><span class="s1 text-left">Total:</span><span class="s2">{{$plan->price}} {{$plan->currency}}</span></div>
                        <div class="desc text-center mb-4">
                            {{env('APP_NAME')}} is required by law to collect applicable transaction taxes for purchases made in certain tax jurisdictions.<br>
                            By completing your purchase you agree to these <a href="#" style="color: red;">Terms of Service</a>.
                        </div>
                        <div class="pay" id="paypal-button-container">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_ID')}}&vault=true&intent=subscription">
    </script>
    <script>
        paypal.Buttons({
            createSubscription: function(data, actions) {
                return actions.subscription.create({
                    'plan_id': '{{$plan->paypal_id}}'
                });
            },
            onApprove: function(data, actions) {
                // alert('You have successfully created subscription ' + data.subscriptionID);
                window.location.href = '{{route('create-agreement')}}/' + '{{$plan->paypal_id}}/' + data.subscriptionID + '/' + data.billingToken + '/' + data.orderID;
            }
        }).render('#paypal-button-container');
    </script>
@endsection
