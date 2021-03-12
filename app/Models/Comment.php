<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function scopeParent($query){
        return $query->whereNull('parent_id');
    }
    public function scopeChild($query){
        return $query->whereNotNull('parent_id');
    }
    public function _parent(){
        return $this->belongsTo(self::class, 'parent_id')->with(['user']);
    }
    public function childrens(){
        return $this -> hasMany(self::class,'parent_id')->with(['user']);
    }
    public function video(){
        return $this->belongsTo(Video::class, 'video_id', 'id');
    }
}
