<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function getPost()
    {
        return $this->belongsTo('App\Post',"post_id");
    }
}
