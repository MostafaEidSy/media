<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $guarded = [];

    public function show(){
        return $this->belongsTo(Show::class);
    }
    public function videos(){
        return $this->hasMany(VideoSeason::class, 'season_id', 'id');
    }
    public function showVideo(){
        return $this->hasMany(VideoSeason::class, 'season_id', 'id')->with('video');
    }
}
