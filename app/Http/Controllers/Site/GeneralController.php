<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\LoginRequest;
use App\Http\Requests\Site\ManageRequest;
use App\Http\Requests\Site\SignUpRequest;
use App\Models\CategoryVideo;
use App\Models\Favorite;
use App\Models\Show;
use App\Models\User;
use App\Models\Video;
use App\Models\VideoSeason;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class GeneralController extends Controller
{
    public function index(){
        if (auth()->check()) {
            $videos = Video::where('inHome', 1)->limit(10)->get();
            $shows = Show::with(['seasons'])->limit(10)->get();
            $fav = Favorite::where('user_id', auth()->user()->id)->with(['favVideos'])->first();
            return view('site.index', compact('shows', 'videos', 'fav'));
        }else{
            $videos = Video::where('inHome', 1)->limit(10)->get();
            $shows = Show::with(['seasons'])->limit(10)->get();
            return view('site.index', compact('shows', 'videos'));
        }
    }
    public function getLogin(){
        return view('site.login');
    }
    public function login(LoginRequest $request){
        $remember_me = $request->has('remember') ? true : false;
        if (auth()->guard('web')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            return redirect()->route('index');
        }
        return redirect()->route('getLogin')->with(
            [
                'message' => 'There Is An Error In The Data',
                'alert-type' => 'danger'
            ]
        );
    }
    public function logout(){
        auth('web')->logout();
        return redirect()->route('index');
    }
    public function getSignUp(){
        return view('site.signup');
    }
    public function signUp(SignUpRequest $request){
        $user = User::create([
            'name'          => $request->input('name'),
            'email'         => $request->input('email'),
            'password'      => bcrypt($request->input('password')),
        ]);
        if ($user){
            return redirect()->route('getLogin');
        }else{
            return redirect()->route('getSignUp')->with(
                [
                    'message'    => 'There Is An Error In The Data',
                    'alert-type' => 'danger'
                ]
            );
        }
    }
    public function manage(){
        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();
        if ($user){
            return view('site.profile.manage', compact('user'));
        }else{
            return redirect()->route('index');
        }
    }
    public function updateManage($id, ManageRequest $request){
        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();
        if ($user){
            $data = [];
            $data['name'] = $request->input('name');
            $data['date_of_birth'] = $request->input('date_of_birth');
            $data['gender'] = $request->input('gender');
            $data['language'] = $request->input('language');
            $data['email'] = $request->input('email');
            $data['abstract'] = $request->input('abstract');
            if ($request->has('password')){
                $data['password'] = bcrypt($request->input('password'));
            }
            if ($request->file('avatar')) {
                $image = $request->file('avatar');
                $filename = Str::slug($request->input('name') . '_' . Carbon::now()) . '.' . $image->getClientOriginalExtension();
                $path = public_path('/uploads/images/users/avatar/' . $filename);
                Image::make($image->getRealPath())->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);
                $data['avatar'] = $filename;
            }
            $updated = $user->update($data);
            if ($updated){
                return redirect()->route('manage.profile')->with(['msg' => 'Successfully updated', 'status' => 'success']);
            }else{
                return redirect()->route('manage.profile')->with(['msg' => 'An error occurred while updating the data, please try again later', 'status' => 'danger']);
            }
        }else{
            return redirect()->route('index');
        }
    }
    public function settingProfile(){
        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();
        if ($user){
            return view('site.profile.setting', compact('user'));
        }else{
            return redirect()->route('index');
        }
    }
    public function pricing(){
        return view('site.pricing');
    }
    public function addFavorites($id)
    {
        $userId = auth()->user()->id;
        $check = Favorite::where('user_id', $userId)->where('video_id', $id)->first();
        if ($check){
            $deleted = $check->delete();
            if ($deleted){
                return redirect()->route('index')->with(['msg' => 'The Video Has Been Removed From Favorites Successfully', 'status' => 'success']);
            }else{
                return redirect()->route('index')->with(['msg' => 'Something Went Wrong, Please Try Again Later', 'status' => 'danger']);
            }
        }else{
            $created = Favorite::create([
                'user_id'   => $userId,
                'video_id'  => $id
            ]);
            if ($created){
                return redirect()->route('index')->with(['msg' => 'The Video Has Been Successfully Added To Your Favorites', 'status' => 'success']);
            }else{
                return redirect()->route('index')->with(['msg' => 'Something Went Wrong, Please Try Again Later', 'status' => 'danger']);
            }
        }
    }
    public function showDetails($slug){
        $show = Show::where('slug', $slug)->first();
        if ($show){
            return view('site.show-details', compact('show'));
        }else{
            return redirect()->route('index');
        }
    }
    public function watchShow($slug, $video = null){
        $show = Show::where('slug', $slug)->with(['seasons'])->first();
        $videos = VideoSeason::with(['video'])->get();
//        return response()->json($show);
        return view('site.watch-show', compact('show'));
    }
}
