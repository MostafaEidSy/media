<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VideoRequest;
use App\Models\Audio;
use App\Models\CategoryVideo;
use App\Models\Document;
use App\Models\Video;
use App\Models\VideoAudio;
use App\Models\VideoDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class VideoController extends Controller
{
    public function index(){
        $videos = Video::with(['category'])->orderBy('id', 'asc')->get();
        return view('admin.video.index', compact('videos'));
    }
    public function create(){
        $categories = CategoryVideo::all();
        $audios = Audio::all();
        $documents = Document::all();
        return view('admin.video.create', compact('categories', 'audios', 'documents'));
    }
    public function uploadVideo(Request $request){
        set_time_limit(120*5);
        if ($request->file('video')) {
            $video = $request->file('video');
            $filename = Str::slug( 'Video_' . Carbon::now()) . '.' . $video->getClientOriginalExtension();
            $path = $request->file('video')->storeAs('public/uploads/videos/', $filename);
            return response()->json([
                'videoName'        => $filename,
                'status'            => true,
                'path'              => $path,
            ], 200);
        }
        return response()->json([
            'status'        => false,
        ]);
    }
    public function story(VideoRequest $request){
        $data = [];
        $data['title'] = $request->input('title');
        $data['category_id'] = $request->input('category');
        $data['quality'] = $request->input('quality');
        $data['description'] = $request->input('description');
        $data['content'] = $request->input('content');
        $data['release'] = $request->input('release');
        $data['language'] = $request->input('language');
        $data['duration'] = $request->input('duration');
        $data['video'] = $request->input('video_name');
        $data['slug'] = $request->input('slug');
        if ($request->file('image')) {
            $image = $request->file('image');
            $filename = Str::slug($request->input('title') . '_' . Carbon::now()) . '.' . $image->getClientOriginalExtension();
            $path = public_path('/uploads/images/video/' . $filename);
            Image::make($image->getRealPath())->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $data['image'] = $filename;
        }
        $created = Video::create($data);
        if($created){
            if($request->has('audio')){
                $audios = $request->audio;
                if (count($audios) > 0) {
                    for ($i = 0; $i < count($audios); $i++) {
                        $createAudio = VideoAudio::create([
                            'video_id' => $created->id,
                            'audio_id' => $audios[$i]
                        ]);
                    }
                }
            }
            if ($request->has('document')) {
                $documents = $request->document;
                if (count($documents) > 0) {
                    for ($i = 0; $i < count($documents); $i++) {
                        $createDocument = VideoDocument::create([
                            'video_id' => $created->id,
                            'document_id' => $documents[$i]
                        ]);
                    }
                }
            }
            return redirect()->route('admin.video.index')->with(['message' => 'Video Created Successfully', 'alert-type' => 'success']);
        }else{
            return redirect()->route('admin.video.index')->with(['message' => 'Sorry, There Was An Error Created The Video', 'alert-type' => 'danger']);
        }
    }
    public function delete($id){
        $video = Video::where('id', $id)->first();
        if($video){
            $delete = $video->delete();
            if($delete){
                return redirect()->route('admin.video.index')->with(['message' => 'Video Removed Successfully', 'alert-type' => 'success']);
            }else{
                return redirect()->route('admin.video.index')->with(['message' => 'Sorry, There Was An Error Deleting The Video', 'alert-type' => 'danger']);
            }
        }else{
            return redirect()->route('admin.video.index')->with(['message' => 'Sorry, This Video Does Not Exist', 'alert-type' => 'danger']);
        }
    }
    public function edit($id){
        $video = Video::where('id', $id)->with(['audios', 'documents'])->first();
        if ($video){
            $categories = CategoryVideo::all();
            $audios = Audio::all();
            $documents = Document::all();
            return view('admin.video.edit', compact('video', 'categories', 'audios', 'documents'));
        }else{
            return redirect()->route('admin.video.index')->with(['message' => 'Sorry, This Video Does Not Exist', 'alert-type' => 'danger']);
        }
    }
    public function update(VideoRequest $request){
        $id = $request->input('id');
        $video = Video::where('id', $id)->first();
        if ($video){
            $data = [];
            $data['title'] = $request->input('title');
            $data['category_id'] = $request->input('category');
            $data['quality'] = $request->input('quality');
            $data['description'] = $request->input('description');
            $data['content'] = $request->input('content');
            $data['release'] = $request->input('release');
            $data['language'] = $request->input('language');
            $data['duration'] = $request->input('duration');
            $data['video'] = $request->input('video_name');
            $data['slug'] = $request->input('slug');
            if ($request->file('image')) {
                $image = $request->file('image');
                $filename = Str::slug($request->input('title') . '_' . Carbon::now()) . '.' . $image->getClientOriginalExtension();
                $path = public_path('/uploads/images/video/' . $filename);
                Image::make($image->getRealPath())->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);
                $data['image'] = $filename;
            }
            $updated = $video->update($data);
            if($updated){
                $deleteAudios = VideoAudio::where('video_id', $id)->delete();
                $deleteDocuments = VideoDocument::where('video_id', $id)->delete();
                if($request->has('audio')){
                    $audios = $request->audio;
                    if (count($audios) > 0) {
                        for ($i = 0; $i < count($audios); $i++) {
                            $createAudio = VideoAudio::create([
                                'video_id' => $request->input('id'),
                                'audio_id' => $audios[$i]
                            ]);
                        }
                    }
                }
                if($request->has('document')){
                    $documents = $request->document;
                    if (count($documents) > 0) {
                        for ($i = 0; $i < count($documents); $i++) {
                            $createDocument = VideoDocument::create([
                                'video_id' => $request->input('id'),
                                'document_id' => $documents[$i]
                            ]);
                        }
                    }
                }
                return redirect()->route('admin.video.index')->with(['message' => 'Video Updated Successfully', 'alert-type' => 'success']);
            }else{
                return redirect()->route('admin.video.index')->with(['message' => 'Sorry, There Was An Error Updated The Video', 'alert-type' => 'danger']);
            }
        }else{
            return redirect()->route('admin.video.index')->with(['message' => 'Sorry, This Video Does Not Exist', 'alert-type' => 'danger']);
        }
    }
    public function inHome(Request $request){
        $video = Video::where('id', $request->id)->first();
        if(!$video){
            return response()->json([
                'status'     => false
            ], 500);
        }else{
            $change = $video->update(['inHome' => $request->inHome]);
            if($change){
                return response()->json([
                    'status'        => true
                ], 200);
            }else{
                return response()->json([
                    'status'        => false
                ], 501);
            }
        }
    }
}
