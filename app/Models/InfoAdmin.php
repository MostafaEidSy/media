<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoAdmin extends Model
{
    protected $table = 'info_admins';
    protected $guarded = [];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
