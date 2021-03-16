<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingGeneralRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    protected function changeEnv($data = []){
        if(count($data) > 0){
            $env = file_get_contents(base_path() . '/.env');
            $env = preg_split('/\s+/', $env);;
            foreach((array)$data as $key => $value){
                foreach($env as $env_key => $env_value){
                    $entry = explode("=", $env_value, 2);
                    if($entry[0] == $key){
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        $env[$env_key] = $env_value;
                    }
                }
            }
            $env = implode("\n", $env);
            file_put_contents(base_path() . '/.env', $env);
            return true;
        } else {
            return false;
        }
    }

    public function general(){
        return view('admin.settings.general');
    }
    public function updateGeneral(SettingGeneralRequest $request){
        if ($request->has('website_logo')){
//            unlink(asset('uploads/website/logo.png'));
            $image = $request->file('website_logo');
            $filename = strtolower('logo.' . $image->getClientOriginalExtension());
            $path = public_path('/uploads/website/' . $filename);
            Image::make($image->getRealPath())->save($path, 100);
        }
        if ($request->has('website_icon')){
//            unlink(asset('uploads/website/icon.png'));
            $image = $request->file('website_icon');
            $filename = strtolower('icon' . '.' . $image->getClientOriginalExtension());
            $path = public_path('/uploads/website/' . $filename);
            Image::make($image->getRealPath())->save($path, 100);
        }
        if ($request->has('website_loader')){
//            unlink(asset('uploads/website/icon.png'));
            $image = $request->file('website_loader');
            $filename = strtolower('loader' . '.' . $image->getClientOriginalExtension());
            $path = public_path('/uploads/website/' . $filename);
            Image::make($image->getRealPath())->save($path, 100);
        }
        $env = $this->changeEnv([
            'APP_NAME'          => '"' . $request->input('site_name') . '"',
            'APP_URL'           => str_replace(' ', '', $request->input('website_link'))
        ]);
        if ($env){
            return redirect()->route('admin.settings.general');
        }
        return redirect()->route('admin.settings.general');
    }
    public function paymentGateways(){
        return view('admin.settings.payment');
    }
    public function updatePaypal(Request $request){
        if ($request->has('status_paypal')){
            $status = 1;
        }else{
            $status = 0;
        }
        if ($request->has('client_id')){
            $client = str_replace(' ', '', $request->input('client_id'));
        }else{
            $client = '';
        }
        if ($request->has('secret')){
            $secret = str_replace(' ', '', $request->input('secret'));
        }else{
            $secret = '';
        }
        $env = $this->changeEnv([
            'PAYPAL_STATUS'          => $status,
            'PAYPAL_ID'              => $client,
            'PAYPAL_SECRET'          => $secret,
        ]);
        if ($env){
            return redirect()->route('admin.settings.payment')->with(['message' => 'Paypal Data Has Been Successfully Updated', 'alert-type' => 'success']);
        }else{
            return redirect()->route('admin.settings.payment')->with(['message' => 'Something Went Wrong, Please Try Again Later', 'alert-type' => 'danger']);
        }
    }
    public function updateStripe(Request $request){
        if ($request->has('status_stripe')){
            $status = 1;
        }else{
            $status = 0;
        }
        if ($request->has('publishable')){
            $publishable = str_replace(' ', '', $request->input('publishable'));
        }else{
            $publishable = '';
        }
        if ($request->has('stripe_secret')){
            $secret = str_replace(' ', '', $request->input('stripe_secret'));
        }else{
            $secret = '';
        }
        $env = $this->changeEnv([
            'STRIPE_STATUS'          => $status,
            'STRIPE_KEY'             => $publishable,
            'STRIPE_SECRET'          => $secret,
        ]);
        if ($env){
            return redirect()->route('admin.settings.payment')->with(['message' => 'Stripe Data Has Been Successfully Updated', 'alert-type' => 'success']);
        }else{
            return redirect()->route('admin.settings.payment')->with(['message' => 'Something Went Wrong, Please Try Again Later', 'alert-type' => 'danger']);
        }
    }
}
