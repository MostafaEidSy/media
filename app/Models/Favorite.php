<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $guarded = [];

    public function favVideos(){
        return $this->hasMany(Video::class, 'id', 'video_id');
    }
}
