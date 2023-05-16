<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function getPost()
    {
        return $this->belongsTo('App\Post',"post_id");
    }
}
