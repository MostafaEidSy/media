<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index(){
        $plans = Plan::all();
        return view('admin.plans.index', compact('plans'));
    }
    public function create(){
        return view('admin.plans.create');
    }
    public function story(Request $request){
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $currency = $request->input('currency');
        $paypal_id = $request->input('paypal_id');
        $data = [];
        $data['name'] = $name;
        $data['description'] = $description;
        $data['price'] = $price;
        $data['currency'] = $currency;
        $data['paypal_id'] = $paypal_id;
        $created = Plan::create($data);
        if ($created){
            return redirect()->route('admin.plan.index')->with(['message' => 'The Plan Was Created Successfully', 'alert-type' => 'success']);
        }else{
            return redirect()->route('admin.plan.index')->with(['message' => 'Sorry, There Was An Error Created The Plan', 'alert-type' => 'danger']);
        }
    }
    public function delete($id){
        $plan = Plan::where('id', $id)->first();
        if ($plan){
            $delete = $plan->delete();
            if ($delete){
                return redirect()->route('admin.plan.index')->with(['message' => 'The Plan Was Deleted Successfully', 'alert-type' => 'success']);
            }else{
                return redirect()->route('admin.plan.index')->with(['message' => 'Sorry, There Was An Error Deleted The Plan', 'alert-type' => 'danger']);
            }
        }else{
            return redirect()->route('admin.plan.index')->with(['message' => 'Sorry, This Plan Does Not Exist', 'alert-type' => 'danger']);
        }
    }
}
