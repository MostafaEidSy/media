@extends('site.layouts.site')

@section('title', 'Pricing')

@section('style')
    <style>
        .box-plan{
            padding: 30px 15px;
            background-color: #191919;
            border-radius: 20px;
            box-shadow: 1px 1px 5px #999;
            margin-bottom: 20px;
        }
        .box-plan .name{
            font-size: 30px;
            text-align: center;
            font-style: italic;
            margin-bottom: 20px;
        }
        .box-plan .price{
            margin-bottom: 20px;
        }
        .box-plan .price .s1{
            display: block;
            text-align: center;
            font-size: 42px;
            color: #fff;
            letter-spacing: 10px;
            font-style: italic;
            font-weight: 100;
        }
        .box-plan .price .s2{
            display: block;
            text-align: center;
            font-size: 20px;
        }
        .box-plan .desc{
            margin-bottom: 20px;
            text-align: center;
            font-style: italic;
        }
        footer{
            position: fixed;
            bottom: 0;
            right: 0;
            left: 0;
            z-index: 99999;
        }
        .m-profile{
            padding-bottom: 180px;
        }
    </style>
@endsection

@section('content')
    <section class="m-profile">
        <div class="container">
            <h4 class="main-title mb-4 text-center">Pricing Plan</h4>
            <div class="row justify-content-center">
                @foreach($plans as $plan)
                    <div class="col-md-4">
                        <div class="box-plan">
                            <h4 class="name">{{$plan->name}}</h4>
                            <div class="price">
                                <span class="s1">{{$plan->price}}/<sup>{{$plan->currency}}</sup></span>
                                <span class="s2">Monthly</span>
                            </div>
                            <div class="desc">{{$plan->description}}</div>
                            <div class="link">
                                <a href="{{route('checkout', [$plan->id, $plan->name])}}" class="btn btn-danger btn-block" style="border-radius: 20px !important;">Subscribe Now</a>
{{--                                <form action="{{ route('create-agreement', $plan->paypal_id) }}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    <button type="submit" class="btn btn-danger btn-block" style="border-radius: 20px !important;">Subscribe Now</button>--}}
{{--                                </form>--}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
