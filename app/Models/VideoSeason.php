<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoSeason extends Model
{
    protected $table = 'video_seasons';
    protected $guarded = [];

    public function season(){
        return $this->belongsTo(Season::class, 'season_id', 'id');
    }
    public function video(){
        return $this->belongsTo(Video::class, 'video_id', 'id')->with(['audios', 'documents', 'comments']);
    }
}
