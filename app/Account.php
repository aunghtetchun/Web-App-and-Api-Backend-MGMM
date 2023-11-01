<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function skins()
    {
        return $this->belongsToMany(Skin::class, 'account_skins');
    }
    public function getPhoto()
    {
        return $this->hasMany('App\Photo',"account_id");
    }
}
