<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Popular extends Model
{
    public function getPhoto()
    {
        return $this->hasMany('App\Photo',"popular_id");
    }
}
