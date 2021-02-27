<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialAdmin extends Model
{
    protected $table = 'social_admins';
    protected $guarded = [];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
