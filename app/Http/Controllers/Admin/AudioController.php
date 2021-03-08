<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AudioRequest;
use App\Models\Audio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AudioController extends Controller
{
    public function index(){
        $audios = Audio::all();
        return view('admin.audio.index', compact('audios'));
    }
    public function create(){
        return view('admin.audio.create');
    }
    public function uploadVideo(Request $request){
        if ($request->file('audio')) {
            $video = $request->file('audio');
            $filename = Str::slug( 'Audio_' . Carbon::now()) . '.' . $video->getClientOriginalExtension();
            $path = $request->file('audio')->storeAs('public/uploads/audios/', $filename);
            return response()->json([
                'audioName'        => $filename,
                'status'            => true,
                'path'              => $path,
            ], 200);
        }
        return response()->json([
            'status'        => false,
        ]);
    }
    public function story(AudioRequest $request){
        $data = [];
        $data['name'] = $request->input('name');
        $data['audio_name'] = $request->input('audio_name');
        $created = Audio::create($data);
        if($created){
            return redirect()->route('admin.audio.index')->with(['message' => 'Audio Created Successfully', 'alert-type' => 'success']);
        }else{
            return redirect()->route('admin.audio.index')->with(['message' => 'Sorry, There Was An Error Created The Audio', 'alert-type' => 'danger']);
        }
    }
    public function delete($id){
        $audio = Audio::where('id', $id)->first();
        if ($audio){
            $deleted = $audio->delete();
            if ($deleted){
                return redirect()->route('admin.audio.index')->with(['message' => 'Audio Removed Successfully', 'alert-type' => 'success']);
            }else{
                return redirect()->route('admin.audio.index')->with(['message' => 'Sorry, There Was An Error Deleting The Video', 'alert-type' => 'danger']);
            }
        }else{
            return redirect()->route('admin.audio.index')->with(['message' => 'Sorry, This Audio Does Not Exist', 'alert-type' => 'danger']);
        }
    }
    public function edit($id){
        $audio = Audio::where('id', $id)->first();
        if ($audio){
            return view('admin.audio.edit', compact('audio'));
        }else{
            return redirect()->route('admin.audio.index')->with(['message' => 'Sorry, This Audio Does Not Exist', 'alert-type' => 'danger']);
        }
    }
    public function update(AudioRequest $request){
        $audio = Audio::where('id', $request->input('id'))->first();
        if($audio){
            $data = [];
            $data['name'] = $request->input('name');
            $data['audio_name'] = $request->input('audio_name');
            $updated = $audio->update($data);
            if ($updated){
                return redirect()->route('admin.audio.index')->with(['message' => 'Audio Updated Successfully', 'alert-type' => 'success']);
            }else{
                return redirect()->route('admin.audio.index')->with(['message' => 'Sorry, There Was An Error Updated The Audio', 'alert-type' => 'danger']);
            }
        }else{
            return redirect()->route('admin.audio.index')->with(['message' => 'Sorry, This Audio Does Not Exist', 'alert-type' => 'danger']);
        }
    }
}
