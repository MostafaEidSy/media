<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryVideo extends Model
{
    protected $table = 'category_videos';
    protected $guarded = [];

    public function videos(){
        return $this->hasMany(Video::class, 'category_id', 'id');
    }
    public function videosHome(){
        return $this->hasMany(Video::class, 'category_id', 'id');
    }
    public function shows(){
        return $this->hasMany(Show::class, 'show_id', 'id');
    }
}
