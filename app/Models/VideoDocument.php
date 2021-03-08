<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoDocument extends Model
{
    protected $table = 'video_documents';
    protected $guarded = [];

    public function document(){
        return $this->belongsTo(Document::class, 'document_id', 'id');
    }
    public function video(){
        return $this->belongsTo(Video::class, 'video_id', 'id');
    }
}
