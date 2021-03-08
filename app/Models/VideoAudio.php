<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoAudio extends Model
{
    protected $table = 'video_audio';
    protected $guarded = [];

    public function audios(){
        return $this->belongsTo(Audio::class, 'audio_id', 'id');
    }
}
