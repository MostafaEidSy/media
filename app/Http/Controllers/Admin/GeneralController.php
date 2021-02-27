<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ConAdminRequest;
use App\Http\Requests\Admin\InfoAdminRequest;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Admin\PassAdminRequest;
use App\Http\Requests\Admin\SocialAdminRequest;
use App\Models\Admin;
use App\Models\InfoAdmin;
use App\Models\SocialAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class GeneralController extends Controller
{
    public function getLogin(){
        return view('admin.login');
    }
    public function login(LoginRequest $request){
        $remember_me = $request->has('remember') ? true : false;
        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            return redirect()->route('admin.index');
        }
        return redirect()->route('admin.getLogin')->with(
            [
                'message' => 'There Is An Error In The Data',
                'alert-type' => 'danger'
            ]
        );
    }
    public function index(){
        return view('admin.index');
    }
    public function editProfile(){
        $id = auth('admin')->user()->id;
        $admin = Admin::where('id', $id)->with(['info'])->first();
        return view('admin.profile.edit', compact('admin'));
    }
    public function accountSetting(){
        $id = auth('admin')->user()->id;
        $admin = Admin::where('id', $id)->with(['social'])->first();
        return view('admin.profile.setting', compact('admin'));
    }
    public function UpdateProfileInfo($id, InfoAdminRequest $request){
        $admin = Admin::where('id', $id)->first();
        $infoAdmin = InfoAdmin::where('admin_id', $id)->first();
        $data = [];
        $data['first_name'] = $request->input('first_name');
        $data['last_name'] = $request->input('last_name');
        $data['username'] = $request->input('username');
        if ($request->file('avatar')) {
            $image = $request->file('avatar');
            $filename = Str::slug($request->input('first_name') . '_' . Carbon::now()) . '.' . $image->getClientOriginalExtension();
            $path = public_path('/uploads/avatars/' . $filename);
            Image::make($image->getRealPath())->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $data['avatar'] = $filename;
        }
        $info = [];
        $info['city'] = $request->input('city');
        $info['gender'] = $request->input('gender');
        $info['date_of_birth'] = $request->input('date_of_birth');
        $info['marital_status'] = $request->input('marital_status');
        $info['age'] = $request->input('age');
        $info['country'] = $request->input('country');
        $info['state'] = $request->input('state');
        $info['address'] = $request->input('address');
        $updateAdmin = $admin->update($data);
        $updateInfoAdmin = $infoAdmin->update($info);
        if ($updateAdmin && $updateInfoAdmin){
            return redirect()->route('admin.edit.profile')->with(['message' => 'The Data Has Been Successfully Updated', 'alert-type' => 'success']);
        }else{
            return redirect()->route('admin.edit.profile')->with(['message' => 'Sorry, There Was An Error When Updating The Data', 'alert-type' => 'danger']);
        }
    }
    public function UpdateProfilePass(PassAdminRequest $request, $id){
        $admin = Admin::where('id', $id)->first();
        if($request->input('new_password') == $request->input('vre_password')){
            $updatePass = $admin->update(['password' => $request->input('new_password')]);
            if($updatePass){
                return redirect()->route('admin.edit.profile')->with(['message' => 'Password Has Been Successfully Updated', 'alert-type' => 'success']);
            }else{
                return redirect()->route('admin.edit.profile')->with(['message' => 'Sorry, There Was An Error When Updating The Password', 'alert-type' => 'danger']);
            }
        }else{
            return redirect()->route('admin.edit.profile')->with(['message' => 'Sorry, The New Password Does Not Match The Confirm New Password Field', 'alert-type' => 'danger']);
        }
    }
    public function UpdateProfileCon($id, ConAdminRequest $request){
        $admin = Admin::where('id', $id)->first();
        $infoAdmin = InfoAdmin::where('admin_id', $id)->first();
        $updateAdmin = $admin->update(['email' => $request->input('email')]);
        $updateInfo = $infoAdmin->update(['number' => $request->input('number'), 'url' => $request->input('url')]);
        if ($updateAdmin && $updateInfo){
            return redirect()->route('admin.edit.profile')->with(['message' => 'The Data Has Been Successfully Updated', 'alert-type' => 'success']);
        }else{
            return redirect()->route('admin.edit.profile')->with(['message' => 'Sorry, There Was An Error When Updating The Data', 'alert-type' => 'danger']);
        }
    }
    public function updateAccountSetting(SocialAdminRequest $request){
        $id = auth('admin')->user()->id;
        $social = SocialAdmin::where('admin_id', $id)->first();
        $data = [];
        $data['facebook'] = $request->input('facebook');
        $data['twitter'] = $request->input('twitter');
        $data['google_plus'] = $request->input('google_plus');
        $data['instagram'] = $request->input('instagram');
        $data['youtube'] = $request->input('youtube');
        $update = $social->update($data);
        if($update){
            return redirect()->route('admin.edit.setting')->with(['message' => 'The Data Has Been Successfully Updated', 'alert-type' => 'success']);
        }else{
            return redirect()->route('admin.edit.setting')->with(['message' => 'Sorry, There Was An Error When Updating The Data', 'alert-type' => 'danger']);
        }
    }
    public function fileManager(){
        return view('admin.file-manager');
    }
}
