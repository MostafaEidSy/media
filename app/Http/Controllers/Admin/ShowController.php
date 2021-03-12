<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SeasonRequest;
use App\Http\Requests\Admin\ShowRequest;
use App\Models\CategoryVideo;
use App\Models\Season;
use App\Models\Show;
use App\Models\Video;
use App\Models\VideoSeason;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ShowController extends Controller
{
    public function index(){
        $shows = Show::with(['category', 'seasons'])->get();
        return view('admin.show.index', compact('shows'));
    }
    public function create(){
        $categories = CategoryVideo::all();
        return view('admin.show.create', compact('categories'));
    }
    public function storyShow(ShowRequest $request){
        $data = [];
        $data['title'] = $request->input('title');
        $data['language'] = $request->input('language');
        $data['category_id'] = $request->input('category');
        $data['quality'] = $request->input('quality');
        $data['description'] = $request->input('description');
        $data['slug'] = $request->input('slug');
        if ($request->file('image')) {
            $image = $request->file('image');
            $filename = Str::slug($request->input('title') . '_' . Carbon::now()) . '.' . $image->getClientOriginalExtension();
            $path = public_path('/uploads/images/show/' . $filename);
            Image::make($image->getRealPath())->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $data['image'] = $filename;
        }
        if ($request->file('banner')) {
            $image = $request->file('banner');
            $filename = Str::slug($request->input('title') . '_' . Carbon::now()) . '.' . $image->getClientOriginalExtension();
            $path = public_path('/uploads/images/show/' . $filename);
            Image::make($image->getRealPath())->resize(1600, 900, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $data['banner'] = $filename;
        }
        $created = Show::create($data);
        if ($created){
            return redirect()->route('admin.show.index')->with(['message' => 'Show Created Successfully', 'alert-type' => 'success']);
        }else{
            return redirect()->route('admin.show.index')->with(['message' => 'Sorry, There Was An Error Created The Show', 'alert-type' => 'danger']);
        }
    }
    public function seasons(){
        $seasons = Season::with(['show', 'videos'])->get();
        return view('admin.show.season.index', compact('seasons'));
    }
    public function createSeasons(){
        $videos = Video::all();
        $shows = Show::all();
        return view('admin.show.season.create', compact('videos', 'shows'));
    }
    public function storySeasons(SeasonRequest $request){
        $data = [];
        $data['name'] = $request->input('title');
        $data['show_id'] = $request->input('show');
        $data['duration'] = $request->input('duration');
        $data['date_season'] = $request->input('date_season');
        $data['description'] = $request->input('description');
        if ($request->file('image')) {
            $image = $request->file('image');
            $filename = Str::slug($request->input('title') . '_' . Carbon::now()) . '.' . $image->getClientOriginalExtension();
            $path = public_path('/uploads/images/show/' . $filename);
            Image::make($image->getRealPath())->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $data['image'] = $filename;
        }
        $created = Season::create($data);
        if ($created){
            $videoValues = $request->video;
            for ($i=0; $i < count($videoValues); $i++){
                $video = VideoSeason::create([
                    'season_id'         => $created->id,
                    'video_id'          => $videoValues[$i]
                ]);
            }
            return redirect()->route('admin.show.season.index')->with(['message' => 'Season Created Successfully', 'alert-type' => 'success']);
        }else{
            return redirect()->route('admin.show.season.index')->with(['message' => 'Sorry, There Was An Error Created The Season', 'alert-type' => 'danger']);
        }
    }
    public function editShow($id){
        $show = Show::where('id', $id)->first();
        if ($show){
            $categories = CategoryVideo::all();
            return view('admin.show.edit', compact('show', 'categories'));
        }else{
            return redirect()->route('admin.show.index')->with(['message' => 'Sorry, This Show Does Not Exist', 'alert-type' => 'danger']);
        }
    }
    public function updateShow($id, ShowRequest $request){
        $id = $request->input('id');
        $show = Show::where('id', $id)->first();
        if ($show){
            $data = [];
            $data['title'] = $request->input('title');
            $data['language'] = $request->input('language');
            $data['category_id'] = $request->input('category');
            $data['quality'] = $request->input('quality');
            $data['description'] = $request->input('description');
            $data['slug'] = $request->input('slug');
            if ($request->file('image')) {
                $image = $request->file('image');
                $filename = Str::slug($request->input('title') . '_' . Carbon::now()) . '.' . $image->getClientOriginalExtension();
                $path = public_path('/uploads/images/show/' . $filename);
                Image::make($image->getRealPath())->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);
                $data['image'] = $filename;
            }
            if ($request->file('banner')) {
                $image = $request->file('banner');
                $filename = Str::slug($request->input('title') . '_' . Carbon::now()) . '.' . $image->getClientOriginalExtension();
                $path = public_path('/uploads/images/show/' . $filename);
                Image::make($image->getRealPath())->resize(1600, 900, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);
                $data['banner'] = $filename;
            }
            $updated = $show->update($data);
            if($updated){
                return redirect()->route('admin.show.index')->with(['message' => 'Show Updated Successfully', 'alert-type' => 'success']);
            }else{
                return redirect()->route('admin.show.index')->with(['message' => 'Sorry, There Was An Error Updated The Video', 'alert-type' => 'danger']);
            }
        }else{
            return redirect()->route('admin.show.index')->with(['message' => 'Sorry, This Video Does Not Exist', 'alert-type' => 'danger']);
        }
    }
    public function deleteShow($id){
        $show = Show::where('id', $id)->first();
        if ($show){
            $deleted = $show->delete();
            if ($deleted){
                return redirect()->route('admin.show.index')->with(['message' => 'Show Removed Successfully', 'alert-type' => 'success']);
            }else{
                return redirect()->route('admin.show.index')->with(['message' => 'Sorry, There Was An Error Deleting The Show', 'alert-type' => 'danger']);
            }
        }else{
            return redirect()->route('admin.show.index')->with(['message' => 'Sorry, This Show Does Not Exist', 'alert-type' => 'danger']);
        }
    }
    public function editSeasons($id){
        $season = Season::where('id', $id)->with(['videos'])->first();
        if ($season){
            $videos = Video::all();
            $shows = Show::all();
            return view('admin.show.season.edit', compact('videos', 'shows', 'season'));
        }else{
            return redirect()->route('admin.show.season.index')->with(['message' => 'Sorry, This Season Does Not Exist', 'alert-type' => 'danger']);
        }
    }
    public function updateSeasons(SeasonRequest $request){
        $id = $request->input('id');
        $season = Season::where('id', $id)->first();
        if ($season){
            $videosDeleted = VideoSeason::where('season_id', $season->id)->delete();
            $data = [];
            $data['name'] = $request->input('title');
            $data['show_id'] = $request->input('show');
            $data['duration'] = $request->input('duration');
            $data['date_season'] = $request->input('date_season');
            $data['description'] = $request->input('description');
            if ($request->file('image')) {
                $image = $request->file('image');
                $filename = Str::slug($request->input('title') . '_' . Carbon::now()) . '.' . $image->getClientOriginalExtension();
                $path = public_path('/uploads/images/show/' . $filename);
                Image::make($image->getRealPath())->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);
                $data['image'] = $filename;
            }
            $updated = $season->update($data);
            if($updated){
                $videoValues = $request->video;
                for ($i=0; $i < count($videoValues); $i++){
                    $video = VideoSeason::create([
                        'season_id'         => $id,
                        'video_id'          => $videoValues[$i]
                    ]);
                }
                return redirect()->route('admin.show.season.index')->with(['message' => 'Season Created Successfully', 'alert-type' => 'success']);
            }else{
                return redirect()->route('admin.show.season.index')->with(['message' => 'Sorry, There Was An Error Updated The Season', 'alert-type' => 'danger']);
            }
        }else{
            return redirect()->route('admin.show.season.index')->with(['message' => 'Sorry, This Season Does Not Exist', 'alert-type' => 'danger']);
        }
    }
    public function deleteSeasons($id){
        $season = Season::where('id', $id)->first();
        if ($season){
            $deleted = $season->delete();
            if ($deleted){
                return redirect()->route('admin.show.season.index')->with(['message' => 'Season Removed Successfully', 'alert-type' => 'success']);
            }else{
                return redirect()->route('admin.show.season.index')->with(['message' => 'Sorry, There Was An Error Deleting The Season', 'alert-type' => 'danger']);
            }
        }else{
            return redirect()->route('admin.show.season.index')->with(['message' => 'Sorry, This Season Does Not Exist', 'alert-type' => 'danger']);
        }
    }
}
