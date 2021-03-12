<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\Translation\t;

class Video extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(CategoryVideo::class);
    }
    public function audios(){
        return $this->hasMany(VideoAudio::class, 'video_id', 'id')->with('audios');
    }
    public function documents(){
        return $this->hasMany(VideoDocument::class, 'video_id', 'id')->with('document');
    }
    public function comments(){
        return $this->hasMany(Comment::class, 'video_id', 'id')->where('parent_id', null)->with(['user', 'childrens']);
    }
}
