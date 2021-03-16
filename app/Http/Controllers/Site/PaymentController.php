<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionUser;
use App\Models\User;
use App\Paypal\PaypalAgreement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function subscription($planId, $subscriptionId, $billingToken, $orderID){
        $created = SubscriptionUser::create([
            'user_id'           => auth()->user()->id,
            'plan_id'           => $planId,
            'subscription_id'   => $subscriptionId,
            'billing_token'     => $billingToken,
            'order_id'          => $orderID
        ]);
        $url = 'https://api-m.sandbox.paypal.com/v1/billing/subscriptions/' . $subscriptionId;
        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . env('PAYPAL_ID') . ':' . env('PAYPAL_SECRET')
        ])->get($url);
        $response = $request->json();
        dd($response);
//        $user = User::where('id', auth()->user()->id)->first();
//        $update = $user->update([
//            'start_date'            => date('d-m-Y', strtotime($response->start_time)),
//            'end_date'              => date('d-m-Y', strtotime($response->billing_info->next_billing_time)),
//            'status'                => strtolower($response->status)
//        ]);
//        auth()->user()->assignRole('user');
//        auth()->user()->givePermissionTo('Subscriber');
//        return redirect()->route('index')->with(['msg' => 'The Subscription Process Was Successful. You Can Now Browse All Site Data, Thank You', 'status' => 'success']);
    }
}
