<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $guarded = [];

    public function info(){
        return $this->hasOne(InfoAdmin::class, 'admin_id', 'id');
    }
    public function social(){
        return $this->hasOne(SocialAdmin::class, 'admin_id', 'id');
    }
}
