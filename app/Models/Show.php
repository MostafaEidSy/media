<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(CategoryVideo::class);
    }
    public function seasons(){
        return $this->hasMany(Season::class, 'show_id', 'id')->with('showVideo');
    }
    public function videos(){
        return $this->seasons()->with('showVideo');
//        return $this->hasManyThrough(Video::class, VideoSeason::class, 'video_id', 'id', 'id', 'id');
    }
}
